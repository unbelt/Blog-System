<div class="col-md-8 well">
    <header>
        <h1><?= App::$page_title; ?></h1>
    </header>

    <form role="form" method="post" id="register-form">
        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username"
                   autocomplete="off">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email"
                   value="<?= isset($user['email']) ? $user['email'] : ''; ?>"
                   placeholder="Email" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password"
                   placeholder="Password" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password_v">Verify Password:</label>
            <input class="form-control" type="password" name="password_v" id="password_v"
                   placeholder="Verify Password" autocomplete="off">
        </div>

        <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
    </form>
</div>