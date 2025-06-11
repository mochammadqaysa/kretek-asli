@php
use App\Helpers\Utils;
@endphp
<div class="row">
    <!-- Nama Lengkap -->
    <div class="form-group col-md-12">
      <label>Nama Lengkap <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ @$data->patient->nama }}">
    </div>

    <!-- Jenis Kelamin -->
    <div class="form-group col-md-12">
      <label>Jenis Kelamin <span class="text-danger">*</span></label><br>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="jenis_kelamin0" name="meta[jenis_kelamin]" class="custom-control-input" value="PRIA" {{ @$dataMeta['jenis_kelamin'] == "PRIA" ? "checked" : "" }}>
        <label class="custom-control-label" for="jenis_kelamin0">Pria</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="jenis_kelamin1" name="meta[jenis_kelamin]" class="custom-control-input" value="WANITA" {{ @$dataMeta['jenis_kelamin'] == "WANITA" ? "checked" : "" }}>
        <label class="custom-control-label" for="jenis_kelamin1">Wanita</label>
      </div>
    </div>

    <!-- Kontak -->
    <div class="form-group col-md-6">
      <label>Kontak</label>
      <input type="text" name="meta[kontak]" class="form-control" placeholder="Kontak" value="{{ @$dataMeta['kontak'] }}">
    </div>

    <!-- Email -->
    <div class="form-group col-md-6">
      <label>Email</label>
      <input type="text" name="meta[email]" class="form-control" placeholder="Email" value="{{ @$dataMeta['kontak'] }}">
    </div>

    <!-- Tanggal Lahir -->
    <div class="form-group col-md-12">
      <label>Tanggal Lahir <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="meta[tanggal_lahir]" id="tanggal_lahir"
        placeholder="Pilih Tanggal Lahir" value="{{ @$dataMeta['tanggal_lahir'] }}" style="background-color: white;">
    </div>

    <!-- Alamat -->
    <div class="form-group col-md-12">
      <label>Alamat</label>
      <textarea name="meta[alamat]" placeholder="Alamat" class="form-control">{{ @$dataMeta['alamat'] }}</textarea>
    </div>

    <!-- Keluhan -->
    <div class="form-group col-md-12">
      <label>Keluhan <span class="text-danger">*</span></label>
      <textarea name="keluhan" placeholder="Keluhan" class="form-control">{{ old('keluhan', @$data->keluhan) }}</textarea>
    </div>
    <div class="form-group col-md-12">
      <label>Layanan <span class="text-danger">*</span></label>
      <select name="service" class="form-control select2" id="txtService">
        @foreach($service as $item)
          <option value="{{ $item->uid }}" {{ @$data->service->uid == $item->uid ? 'selected' : '' }}>{{ ucwords(strtolower($item->nama)) }} - {{ Utils::rupiah($item->harga) }}</option>
        @endforeach
      </select>
      <div id="validationtxtService" class="invalid-feedback"></div>
    </div>

    <!-- Tanggal Janji Temu -->
    <div class="form-group col-md-6">
      <label>Tanggal Janji Temu <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="appointment_date" id="appointment_date"
        placeholder="Pilih Tanggal Janji Temu"
        value="{{ @$data->date_sched }}" style="background-color: white;">
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
      @endphp
      <select name="status" class="form-control select2" id="txtStatus">
        @foreach($statusList as $key => $value)
          <option value="{{ $key }}" {{ @$data->status == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
      </select>
      <div id="validationtxtStatus" class="invalid-feedback"></div>
    </div>
<script>
  $(() => {
    const daySchedule = @json($day_schedule);
    const morningSchedule = @json($morning_schedule);  // ["07:00", "12:00"]
    const afternoonSchedule = @json($afternoon_schedule); // ["14:00", "17:00"]
    const dayMap = {
        Sunday: 0,
        Monday: 1,
        Tuesday: 2,
        Wednesday: 3,
        Thursday: 4,
        Friday: 5,
        Saturday: 6,
    };

    const activeDays = daySchedule.map(day => dayMap[day]);

    function isTimeAllowed(date) {
        const hours = date.getHours();
        const minutes = date.getMinutes();
        const totalMinutes = hours * 60 + minutes;

        const [mStartH, mStartM] = morningSchedule[0].split(":").map(Number);
        const [mEndH, mEndM] = morningSchedule[1].split(":").map(Number);
        const [aStartH, aStartM] = afternoonSchedule[0].split(":").map(Number);
        const [aEndH, aEndM] = afternoonSchedule[1].split(":").map(Number);

        const morningStartMin = mStartH * 60 + mStartM;
        const morningEndMin = mEndH * 60 + mEndM;
        const afternoonStartMin = aStartH * 60 + aStartM;
        const afternoonEndMin = aEndH * 60 + aEndM;

        return (
            (totalMinutes >= morningStartMin && totalMinutes <= morningEndMin) ||
            (totalMinutes >= afternoonStartMin && totalMinutes <= afternoonEndMin)
        );
    }
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
        minDate: "today",

        enable: [
            function(date) {
                const day = date.getDay();
                return activeDays.includes(day); // hanya hari aktif
            }
        ],

        onClose: function(selectedDates, dateStr, instance) {
            const selectedDate = selectedDates[0];
            if (!isTimeAllowed(selectedDate)) {
                alert("Waktu yang dipilih di luar jam layanan (pagi: " + morningSchedule.join(" - ") + ", siang: " + afternoonSchedule.join(" - ") + ").");
                instance.clear(); // Kosongkan input
            }
        }
    });


  })
</script>