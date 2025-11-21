<div class="row">

    <div class="form-group col-md-12">
      <label>Nama Cabang <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Cabang" value="{{ @$data->nama }}">
    </div>
    
    <div class="form-group col-md-12">
      <label>Alamat <span class="text-danger">*</span></label>
      <textarea name="alamat" placeholder="Alamat" class="form-control">{{ @$data->alamat }}</textarea>
    </div>


</div>
