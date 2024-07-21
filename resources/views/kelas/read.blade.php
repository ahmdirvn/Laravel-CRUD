<table class="table" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Nama Kelas</th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kelass as $kelas)
            <tr>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>
                    <button class="btn btn-warning" onclick="showKelas({{ $kelas->id }})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteKelas({{ $kelas->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>