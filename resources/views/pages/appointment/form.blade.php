@php
use App\Helpers\Utils;
@endphp
<div class="row">
    <!-- Nama Lengkap dengan Select2 -->
    <div class="form-group col-md-12">
      <label>Nama Lengkap <span class="text-danger">*</span></label>
      <input type="hidden" name="patient_uid" id="patient_uid" value="{{ @$data->patient->uid }}">
      <select name="nama" id="nama_pasien" class="form-control" style="width: 100%;">
        @if(isset($data->patient))
          <option value="{{ $data->patient->nama }}" selected>{{ $data->patient->nama }}</option>
        @endif
      </select>
      <small class="form-text text-muted">Ketik nama pasien untuk mencari data lama atau ketik nama baru</small>
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
    <div class="form-group col-md-12">
      <label>Kontak</label>
      <input type="text" name="meta[kontak]" id="kontak" class="form-control" placeholder="Kontak" value="{{ @$dataMeta['kontak'] }}">
    </div>

    <!-- Email -->
    {{-- <div class="form-group col-md-6">
      <label>Email</label>
      <input type="text" name="meta[email]" id="email" class="form-control" placeholder="Email" value="{{ @$dataMeta['email'] }}">
    </div> --}}

    <!-- Tanggal Lahir -->
    {{-- <div class="form-group col-md-12">
      <label>Tanggal Lahir <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="meta[tanggal_lahir]" id="tanggal_lahir"
        placeholder="Pilih Tanggal Lahir" value="{{ @$dataMeta['tanggal_lahir'] }}" style="background-color: white;">
    </div> --}}

    <!-- Alamat -->
    <div class="form-group col-md-12">
      <label>Alamat</label>
      <textarea name="meta[alamat]" id="alamat" placeholder="Alamat" class="form-control">{{ @$dataMeta['alamat'] }}</textarea>
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
          <option value="{{ $item->uid }}" {{ @$data->service->uid == $item->uid ? 'selected' : '' }}>{{ ucwords(strtolower($item->nama)) }} - {{ Utils::rupiah($item->harga) }} ({{ $item->durasi }} menit)</option>
        @endforeach
      </select>
      <div id="validationtxtService" class="invalid-feedback"></div>
    </div>

    <div class="form-group col-md-12">
      <label>Cabang <span class="text-danger">*</span></label>
      <select name="cabang" class="form-control select2" id="txtCabang">
        @foreach($cabang as $item)
          <option value="{{ $item->uid }}" {{ @$data->terapis->cabang->uid == $item->uid ? 'selected' : '' }}>{{ ucwords(strtolower($item->nama)) }}</option>
        @endforeach
      </select>
      <div id="validationtxtCabang" class="invalid-feedback"></div>
    </div>
    <div class="form-group col-md-12">
      <label>Terapis <span class="text-danger">*</span></label>
      <select name="terapis" class="form-control" disabled id="terapis">
        <option value=""></option>
        @if(isset($data->terapis))
        <option value="{{ $data->terapis->uid }}" selected>{{ $data->terapis->nama }}</option>
        @endif
      </select>
    </div>

    <!-- Tanggal Janji Temu -->
    <div class="form-group col-md-12">
      <label>Tanggal Janji Temu <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="appointment_date" id="appointment_date"
        placeholder="Pilih Tanggal Janji Temu"
        value="{{ @$data->date_sched }}" style="background-color: white;">
    </div>
</div>

<script>
  $(() => {
    let _urls = {
      terapis_select2: `{{ route('select2.terapis') }}`,
      patient_select2: `{{ route('select2.patient') }}`,
    };
    const daySchedule = @json($day_schedule);
    const morningSchedule = @json($morning_schedule);
    const afternoonSchedule = @json($afternoon_schedule);
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

    // Initialize Select2 for Patient Name with Tags (Allow custom input)
    $('#nama_pasien').select2({
      ajax: {
        url: _urls.patient_select2,
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            term: params.term,
            page: params.page || 0,
            limit: 10
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 0;
          let check = params.page + 1;
          return {
            results: data.items.map(item => ({
              id: item.nama, // Gunakan nama sebagai ID
              text: item.nama,
              data: item // Simpan semua data untuk digunakan nanti
            })),
            pagination: {
              more: (data.total - (check * 10)) > 0
            }
          };
        },
        cache: true
      },
      tags: true, // Memungkinkan input custom
      placeholder: 'Ketik nama pasien',
      allowClear: true,
      createTag: function (params) {
        var term = $.trim(params.term);
        if (term === '') {
          return null;
        }
        return {
          id: term,
          text: term,
          newTag: true // Tandai sebagai tag baru
        }
      }
    });

    // Event ketika pasien dipilih
    $('#nama_pasien').on('select2:select', function (e) {
      var data = e.params.data;
      
      // Jika data lama ditemukan
      if (data.data && !data.newTag) {
        // Isi semua field dengan data lama
        $('#patient_uid').val(data.data.id);
        
        // Set jenis kelamin
        if (data.data.jenis_kelamin) {
          $('input[name="meta[jenis_kelamin]"][value="' + data.data.jenis_kelamin + '"]').prop('checked', true);
        }
        
        // Set data lainnya
        $('#kontak').val(data.data.kontak || '');
        $('#email').val(data.data.email || '');
        $('#alamat').val(data.data.alamat || '');
        
        // Set tanggal lahir
        if (data.data.tanggal_lahir) {
          $('#tanggal_lahir').val(data.data.tanggal_lahir);
          // Jika menggunakan flatpickr, set value-nya
          if ($('#tanggal_lahir')[0]._flatpickr) {
            $('#tanggal_lahir')[0]._flatpickr.setDate(data.data.tanggal_lahir);
          }
        }
      } else {
        // Jika input manual (data baru), kosongkan patient_uid
        $('#patient_uid').val('');
      }
    });

    // Event ketika input dibersihkan
    $('#nama_pasien').on('select2:clear', function (e) {
      $('#patient_uid').val('');
      $('input[name="meta[jenis_kelamin]"]').prop('checked', false);
      $('#kontak').val('');
      $('#email').val('');
      $('#alamat').val('');
      $('#tanggal_lahir').val('');
      if ($('#tanggal_lahir')[0]._flatpickr) {
        $('#tanggal_lahir')[0]._flatpickr.clear();
      }
    });

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
                return activeDays.includes(day);
            }
        ],
        onClose: function(selectedDates, dateStr, instance) {
            const selectedDate = selectedDates[0];
            if (!isTimeAllowed(selectedDate)) {
                alert("Waktu yang dipilih di luar jam layanan (pagi: " + morningSchedule.join(" - ") + ", siang: " + afternoonSchedule.join(" - ") + ").");
                instance.clear();
            }
        }
    });

    function formatResultCustomer(res) {
      if (res.loading) return res.text;
      
      const $container = $(
        `<div class='select2-result-repository clearfix'>
          <div class='select2-result-repository__avatar'><img src='${base_url}img/default-avatar.png'/></div>
          <div class='select2-result-repository__meta'>
            <div class='select2-result-repository__title'>${res.nama || '-'}</div>
            <div class='select2-result-repository__description'>${''}</div>
          </div>
        </div>`
      );
      
      return $container;
    }

    function formatSelectionCustomer(res) {
      return res.nama || res.text;
    }

    function loadTerapis(tipe) {
      $('#terapis').select2({
        ajax: {
          url: _urls.terapis_select2,
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              term: params.term,
              page: params.page || 0,
              limit: 10,
              cabang: tipe
            };
          },
          processResults: function (data, params) {
            params.page = params.page || 0;
            let check = params.page + 1;
            return {
              results: data.items,
              pagination: {
                more: (data.total - (check * 10)) > 0
              }
            };
          },
          cache: true
        },
        placeholder: 'Choose One',
        templateResult: formatResultCustomer,
        templateSelection: formatSelectionCustomer
      });
    }

    var initialCabang = $('#txtCabang').val();
    if(initialCabang) {
      $('#terapis').prop('disabled', false);
      loadTerapis(initialCabang);
    }

    $("#txtCabang").change(function() {
      var cabang = $(this).val();
      $('#terapis').val(null).trigger('change');
      $('#terapis').prop('disabled', false);
      loadTerapis(cabang);
    });
  })
</script>