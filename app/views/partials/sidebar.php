<aside class="col-md-4 pull-right">
    <?php if (!$this->user): ?>
        <div class="well text-center">
            <p class="lead">
                Don't want to miss updates? Please click the below button!
            </p>
            <a href="<?= DIR_PUBLIC . 'user/register'; ?>" class="btn btn-primary btn-lg">Register Now!</a>
        </div>
    <?php endif; ?>

    <!-- Categories -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Categories</h4>
        </div>
        <ul class="list-group">
            <?php foreach ($this->categories as $categry): ?>
                <li class="list-group-item">
                    <a href="<?= DIR_PUBLIC . 'post/category/' . $categry['id']; ?>"><?= $categry['name'] ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <!-- Recent Comments -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Recent Comments</h4>
        </div>
        <ul class="list-group">
            <?php foreach ($this->comments as $comment): ?>
                <li class="list-group-item">
                    <a href="<?= DIR_PUBLIC . 'post/view/' . $comment['post_id']; ?>#comments"><?= $comment['content']; ?></a><br/>
                    <em><?= $comment['date']; ?>, from <?= $this->auth->get_user($comment['user_id'])['username'] ?></em>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <!-- Tags -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Tags</h4>
        </div>
        <div class="panel-body">
            <ul class="list-inline">
                <?php foreach ($this->tags as $tag): ?>
                    <li class="list-group-item">
                        <a href="<?= DIR_PUBLIC . 'post/tag/' . $tag['value']; ?>"><?= $tag['value'] ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

</aside>