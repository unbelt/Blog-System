<div class="col-md-8 well">
    <header>
        <h1><?= App::$page_title; ?></h1>
    </header>

    <form role="form" method="post" id="register-form">

        <?php if ($this->is_logged) { ?>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name"
                       autocomplete="off" value="<?= $this->user['first_name'] ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name"
                       autocomplete="off" value="<?= $this->user['last_name'] ?>">
            </div>
        <?php } else { ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username"
                       autocomplete="off" value="<?= $this->user['username'] ?>">
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email"
                   placeholder="Email" autocomplete="off" value="<?= $this->user['email'] ?>">
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

        <?php if ($this->is_logged) { ?>
            <button type="submit" name="edit" id="edit" class="btn btn-success">Save</button>
        <?php } else { ?>
            <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
        <?php } ?>
    </form>
</div>