<h2>Data User</h2>

<a href="/users/create">+ Tambah User</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="/users/{{ $user->id }}/edit">Edit</a>

            <form action="/users/{{ $user->id }}/delete" method="POST" style="display:inline;">
                @csrf
                <button type="submit" onclick="return confirm('Yakin mau hapus?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>