<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

<h2>Form Create User</h2>

<form action="/users" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama"><br>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>