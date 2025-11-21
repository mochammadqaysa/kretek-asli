<div class="row">

    <div class="form-group col-md-12">
      <label>Nama Terapis <span class="text-danger">*</span></label>
      <input type="text" name="nama" class="form-control" placeholder="Nama Terapis" value="{{ @$data->nama }}">
    </div>
    
    <div class="form-group col-md-12">
      <label>Cabang <span class="text-danger">*</span></label>
      <select name="cabang" class="form-control select2" id="txtCabang">
        @foreach($cabang as $item)
          <option value="{{ $item->uid }}" {{ @$data->cabang->uid == $item->uid ? 'selected' : '' }}>{{ ucwords(strtolower($item->nama)) }}</option>
        @endforeach
      </select>
      <div id="validationtxtCabang" class="invalid-feedback"></div>
    </div>

</div>
<script>
  $(() => {
    $('.select2').select2();
  })
</script>
