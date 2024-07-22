<table class="table table-striped display" id="kelasTable" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<Script>
    $(document).ready(function () {
        var table = $('#kelasTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('kelas.data_table') }}',
            },
            columns: [
                { data: 'nama_kelas', name: 'nama_kelas' }, 
                { data: 'wali_kelas', name: 'wali_kelas' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>