<table class="table" style="margin-top: 10px">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Agama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->kelas ? $siswa->kelas->nama_kelas : 'Belum ada kelas' }}</td>
                <td>{{ $siswa->agama }}</td>
                <td>
                    <button class="btn btn-warning" onclick="showSiswa({{ $siswa->id }})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteSiswa({{ $siswa->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>