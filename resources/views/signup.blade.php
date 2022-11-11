<link rel="stylesheet" href="/stylesheets/signup.css">


<body>
    <div class="signup-container">
        <img class="login-image" src="/assets/loginpage.webp" />
        <div class="user-signup">
            <h2 class="logo"><a href="/">LOGO</a></h2>
            <div class="signup-box">
                <h1> Sign up </h1>
                @include('errors')
                <form method="post" action="signup">
                    @csrf
                    <div>
                        <div class="input-column">
                            <label for="firstname">First name</label>
                            <input name="firstname" id="firstname" type="text" required />
                        </div>
                        <div class="input-column">
                            <label for="lastname">Last name</label>
                            <input name="lastname" id="lastname" type="text" required />
                        </div>
                        <div class="input-column">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" required />
                        </div>
                        <div class="input-column">
                            <label for="password">Password (8 characters minimum)</label>
                            <input name="password" id="password" type="password" minlength="8" required />
                        </div>
                        <div class="input-column">
                            <label for="password_confirmation">Confirm password</label>
                            <input name="password_confirmation" id="password_confirmation" type="password" required />
                        </div>
                    </div>
                    <div>
                        <div class="input-column">
                            <label for="address">Address</label>
                            <input name="address" id="address" type="text" required />
                        </div>
                        <div class="input-column">
                            <label for="postal_code">Postal Code</label>
                            <input name="postal_code" id="postal_code" type="number" required />
                        </div>
                        <div class="input-column">
                            <label for="city">City</label>
                            <input name="city" id="city" type="text" required />
                        </div>
                        <div class="input-column">
                            <label for="country">Country</label>
                            <input name="country" id="country" type="text" required />
                        </div>

                        <button class="signup-button" type="submit">Sign up</button>
                        <p>Already a member? <a href="/login">Log in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
