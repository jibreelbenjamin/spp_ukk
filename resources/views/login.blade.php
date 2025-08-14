@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form action="/login" method="POST">
    @csrf
    <label>Username:</label>
    <input type="text" name="username"><br><br>

    <label>Password:</label>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>
