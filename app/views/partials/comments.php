<section id="comments">
    <header class="titleBox">
        <h2>Comments</h2>
        <i class="close fa fa-chevron-down"></i>
    </header>

    <div class="commentBox">
        <div class="actionBox">
            <ul class="commentList">
                <?php
                if ($comments) {
                foreach ($comments as $comment) {
                    if ($this->is_admin) {
                        echo '<i class="delete fa fa-times" data-commentid="' . $comment['id'] . '"></i>';
                    }
                    ?>

                    <i class="close fa fa-chevron-down" id="<?= $comment['id']; ?>"></i>
                    <li class="comment">
                        <div class="commenterImage">
                            <img src="<?= DIR_PUBLIC . 'img/' . $this->auth->get_user($comment['user_id'])['avatar']; ?>"/>
                        </div>
                        <div class="commentText">
                            <p><?= $comment['content']; ?></p>
                            <span class="date sub-text">on <?= $comment['date']; ?></span>
                            <span class="author sub-text">
                                by <?= $this->auth->get_user($comment['user_id'])['username']; ?>
                            </span>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php } else { ?>
            <div class="well">
                <p class="lead">
                    There is no comments at the moment. Write the first one?
                </p>
            </div>
        <?php } ?>
    </div>

    <form method="post" class="form-horizontal col-md-12" id="comment-form">
        <?php if ($this->is_logged) { ?>
            <input type="hidden" name="user_id" value="<?= $this->user['id']; ?>">
            <input type="hidden" name="user_email" value="<?= $this->user['email']; ?>">
        <?php } else { ?>
            <div class="form-group">
                <label for="user_email" class="col-md-2">Email</label>
                <div class="col-md-10">
                    <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email">
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="comment" class="col-md-2">Comment</label>
            <div class="col-md-10">
                <textarea rows="3" name="comment" id="comment" class="form-control" required="required"
                          placeholder="Your comment..."></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 text-right">
                <input type="submit" class="post-comment btn btn-lg btn-primary" value="Submit your comment!">
            </div>
        </div>

        <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
    </form>
</section>