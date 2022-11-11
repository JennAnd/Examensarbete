<link rel="stylesheet" href="/stylesheets/login.css">

<body>
    <div class="login-container">
        <img class="login-image" src="/assets/loginpage.webp" />
        <div class="user-login">
            <h2 class="logo"><a href="/">LOGO</a></h2>
            <div class="login-box">
                <h1> Log in </h1>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @include('errors')
                <form method="post" action="login">
                    @csrf
                    <div class="input-column">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" required />
                    </div>
                    <div class="input-column">
                        <label for="password">Password</label>
                        <input name="password" id="password" type="password" required />
                    </div>
                    <button class="login-button" type="submit">Login</button>
                    <p>Not a member? <a href="/signup">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
