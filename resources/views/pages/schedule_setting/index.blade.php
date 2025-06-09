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
      <div class="card-body bg-secondary">
        <form action="">
          <div class="row">
            <div class="col-md-6">
              <label for="">Jadwal Mingguan</label>
              @php
              $days = [
                "Minggu" => "Minggu",
                "Senin" => "Senin",
                "Selasa" => "Selasa",
                "Rabu" => "Rabu",
                "Kamis" => "Kamis",
                "Jumat" => "Jum'at",
                "Sabtu" => "Sabtu"
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
                  <input type="text" class="form-control" name="appointment_date" id="appointment_date" placeholder="Dari Jam"
                    value="{{ @$morning_schedule[0] }}" style="background-color: white;">
                </div>
                -
                <div class="form-group col-md-5">
                  <input type="text" class="form-control" name="appointment_date" id="appointment_date" placeholder="Sampai Jam"
                    value="{{ @$morning_schedule[1] }}" style="background-color: white;">
                </div>
              </div>
              <label>Jadwal Waktu Sore <span class="text-danger">*</span></label>
              <div class="row">
                <div class="form-group col-md-5">
                  <input type="text" class="form-control" name="appointment_date" id="appointment_date" placeholder="Dari Jam"
                    value="{{ @$afternoon_schedule[0] }}" style="background-color: white;">
                </div>
                -
                <div class="form-group col-md-5">
                  <input type="text" class="form-control" name="appointment_date" id="appointment_date" placeholder="Sampai Jam"
                    value="{{ @$afternoon_schedule[1] }}" style="background-color: white;">
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-5">
              <button type="button" class="btn bg-diy text-white btn-block" onclick="save()">Simpan Perubahan</button>
            </div>
          </div>
        </form>
      </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  let _url = {
    form_profile: `{{ route('form.profile') }}`,
    change_pass: `{{ route('password.profile') }}`,
  }
  // let detail_account = $("#detail-account"); 
  // detail_account.slideDown();
  function formEditProfil() {
    Ryuna.blockUI()
    $.get(_url.form_profile).done((res) => {
      Ryuna.modal({
        title: res?.title,
        body: res?.body,
        footer: res?.footer
      })
      Ryuna.unblockUI()
    }).fail((xhr) => {
      Ryuna.unblockUI()
      Swal.fire({
        title: 'Whoops!',
        text: xhr?.responseJSON?.message ? xhr.responseJSON.message : 'Internal Server Error',
        type: 'error',
        confirmButtonColor: '#007bff'
      })
    })
  }

  function saveProfile(){
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

  function formChangePassword() {
    Ryuna.blockUI()
    $.get(_url.change_pass).done((res) => {
      Ryuna.modal({
        title: res?.title,
        body: res?.body,
        footer: res?.footer
      })
      Ryuna.unblockUI()
    }).fail((xhr) => {
      Ryuna.unblockUI()
      Swal.fire({
        title: 'Whoops!',
        text: xhr?.responseJSON?.message ? xhr.responseJSON.message : 'Internal Server Error',
        type: 'error',
        confirmButtonColor: '#007bff'
      })
    })
  }

  function savePassword(){
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
</script>
@endsection