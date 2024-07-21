
<div class="p2">
    <div class="form-group mb-2">
        <label for="nama_kelas"> Nama Kelas </label>
        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ (isset($kelas)) ? $kelas->nama_kelas : '' }}">
    </div>
    <div class="form-group mt-4">
        <button class="btn btn-primary" onclick="updateKelas({{ $kelas->id }})"> Simpan </button>
    </div>
</div>
