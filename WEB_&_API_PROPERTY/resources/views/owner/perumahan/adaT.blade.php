<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="oldGambar" value="{{ $edit->foto }}">

<div class="form-group">
    <label for="gambar"> Foto </label>
    @if ($edit->foto)
        <img src="{{ url('storage/' . $edit->foto) }}" class="gambar-lihat img-fluid" id="tampilGambar">
    @else
        <img class="gambar-lihat" id="tampilGambar">
    @endif
    <input type="file" class="form-control" name="gambar" id="gambar" onchange="imagePreview()">
</div>



<script>
    function imagePreview() {
        const image = document.querySelector("#gambar");
        const imgPreview = document.querySelector(".gambar-lihat");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>
