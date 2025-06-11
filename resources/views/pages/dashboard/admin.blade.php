@extends('layouts.root')

@section('title','Dashboard')
@section('styles')
  <link rel="stylesheet" href="{{ asset('assets/vendor/fullcalendar/dist/fullcalendar.min.css') }}">
  <style>
    .fc-head {
      background-color: #EE5724 !important;
    }
    .fc-head th {
      color: #fff !important;
    }
    span.fc-time {
      color: #fff !important;
    }
    #calendar .fc-toolbar {
        height: auto !important;
        margin-bottom: 1rem !important;
        display: flex !important;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 1rem;
        z-index: 10;
    }
  </style>
@endsection

@section('breadcrum')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="ni ni-tv-2"></i></a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
@endsection

@section('page')
<div class="row">
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Janji Temu</h5>
            <span class="h2 font-weight-bold mb-0">{{ $statistics['total_appointment'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
              <i class="fas fa-clipboard-list-check"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Janji Temu Pending</h5>
            <span class="h2 font-weight-bold mb-0">{{ $statistics['total_pending_appointment'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
              <i class="fas fa-clock"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Janji Temu Diterima</h5>
            <span class="h2 font-weight-bold mb-0">{{ $statistics['total_confirmed_appointment'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
              <i class="fas fa-clipboard-check"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Janji Temu Dibatalkan</h5>
            <span class="h2 font-weight-bold mb-0">{{ $statistics['total_cancelled_appointment'] ?? 0 }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="fas fa-folder-times"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
          <span class="text-nowrap"></span>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-12">
    <div class="card card-calendar">
      <div class="card-header bg-transparent">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="text-uppercase text-muted ls-1 mb-1">Kalender</h6>
            <h5 class="h3  mb-0"><i class="fad fa-chart-pie"></i> Jadwal Janji Temu</h5>
            <div class="container-fluid content__title content__title--calendar">
              <div class="row align-items-center py-4">
                <div class="col-lg-6">
                  <h6 class="fullcalendar-title h2 d-inline-block mb-0"></h6>
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                  <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                    <i class="fas fa-angle-left"></i>
                  </a>
                  <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                    <i class="fas fa-angle-right"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">Bulan</a>
                  <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">Minggu</a>
                  <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">Hari</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body" style="margin-top: -60px;">
        <div class="calendar" data-toggle="calendarasd" id="schedule-calendar"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detail-event" tabindex="-1" role="dialog" aria-labelledby="detail-event-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-secondary modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Jadwal Janji Temu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-md-12 justify-content-start">
            <h5 style="color: #EE5724">Data Pasien</h5>
            <hr class="bg-diy"style="height: 2px; margin-top: 0px !important; margin-bottom: 10px !important;">
          </div>
          <table class="table table-borderless align-items-left table-flush table-header col-md-12">
            <tbody>
              <tr>
                <td>
                  <h3 class="d-inline"><i class="fas fa-user-tag"></i></h3> Nama Lengkap
                  <h3 id="d-nama"></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <h3 class="d-inline"><i class="fas fa-user-tag"></i></h3> Layanan
                  <h3 id="d-layanan"></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <h3 class="d-inline"><i class="fas fa-venus-mars"></i></h3> Jenis Kelamin
                  <h3 id="d-jenis-kelamin"></h3>
                </td>
                <td>
                  <h3 class="d-inline"><i class="fas fa-birthday-cake"></i></h3> Tanggal Lahir
                  <h3 id="d-tanggal-lahir"></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <h3 class="d-inline"><i class="fas fa-envelope-open-text"></i></h3> Email
                  <h3 id="d-email"></h3>
                </td>
                <td>
                  <h3 class="d-inline"><i class="fas fa-phone"></i></h3> No Telepon
                  <h3 id="d-telpon"></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <h3 class="d-inline"><i class="fas fa-map"></i></h3> Alamat
                  <h3 id="d-alamat"></h3>
                </td>
              </tr>
              <tr>
                <td>
                  <h3 class="d-inline"><i class="fas fa-first-aid"></i></h3> Keluhan
                  <h3 id="d-keluhan"></h3>
                </td>
                <td>
                  <h3 class="d-inline"><i class="fas fa-calendar-day"></i></h3> Tanggal Janji Temu
                  <h3 id="d-tanggal-janji-temu"></h3>
                </td>
              </tr>
            </tbody>
          </table>
        </div>  
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script>
  $(document).ready(function() {
    options = {
			header: {
				right: '',
				center: '',
				left: ''
			},
			buttonIcons: {
				prev: 'calendar--prev',
				next: 'calendar--next'
			},
			theme: false,
			selectable: true,
			selectHelper: true,
			editable: true,
			events: @json($calender),
      timeFormat: 'H:mm',

			dayClick: function(date) {
				var isoDate = moment(date).toISOString();
				$('#new-event').modal('show');
				$('.new-event--title').val('');
				$('.new-event--start').val(isoDate);
				$('.new-event--end').val(isoDate);
			},

			viewRender: function(view) {
				var calendarDate = $('#schedule-calendar').fullCalendar('getDate');
				var calendarMonth = calendarDate.month();

				//Set data attribute for header. This is used to switch header images using css
				// $this.find('.fc-toolbar').attr('data-calendar-month', calendarMonth);

				//Set title in page header
				$('.fullcalendar-title').html(view.title);
			},

			// Edit calendar event action

			eventClick: function(event, element) {
				$('#detail-event').modal('show');
        $('#d-nama').html(event.nama + ' <span class="badge text-white '+event.className+'">' + event.message + '</span>');
        event.jenis_kelamin = event.jenis_kelamin.charAt(0).toUpperCase() + event.jenis_kelamin.slice(1);
        $('#d-jenis-kelamin').text(event.jenis_kelamin);
        $('#d-tanggal-lahir').text(event.tanggal_lahir);
        $('#d-layanan').text(event.layanan + ' - ' + event.harga);
        $('#d-email').text(event.email);
        $('#d-telpon').text(event.kontak);
        $('#d-alamat').text(event.alamat);
        $('#d-keluhan').text(event.keluhan);
        $('#d-tanggal-janji-temu').text(moment(event.start).format('DD MMMM YYYY') + ' ' + moment(event.start).format('HH:mm'));
			}
		};

		// Initalize the calendar plugin
		$('#schedule-calendar').fullCalendar(options);

    $('body').on('click', '[data-calendar-view]', function(e) {
			e.preventDefault();

			$('[data-calendar-view]').removeClass('active');
			$(this).addClass('active');

			var calendarView = $(this).attr('data-calendar-view');
			$('#schedule-calendar').fullCalendar('changeView', calendarView);
		});


		//Calendar Next
		$('body').on('click', '.fullcalendar-btn-next', function(e) {
			e.preventDefault();
			$('#schedule-calendar').fullCalendar('next');
		});


		//Calendar Prev
		$('body').on('click', '.fullcalendar-btn-prev', function(e) {
			e.preventDefault();
			$('#schedule-calendar').fullCalendar('prev');
		});
  });
</script>
@endsection
