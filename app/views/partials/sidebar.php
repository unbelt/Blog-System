<aside class="col-md-4">
    <?php if (!isset($user['username'])): ?>
        <div class="well text-center">
            <p class="lead">
                Don't want to miss updates? Please click the below button!
            </p>
            <a href="<?= DIR_PUBLIC . 'register'; ?>" class="btn btn-primary btn-lg">Register Now!</a>
        </div>
    <?php endif; ?>

    <!-- Latest Posts -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Latest Posts</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?= DIR_PUBLIC . 'post/id' ?>"><?= 'post' ?></a>
            </li>
        </ul>
    </div>

    <!-- Categories -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Categories</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?= '#' ?>"><?= 'category' ?></a>
            </li>
        </ul>
    </div>

    <!-- Tags -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Tags</h4>
        </div>
        <div class="panel-body">
            <ul class="list-inline">
                <li class="list-group-item">
                    <a href="<?= '#' ?>"><?= 'tag' ?></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Recent Comments -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Recent Comments</h4>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?= DIR_PUBLIC . 'post/' . 'id' . '-' . 'slug'; ?>"><?= 'comment'; ?></a><br/>
                <em>from <?= 'username' ?></em>
            </li>
        </ul>
    </div>

</aside>