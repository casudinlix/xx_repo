<div class="pad">
  <form action="{!! route('update.pt') !!}" method="POST">
    <div class="box-body">
      @method('PUT')
      @csrf
      <input type="hidden" name="id" value="{{$project->id}}">
      <h4 class="mt-0 mb-20">1. Informasi Perusahaan:</h4>
      <div class="form-group">
        <label for="example_input_full_name">Nama Perusahaan</label>
        <input type="text" class="form-control" required placeholder="Nama Perusahaan" name="nama_perusahaan" value="{{$data->nama_perusahaan}}">
      </div>
      <div class="form-group">
        <label>Jenis Usaha:</label>
        <select class="form-control select2" name="jenis_usaha" required>
          <option value="">--</option>
          @foreach ($jenis as $key)
            <option value="{{$key->id}}" {{($key->id==$data->jenis_usaha_id)?"selected":""}}>{{$key->nama_jenis_usaha}}</option>

          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Total Lembar Saham Tersedia / Planing:</label>
        <input type="text" class="form-control" onkeypress="return angka(event)" name="total_lembar_saham" name="total_lembar_saham" value="{{$data->total_lembar_saham}}" required>
      </div>
      <div class="form-group">
        <label>Nilai Lembar Saham :</label>
        <div class="c-inputs-stacked">
          <input type="text" class="form-control" onkeypress="return angka(event)" name="nilai_lembar_saham" name="nilai_lembar_saham" value="{{$data->nilai_lembar_saham}}" required>
        </div>
      </div>
      <div class="form-group">
        <label>Kota:</label>
        <select class="form-control select2" name="kota">
          <option value="">--</option>
          @foreach (\Indonesia::allcities() as $key)
            <option value="{{$key->name}}" {{($key->name==$data->kota)?"selected":""}}>{{$key->name}}</option>

          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Negara:</label>

        <input type="text" class="form-control" name="negara" value="{{$data->negara}}" required>


      </div>
      <div class="form-group">
        <label>Tahun RUPS:</label>

        <input type="text" required class="form-control" name="rups" value="{{$data->rups}}" onkeypress="return angka(event)" placeholder="Ex 2019">

      </div>
      <hr>


    <!-- /.box-body -->
    <div class="box-footer">

      <button type="submit" class="btn btn-success pull-right">Perbarui</button>
    </div>
  </form>
</div>
