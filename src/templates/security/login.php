<?=render('fragments/navbar.php', ['active'=>'login']);?>
<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-8">
            <h1 class="text-center">LOG IN</h1>
            <form method="POST" action="/login">
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <p class="text-danger"><?=$error?></p>

            <button type="submit" class="btn btn-primary">Log in!</button>
            </form> 
        </div>

    </div>
 
</div>

