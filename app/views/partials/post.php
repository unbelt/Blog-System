<article>
    <h2><a href="<?= DIR_PUBLIC . 'post/view/' . $post['id']; ?>"><?= $post['title']; ?></a></h2>

    <div class="row">
        <div class="col-sm-6 col-md-5">
            <span class="glyphicon glyphicon-bookmark"></span>
            <?php
            $tags = $this->model->find(['columns' => 'tags', 'where' => 'id = ' . $post['id']]);
            if($tags){
                $tags = explode(', ', $tags[0]['tags']);
            }
            foreach ($tags as $tag)  { ?>
                <a href="<?= DIR_PUBLIC . 'post/tag/' . $tag ?>"><?= $tag ?></a>
            <?php } ?>
        </div>
        <div class="col-sm-6 col-md-7">
            <span class="glyphicon glyphicon-pencil"></span>
            <a href="<?= DIR_PUBLIC . 'post/view/' . $post['id']; ?>/#comment">Comments</a>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-time"></span> <?= $post['date']; ?>
            by <span
                class="glyphicon glyphicon-user"></span> <?= $this->auth->get_user($post['user_id'])['username']; ?>
            <span class="glyphicon glyphicon-eye-open"></span> <?= $post['views']; ?> views
        </div>
    </div>

    <hr/>

    <a href="<?= DIR_PUBLIC . 'post/view/' . $post['id']; ?>">
        <img src="<?= DIR_PUBLIC . 'img/' . $post['image']; ?>" class="img-responsive post-image">
    </a>

    <hr/>

    <p class="lead"><?= $post['content']; ?></p>

</article>