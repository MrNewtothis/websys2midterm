<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label>Address:</label>
        <input type="text" name="address" value="{{ $user->address }}" required>

        <label>Number:</label>
        <input type="text" name="number" value="{{ $user->number }}" required>

        <label>New Password (optional):</label>
        <input type="password" name="password">

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password">

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('users.index') }}">Back to List</a>
</body>
</html>
