<form action="{{ route('login') }}" method="post">
    @csrf
    @method('post')
    <label for="username">enter username</label>
    <input type="text" name="username" id="username">

    <label for="password">enter password</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="login">
</form>
