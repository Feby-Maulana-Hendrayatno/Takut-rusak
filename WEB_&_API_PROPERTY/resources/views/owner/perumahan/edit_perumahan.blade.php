<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="oldGambar" value="{{ $edit->foto }}">
<div class="form-group">
    <label for="rsyarat"> Nama Perumahan </label>
    <input type="text" class="form-control" name="nama_perumahan" placeholder="Masukkan Nama Perumahan" value="{{ $edit->nama_perumahan }}">
</div>
<div class="form-group">
    <label for="rsyarat"> Uraian / Mott </label>
    <input type="text" class="form-control" name="uraian" placeholder="Masukkan Motto / Uraian" value="{{ $edit->uraian }}">
</div>
<div class="form-group">
    <label for="rsyarat"> Stock </label>
    <input type="text" class="form-control" name="stok" placeholder="Masukkan Jumlah Stock rumah yang tersedia" value="{{ $edit->stok }}">
</div>
<div class="form-group">
    <label for="foto">Foto</label>
    @if($edit->foto)
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ url('storage/'.$edit->foto) }}">
    @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
    @endif
    <input type="file"  name="foto" class="form-control" id="foto" placeholder="Masukan Foto/Gambar"  onchange="viewImage()">
</div>
<div class="form-group">
    <label for="rsyarat"> Alamat </label>
    <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat dari Perumahan" value="{{ $edit->alamat }}" >{{ $edit->alamat }}</textarea>
</div>

