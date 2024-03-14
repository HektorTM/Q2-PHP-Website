<!-- TODO: Reroute to routes and include login.php there? -->
<form class="login" method="post" action="merch.php">
    <p>
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username"/>
    </p>
    <p>
        <label for="pw">Password</label>
        <input type="password" placeholder="password" name="pw" />
    </p>
    <p>
        <input class="submit" type="submit" value="Login" />
    </p>
    <a href="/index.php/register">Register now!</a>
</form>