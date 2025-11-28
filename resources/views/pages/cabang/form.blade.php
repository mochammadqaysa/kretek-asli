<div class="row">
    <div class="form-group col-md-12">
      <label>Nama Cabang <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Cabang" value="{{ @$data->nama }}">
    </div>

    <div class="form-group col-md-12">
      <label>Tautan Map <span class="text-danger">*</span></label>
      <input type="text" name="map_link" class="form-control" placeholder="Tautan Map" value="{{ @$data->map_link }}">
    </div>

    <div class="form-group col-md-6">
      <label>Latitude <span class="text-danger">*</span></label>
      <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{ @$data->latitude }}">
    </div>
    <div class="form-group col-md-6">
      <label>Longitude <span class="text-danger">*</span></label>
      <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{ @$data->longitude }}">
    </div>

    <div class="form-group col-md-12">
      <label>Alamat <span class="text-danger">*</span></label>
      <textarea class="form-control" name="alamat">{{ @$data->alamat }}</textarea>
    </div>
    


    <div class=" justify-content-md-start">
      <div class="col-md-6">
      <label for="logo">Gambar Cabang</label>
      <div class="logo_image_picker my-1 position-relative rounded overflow-hidden d-flex justify-content-center align-items-center" 
          style="height: 150px; width: 150px; border: 1.5px dotted #dee2e6; cursor: pointer;">
          
          <div class="text-center upload-placeholder">
              <i class="fas fa-upload fa-2x"></i>
              <p class="small">Klik di sini untuk mengunggah gambar</p>
          </div>

          <img id="imagePreview" src="" alt="Image Preview" class="img-thumbnail position-absolute w-100 h-100" 
              style="object-fit: cover; display: none;">

          <div class="loading_image_picker position-absolute w-100 h-100 d-none" 
              style="backdrop-filter: blur(2px); top: 0; left: 0;">
              <div class="d-flex justify-content-center align-items-center h-100">
                  <img src="{{ asset('img/loading2.gif') }}" style="height: 15px;">
                  <p class="small fw-bold ms-2">Tunggu Sebentar</p>
              </div>
          </div>
      </div>
      <input type="file" name="img_path" id="logo" autocomplete="off" style="display: none;">
    </div>
</div>
  
<script>


  $(() => {
    
    $('.logo_image_picker').on('click', function() {
        $('#logo').click();
    });

    $('#logo').change(function() {
      const file = this.files[0];
      const fileType = file['type'];
      const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
      
      if ($.inArray(fileType, validImageTypes) < 0) {
          alert('Hanya file gambar yang diperbolehkan (JPG, PNG, GIF).');
          $(this).val(''); // Clear the input if invalid file
          $('#imagePreview').hide();
          $('.upload-placeholder').show();
          return false;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview').attr('src', e.target.result).show();
          $('.upload-placeholder').hide();
      }
      reader.readAsDataURL(file);

      $('.loading_image_picker').removeClass('d-none');

      // Simulate loading delay for demo purposes
      setTimeout(function() {
          $('.loading_image_picker').addClass('d-none');
      }, 1000); // Adjust as needed
  });
  })
</script>