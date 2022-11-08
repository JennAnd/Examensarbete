<body>
    <h1> Sign up </h1>

    @include('errors')
    <form method="post" action="signup">
        @csrf
        <div>
            <label for="firstname">First name</label>
            <input name="firstname" id="firstname" type="text" required />
        </div>
        <div>
            <label for="lastname">Last name</label>
            <input name="lastname" id="lastname" type="text" required />
        </div>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" required />
        </div>
        <div>
            <label for="password">Password (8 characters minimum)</label>
            <input name="password" id="password" type="password" minlength="8" required />
        </div>
        <div>
            <label for="confirm_password">Password (8 characters minimum)</label>
            <input name="confirm_password" id="confirm_password" type="password" required />
        </div>
        <div>
            <label for="address">Address</label>
            <input name="address" id="address" type="text" required />
        </div>
        <div>
            <label for="postal_code">Postal Code</label>
            <input name="postal_code" id="postal_code" type="number" required />
        </div>
        <div>
            <label for="city">City</label>
            <input name="city" id="city" type="text" required />
        </div>
        <div>
            <label for="country">Country</label>
            <input name="country" id="country" type="text" required />
        </div>

        <button type="submit">Sign up</button>
    </form>


</body>

</html>
