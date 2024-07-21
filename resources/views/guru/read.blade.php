<table class="table" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gurus as $guru)
            <tr>
                <td>{{ $guru->nama }}</td>
                <td>{{ $guru->mata_pelajaran }}</td>
                <td>{{ $guru->kelas }}</td>
                <td>
                    <button class="btn btn-warning" onclick="showGuru({{ $guru->id }})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteGuru({{ $guru->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>