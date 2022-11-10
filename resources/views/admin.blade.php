<head>
    <link rel="stylesheet" href="/stylesheets/admin.css">
</head>
<div class="admin-container">
    <img src="/assets/adminpage.webp" alt="">

    <div class="admin-login">

        <form method="post" action="login-admin">
            @csrf
            <div class="input-column">
                <label for="email">Username</label>
                <input name="email" id="email" type="email" />
            </div>
            <div class="input-column">
                <label for="password">Password</label>
                <input name="password" id="password" type="password" />
            </div>
            <button class="admin-button" type="submit">Login</button>
        </form>
        <div>
            @include('errors')
        </div>
    </div>
</div>
</body>

</html>
