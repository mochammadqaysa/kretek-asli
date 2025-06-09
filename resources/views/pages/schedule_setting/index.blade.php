@extends('layouts.root')

@section('title', 'Atur Jadwal')


@section('breadcrum')
<div class="col-lg-6 col-7">
  <h6 class="h2 text-white d-inline-block mb-0">Atur Jadwal</h6>
  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
      <li class="breadcrumb-item"><a href="#"><i class="fas fa-id-badge"></i></a></li>
      <li class="breadcrumb-item active" aria-current="page">Atur Jadwal</li>
    </ol>
  </nav>
</div>
@endsection

@section('page')
@php
use App\Helpers\AuthCommon;
$user = AuthCommon::getUser();
@endphp
<div class="row">
  <div class="col-md-12 ">
      <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
            <h2>Atur Jadwal Klinik</h2>
            </div>
        </div>
        <div class="card-body">
          <form action="{{ route('schedule_setting.store') }}" method="POST" id="myForm">
          @csrf
            <div class="row">
              <div class="col-md-6">
                <label for="">Jadwal Mingguan</label>
                @php
                $days = [
                  "Sunday" => "Minggu",
                  "Monday" => "Senin",
                  "Tuesday" => "Selasa",
                  "Wednesday" => "Rabu",
                  "Thursday" => "Kamis",
                  "Friday" => "Jum'at",
                  "Saturday" => "Sabtu"
                ];
                @endphp
                @foreach($days as $key => $day)
                <div class="row">
                  <div class="col-md-5 mt-3 mb-2 py-auto d-flex align-items-center">
                    <label class="custom-toggle mb-0 mr-3">
                        <input type="checkbox" name="days[]" value="{{ $key }}" id="understand" {{ in_array($key, @$day_schedule) ? 'checked' : '' }}>
                        <span class="custom-toggle-slider rounded-circle" data-label-off="" data-label-on=""></span>
                    </label>
                    <label for="understand" class="mb-0">{{ $day }}</label>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="col-md-6">
                <label>Jadwal Waktu Pagi <span class="text-danger">*</span></label>
                <div class="row">
                  <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="morning_from" id="morning_from" placeholder="Dari Jam"
                      value="{{ @$morning_schedule[0] }}" style="background-color: white;">
                  </div>
                  -
                  <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="morning_to" id="morning_to" placeholder="Sampai Jam"
                      value="{{ @$morning_schedule[1] }}" style="background-color: white;">
                  </div>
                </div>
                <label>Jadwal Waktu Sore <span class="text-danger">*</span></label>
                <div class="row">
                  <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="afternoon_from" id="afternoon_from" placeholder="Dari Jam"
                      value="{{ @$afternoon_schedule[0] }}" style="background-color: white;">
                  </div>
                  -
                  <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="afternoon_to" id="afternoon_to" placeholder="Sampai Jam"
                      value="{{ @$afternoon_schedule[1] }}" style="background-color: white;">
                  </div>
                </div>
              </div>
              <div class="col-md-12 mt-5">
                <button type="button" class="btn bg-diy text-white btn-block" onclick="saveConfig()">Simpan Perubahan</button>
              </div>
            </div>
          </form>
          <div id="response_container mt-5"></div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // let detail_account = $("#detail-account"); 
  // detail_account.slideDown();
  function saveConfig(){
    $('#response_container').empty();
    Ryuna.blockElement('.modal-content');
    let el_form = $('#myForm')
    let target = el_form.attr('action')
    let formData = new FormData(el_form[0])
  
    $.ajax({
      url: target,
      data: formData,
      processData: false,
      contentType: false,
      type: 'POST',
    }).done((res) => {
      if(res?.status == true){
        let html = '<div class="alert alert-success alert-dismissible fade show">'
        html += `${res?.message}`
        html += '</div>'
        Ryuna.noty('success', '', res?.message)
        $('#response_container').html(html)
        Ryuna.unblockElement('.modal-content')
  
        if($('[name="_method"]').val() == undefined) {
          el_form[0].reset()
          // $('[name="role"]').val(null).trigger('change')
          // $('[name="branch"]').val(null).trigger('change')
          // $('[name="jobposition"]').val(null).trigger('change')
        }
        location.reload();
      }
    }).fail((xhr) => {
      if(xhr?.status == 422){
        let errors = xhr.responseJSON.errors
        let html = '<div class="alert alert-danger alert-dismissible fade show">'
        html += '<ul>';
        for(let key in errors){
          html += `<li>${errors[key]}</li>`;
        }
        html += '</ul>'
        html += '</div>'
        $('#response_container').html(html)
        Ryuna.unblockElement('.modal-content')
      }else{
        let html = '<div class="alert alert-danger alert-dismissible fade show">'
        html += `${xhr?.responseJSON?.message}`
        html += '</div>'
        Ryuna.noty('error', '', xhr?.responseJSON?.message)
        $('#response_container').html(html)
        Ryuna.unblockElement('.modal-content')
      }
    })
  }
  $('#morning_from').flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    static: true,
    minTime: "07:00",
    maxTime: "09:00",
  })
  $('#morning_to').flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    static: true,
    minTime: "10:00",
    maxTime: "12:00",
  })
  $('#afternoon_from').flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    static: true,
    minTime: "13:00",
    maxTime: "15:00",
  })
  $('#afternoon_to').flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    static: true,
    minTime: "16:00",
    maxTime: "18:00",
  })

</script>
@endsection