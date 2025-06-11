<div class="row">

    <div class="form-group col-md-12">
      <label>Nama Layanan <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Layanan" value="{{ @$data->nama }}">
    </div>
    
    <div class="form-group col-md-12">
      <label>Deskripsi <span class="text-danger">*</span></label>
      <textarea name="deskripsi" placeholder="Deskripsi" class="form-control">{{ @$data->deskripsi }}</textarea>
    </div>

    <div class="form-group col-md-12">
      <label>Harga <span class="text-danger">*</span></label>
      <input type="number" name="harga" class="form-control" placeholder="Harga" value="{{ @$data->harga }}">
    </div>

</div>
