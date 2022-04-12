<?=render('fragments/navbar.php', ['active'=>'signup']);?>
<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-8">
            <h1 class="text-center">SIGN UP</h1>
            <form>
                <div class="form-group mb-2">
                    <label for="username_input">Username</label>
                    <input type="text" class="form-control" id="username_input" placeholder="Enter username">
                </div>
                <div class="form-group mb-2">
                    <label for="email_input">Email address</label>
                    <input type="email" class="form-control" id="email_input" placeholder="Enter email">
                </div>
                <div class="form-group mb-2">
                    <label for="password_input">Password</label>
                    <input type="password" class="form-control" id="password_input" placeholder="Password">
                </div>
                <div class="form-group mb-2">
                    <label for="repeat_password_input">Repeat password</label>
                    <input type="password" class="form-control" id="repeat_password_input" placeholder="Repeat password">
                </div>
                <button type="submit" class="btn btn-primary">Sign up!</button>
            </form>
        </div>

    </div>
</div>

