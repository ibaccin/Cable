<div class="full">
    <div class="account">
        <h3>Please fill in all empty fields</h1>
        <form class="loginForm" method="POST">
            <div class="form-group">
                <label for="inputName">Your name</label>
                <input name="name" type="text" class="form-control" id="inputName" placeholder="Enter your name"required>
            </div>
            <div class="form-group">
                <label for="inputSurname">Your surname</label>
                <input name="surname" type="text" class="form-control" id="inputSurname" placeholder="Enter your surname"required>
            </div>
            <div class="form-group">
                <label for="inputBirthday">Your birthday</label>
                <input name="birthday" type="date" class="form-control" id="inputBirthday" required>
            </div>
            <div class="form-group">
                <label for="inputPhone">Your phone</label>
                <input name="phone" type="number" max="" class="form-control" id="inputPhone" placeholder="380 XX XXX XX XX"required>
                <small id="emailHelp" class="form-text text-muted">With out "+". Example "380 XX XXX XX XX"</small>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input name="user_email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email"required>
            </div>
            <div class="form-group">
                <label for="inputPass">Password</label>
                <input name="user_password" type="password" class="form-control" id="inputPass" placeholder="Password"required>
            </div>
            <div class="form-group">
                <label for="inputPass2">Confirm password</label>
                <input name="confirmPassword" type="password" class="form-control" id="inputPass2" placeholder="Password"required>
            </div>
            <div class="form-group">
                <label for="inputFile">You can choose your photo</label>
                <input name="user_avatar" type="file" class="form-control" id="inputFile">
            </div>
            <button type="submit" class="btn btn-dark">Login</button>
        </form>
    </div>
</div>