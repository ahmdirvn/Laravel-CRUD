
<div class="p2">
    <div class="form-group mb-2">
        <label for="nama_kelas"> Nama Kelas </label>
        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ (isset($kelas)) ? $kelas->nama_kelas : '' }}">
    </div>
    <div class="form-group mb-2">
        <label for="wali_kelas"> Wali kelas </label>
        <select name="wali_kelas" id="wali_kelas" class="form-control" required>
            <option value="">Pilih Wali Kelas</option>
            @foreach($guru as $g)
                <option value="{{ $g->id }}" {{ (isset($kelas) && $kelas->wali_kelas == $g->id) ? 'selected' : '' }}>
                    {{ $g->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-4">
        <button class="btn btn-primary" onclick="updateKelas({{ $kelas->id }})"> Simpan </button>
    </div>
</div>
