<form action='/loginSubmit' method="post">
    @csrf
    <label>username</label>
    <input type="text" name="username" placeholder="username">
    <label>password</label>
    <input type="password" name="password" placeholder="password">
    <input type="submit">
</form>
