<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 50%; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror

            <label>Email:</label>
            <input type="email" name="email" required>
            @error('email') <p class="error">{{ $message }}</p> @enderror

            <label>Address:</label>
            <input type="text" name="address" required>
            @error('address') <p class="error">{{ $message }}</p> @enderror

            <label>Number:</label>
            <input type="text" name="number" required>
            @error('number') <p class="error">{{ $message }}</p> @enderror

            <label>Password:</label>
            <input type="password" name="password" required>
            @error('password') <p class="error">{{ $message }}</p> @enderror

            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" required>
            @error('confirm_password') <p class="error">{{ $message }}</p> @enderror

            <button type="submit">Submit</button>
        </form>

        <h1>User List</h1>
        <table>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Address</td>
                <td>Number</td>
                <td>Cction</td>
            </tr>
            
            @foreach ($users as $user)
            <tr>
                <td> {{ $user->name }}</td>
                <td> {{ $user->email }}</td>
                <td> {{ $user->address }}</td>
                <td> {{ $user->number }}</td>
                <td> 
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <!-- <form action="{{ route('users.destroy',$user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">DELETE</button>
                    </form> -->

                    <form action="{{ route('users.index', $user->id) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </table>
    </div>
</body>
</html>
