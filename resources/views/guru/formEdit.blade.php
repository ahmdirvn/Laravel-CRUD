
<div class="p2">
    <div class="form-group mb-2">
        <label for="nama"> Nama </label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ (isset($guru)) ? $guru->nama : '' }}">
    </div>
    <div class="form-group mb-2">
        <label for="nip"> NIP </label>
        <input type="number" name="nip" id="nip" class="form-control" value="{{ isset($guru) ? $guru->nip : '' }}">
    </div>
    <div class="form-group mb-2">
        <label for="mata_pelajaran"> Mata Pelajaran </label>
        <input type="mata_pelajaran" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="{{ (isset($guru)) ? $guru->mata_pelajaran : '' }}">
    </div>
    <div class="form-group mt-4">
        <button class="btn btn-primary" onclick="updateGuru({{ $guru->id }})"> Simpan </button>
    </div>
</div>
