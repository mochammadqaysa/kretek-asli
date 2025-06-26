<?php

namespace App\DataTables;

use App\Helpers\PermissionCommon;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppointmentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                $html = '';
                $html = '<div class="btn-group btn-group-sm">';
                if (PermissionCommon::check('role.update')) {
                    $html .= '<button onclick="edit(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-pen"></i></button>';
                }
                if (PermissionCommon::check('role.delete')) {
                    $html .= '<button onclick="destroy(\'' . $item->uid . '\')" type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>';
                }
                $html .= '</div>';
                // if ($item->status == '0') {
                //     $html .= '<br><button onclick="approve(\'' . $item->uid . '\')" type="button" class="btn btn-sm bg-success text-white mt-1" title="Konfirmasi Janji Temu"><i class="fas fa-clipboard-check"></i> Konfirmasi </button>';
                //     $html .= '<button onclick="reject(\'' . $item->uid . '\')" type="button" class="btn btn-sm bg-danger text-white mt-1" title="Tolak Janji Temu"><i class="fas fa-times-hexagon"></i> Tolak </button>';
                // }

                return $html;
            })

            ->addColumn('patient', function ($data) {
                $patient = "";
                if (isset($data->patient)) {
                    $patient = $data->patient->nama;
                }
                return $patient;
            })
            ->filterColumn('patient', function ($query, $keyword) {
                $query->whereHas('patient', function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->orderColumn('patient', function ($query, $direction) {
                $query->orderBy(
                    Patient::select('patients.nama')
                        ->whereColumn('patients.uid', 'appointments.patient_uid')
                        ->limit(1),
                    $direction
                );
            })
            ->addColumn('service', function ($data) {
                $service = "";
                if (isset($data->service)) {
                    $service = $data->service->nama;
                }
                return $service;
            })
            ->filterColumn('service', function ($query, $keyword) {
                $query->whereHas('service', function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->orderColumn('service', function ($query, $direction) {
                $query->orderBy(
                    Service::select('services.nama')
                        ->whereColumn('services.uid', 'appointments.service_uid')
                        ->limit(1),
                    $direction
                );
            })

            ->addColumn('status', function ($data) {
                $status = "?";
                if (isset($data->status)) {
                    $status = $data->status;
                    switch ($status) {
                        case '0':
                            $status = '<span class="badge bg-info text-white">Pending</span>';
                            break;
                        case '1':
                            $status = '<span class="badge bg-success text-white">Dikonfirmasi</span>';
                            break;
                        case '2':
                            $status = '<span class="badge bg-danger text-white">Ditolak</span>';
                            break;
                        default:
                            $status = '<span class="badge bg-danger text-white">Ditolak</span>';
                            break;
                    }
                }
                return $status;
            })
            ->filterColumn('status', function ($query, $keyword) {
                $query->where('status', 'like', "%{$keyword}%");
            })
            ->orderColumn('status', function ($query, $direction) {
                $query->orderBy('status', $direction);
            })
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Appointment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Appointment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {

        $button = [];

        if (PermissionCommon::check('role.create')) {
            $button[] = Button::raw('<i class="fa fa-plus"></i> Tambah Janji Temu')->action('function() { create() }');
        }
        return $this->builder()
            ->parameters([
                'language' => [
                    'search' => '<i class="fas fa-search"></i>',
                    'infoFiltered' => ''
                ],
            ])
            ->setTableId('appointment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-6'B><'col-sm-3'f><'col-sm-3'l>> <'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(1)
            ->scrollY(350)
            // ->selectStyleSingle()
            ->buttons($button);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        $column = [];
        if (PermissionCommon::check('role.update') || PermissionCommon::check('role.delete')) {
            $column[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }
        $column[] = Column::make('patient')->title('Nama Pasien');
        $column[] = Column::make('service')->title('Layanan');
        $column[] = Column::make('date_sched')->title('Schedule');
        $column[] = Column::make('keluhan');
        $column[] = Column::make('status');
        return $column;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Appointment_' . date('YmdHis');
    }
}
