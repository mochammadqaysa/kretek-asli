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
            <h6 class="text-uppercase text-muted ls-1 mb-1">Jadwal</h6>
            <h5 class="h3  mb-0"><i class="fad fa-chart-pie"></i> Jadwal Janji Temu</h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')
<script>
var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
      initialView: "dayGridMonth",
      headerToolbar: {
        start: 'title', // will normally be on the left. if RTL, will be on the right
        center: '',
        end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
      },
      selectable: true,
      editable: true,
      initialDate: '2020-12-01',
      events: [{
          title: 'Call with Dave',
          start: '2020-11-18',
          end: '2020-11-18',
          className: 'bg-gradient-danger'
        },

        {
          title: 'Lunch meeting',
          start: '2020-11-21',
          end: '2020-11-22',
          className: 'bg-gradient-warning'
        },

        {
          title: 'All day conference',
          start: '2020-11-29',
          end: '2020-11-29',
          className: 'bg-gradient-success'
        },

        {
          title: 'Meeting with Mary',
          start: '2020-12-01',
          end: '2020-12-01',
          className: 'bg-gradient-info'
        },

        {
          title: 'Winter Hackaton',
          start: '2020-12-03',
          end: '2020-12-03',
          className: 'bg-gradient-danger'
        },

        {
          title: 'Digital event',
          start: '2020-12-07',
          end: '2020-12-09',
          className: 'bg-gradient-warning'
        },

        {
          title: 'Marketing event',
          start: '2020-12-10',
          end: '2020-12-10',
          className: 'bg-gradient-primary'
        },

        {
          title: 'Dinner with Family',
          start: '2020-12-19',
          end: '2020-12-19',
          className: 'bg-gradient-danger'
        },

        {
          title: 'Black Friday',
          start: '2020-12-23',
          end: '2020-12-23',
          className: 'bg-gradient-info'
        },

        {
          title: 'Cyber Week',
          start: '2020-12-02',
          end: '2020-12-02',
          className: 'bg-gradient-warning'
        },

      ],
      views: {
        month: {
          titleFormat: {
            month: "long",
            year: "numeric"
          }
        },
        agendaWeek: {
          titleFormat: {
            month: "long",
            year: "numeric",
            day: "numeric"
          }
        },
        agendaDay: {
          titleFormat: {
            month: "short",
            year: "numeric",
            day: "numeric"
          }
        }
      },
    });

    calendar.render();
    
</script>
@endsection
