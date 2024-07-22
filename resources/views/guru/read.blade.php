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

<table class="table table-striped display" id="guruTable" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Mata Pelajaran</th>
            <th>Wali Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<Script>
    $(document).ready(function () {
        var table = $('#guruTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('guru.data_table') }}',
                data: function (d) {
                    d.filter_kelas = $('#filter_kelas').val();
                }
            },
            columns: [
                { data: 'nama', name: 'nama' },
                { data: 'nip', name: 'nip' },
                { data: 'mata_pelajaran', name: 'mata_pelajaran' },
                { data: 'nama_kelas', name: 'kelas.nama_kelas' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        $('#filterButton').on('click', function() {
            table.draw();
        });

        $('#resetButton').on('click', function() {
            $('#filter_kelas').val('');
            table.draw();
        });
    });