<body>
    <img class="login-image" src="/assets/loginpage.webp" />
    <h1> Log in </h1>

    @include('errors')
    <form method="post" action="login">
        @csrf
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" required />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" required />
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>
