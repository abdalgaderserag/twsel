<form action="{{ route('register') }}" method="post">
    @csrf
    @method('post')
    <label for="name">enter name :</label>
    <input type="text" name="name"><br>

    <label for="email">enter email :</label>
    <input type="email" name="email"><br>

    <label for="password">enter password :</label>
    <input type="password" name="password"><br>

    <label for="password_validation">reenter password :</label>
    <input type="password" name="password_validation"><br>

    <label for="contact">enter phone number :</label>
    <input type="tel" name="contact"><br>

    <input type="checkbox" name="agree">
    <label>do you agree</label><br>
    <button type="submit">Register</button>

</form>
