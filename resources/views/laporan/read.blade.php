<div class="col-2"> 
    <select id="filter_kelas" class="form-select">
        <option value="">Select Kelas</option>
        @foreach($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
    </select> <br>
    
    <button id="filterButton" class="btn btn-primary">Filter</button>
    <button id="resetButton" class="btn btn-secondary">Reset</button>
</div>

<table class="table table-striped display" id="laporanTable" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Guru</th>
            <th>Kelas</th>
            <th>Siswa</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        var table = $('#laporanTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('laporan.data_table') }}',
                    data: function (d) {
                    d.filter_kelas = $('#filter_kelas').val(); // Kirim filter_kelas ke server
                }
            },
            columns: [
                { data: 'nama_guru', name: 'nama_guru' },
                { data: 'nama_kelas', name: 'nama_kelas' },
                { data: 'nama_siswa', name: 'nama_siswa' },
            ]
        });

        $('#filterButton').on('click', function() {
            table.draw(); // Redraw table with new filter
        });

        $('#resetButton').on('click', function() {
            $('#filter_kelas').val('');
            table.draw(); // Redraw table without filter
        });
    });
</script>
