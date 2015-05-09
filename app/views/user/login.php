<div class="col-md-8 well">
    <header>
        <h1><?= App::$page_title; ?></h1>
    </header>

    <form method="post" id="login-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <button type="submit" name="login" id="login" class="btn btn-success">Login</button>
    </form>
</div>