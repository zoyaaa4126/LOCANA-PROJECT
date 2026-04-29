<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Form Edit User</h2>

<form action="/users/{{ $user->id }}" method="POST">
    @csrf

    <input type="text" name="name" value="{{ $user->name }}"><br>
    <input type="text" name="username" value="{{ $user->username }}"><br>
    <input type="email" name="email" value="{{ $user->email }}"><br>

    <button type="submit">Update</button>
</form>

</body>
</html>