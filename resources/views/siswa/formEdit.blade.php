
<div class="p2">
    <div class="form-group mb-2">
        <label for="nama"> Nama </label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ (isset($siswa)) ? $siswa->nama : '' }}">
    </div>
    <div class="form-group mb-2">
        <label for="email"> Email </label>
        <input type="email" name="email" id="email" class="form-control" value="{{ (isset($siswa)) ? $siswa->email : '' }}">
    </div>
    <div class="form-group mb-2">
        <label for="kelas"> Kelas </label>
        <input type="text" name="kelas" id="kelas" class="form-control" value="{{ (isset($siswa)) ? $siswa->kelas : '' }}">
    </div>
    <div class="form-group mb-2">
        <label for="nama"> Agama </label>
        <input type="text" name="agama" id="agama" class="form-control" value="{{ (isset($siswa)) ? $siswa->agama : '' }}">
    </div>
    <div class="form-group mt-4">
        <button class="btn btn-primary" onclick="updateSiswa({{ $siswa->id }})"> Simpan </button>
    </div>
</div>
