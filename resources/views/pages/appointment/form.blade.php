<div class="row">
    <!-- Nama Lengkap -->
    <div class="form-group col-md-12">
      <label>Nama Lengkap <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
        value="{{ old('nama', @$data->nama) }}">
    </div>

    <!-- Jenis Kelamin -->
    <div class="form-group col-md-12">
      <label>Jenis Kelamin <span class="text-danger">*</span></label><br>
      @php
        $jk = old('meta.jenis_kelamin', strtoupper(@$data->jenis_kelamin));
      @endphp
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="jenis_kelamin0" name="meta[jenis_kelamin]" class="custom-control-input" value="PRIA" {{ $jk == "PRIA" ? "checked" : "" }}>
        <label class="custom-control-label" for="jenis_kelamin0">Pria</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="jenis_kelamin1" name="meta[jenis_kelamin]" class="custom-control-input" value="WANITA" {{ $jk == "WANITA" ? "checked" : "" }}>
        <label class="custom-control-label" for="jenis_kelamin1">Wanita</label>
      </div>
    </div>

    <!-- Kontak -->
    <div class="form-group col-md-6">
      <label>Kontak</label>
      <input type="text" name="meta[kontak]" class="form-control" placeholder="Kontak"
        value="{{ old('meta.kontak', @$data->kontak) }}">
    </div>

    <!-- Email -->
    <div class="form-group col-md-6">
      <label>Email</label>
      <input type="text" name="meta[email]" class="form-control" placeholder="Email"
        value="{{ old('meta.email', @$data->email) }}">
    </div>

    <!-- Tanggal Lahir -->
    <div class="form-group col-md-12">
      <label>Tanggal Lahir <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="meta[tanggal_lahir]" id="tanggal_lahir"
        placeholder="Pilih Tanggal Lahir"
        value="{{ old('meta.tanggal_lahir', @$data->tanggal_lahir) }}" style="background-color: white;">
    </div>

    <!-- Alamat -->
    <div class="form-group col-md-12">
      <label>Alamat</label>
      <textarea name="meta[alamat]" placeholder="Alamat" class="form-control">{{ old('meta.alamat', @$data->alamat) }}</textarea>
    </div>

    <!-- Keluhan -->
    <div class="form-group col-md-12">
      <label>Keluhan <span class="text-danger">*</span></label>
      <textarea name="keluhan" placeholder="Keluhan" class="form-control">{{ old('keluhan', @$data->keluhan) }}</textarea>
    </div>

    <!-- Tanggal Janji Temu -->
    <div class="form-group col-md-6">
      <label>Tanggal Janji Temu <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="appointment_date" id="appointment_date"
        placeholder="Pilih Tanggal Janji Temu"
        value="{{ old('appointment_date', @$data->appointment_date) }}" style="background-color: white;">
    </div>

    <!-- Status -->
    <div class="form-group col-md-6">
      <label>Status <span class="text-danger">*</span></label>
      @php
        $statusList = [
          "0" => "Pending",
          "1" => "Konfirmasi",
          "2" => "Tolak",
        ];
        $currentStatus = old('status', @$data->status);
      @endphp
      <select name="status" class="form-control select2" id="txtStatus">
        @foreach($statusList as $key => $value)
          <option value="{{ $key }}" {{ $currentStatus == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
      </select>
      <div id="validationtxtStatus" class="invalid-feedback"></div>
    </div>
    <script>
  $('.select2').select2();
  $('#tanggal_lahir').flatpickr({
    static: true,
    dateFormat: "Y-m-d",
  })
  $('#appointment_date').flatpickr({
    enableTime: true,
    static: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
  })
</script>