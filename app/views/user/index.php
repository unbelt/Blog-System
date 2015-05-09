<div class="col-md-4">
    <section>
        <img src="<?= DIR_PUBLIC . 'img/' . $this->user['avatar'] ?>" alt="avatar" class="img-responsive imageborder">
    </section>
    <section>
        <hr>
        <a href="<?= DIR_PUBLIC . 'user/edit/' . $this->user['id'] ?>" class="btn btn-ar btn-block btn-warning">Edit
            your profile</a>
    </section>
</div>
<div class="col-md-8">
    <section>
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-user"></i> General Information</div>
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <td><?= $this->user['first_name'] . ' ' . $this->user['last_name']; ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?= $this->user['username']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:<?= $this->user['email']; ?>"><?= $this->user['email']; ?></a>
                    </td>
                </tr>
                <tr>
                    <th>Member Since</th>
                    <td><?= $this->user['date_reg']; ?></td>
                </tr>
            </table>
        </div>
    </section>

    <section>
        <h2 class="section-title">Latest Comments</h2>

        <div class="list-group-item">

            <ul class="commentList">
                <?php foreach ($comments as $comment): ?>
                    <hr/>
                    <li class="comment-<?= $comment['id']; ?>">
                        <a href="<?= DIR_PUBLIC . '/post/view/' . $comment['post_id']; ?>#comments" class="">
                            <div class="commenterImage">
                                <img src="<?= DIR_PUBLIC . 'img/' . $this->user['avatar']; ?>"/>
                            </div>
                            <div class="commentText">
                                <p><?= $comment['content']; ?></p>
                                <span class="date sub-text">on <?= $comment['date']; ?></span>
                            </div>
                        </a>
                    </li>

                <?php endforeach ?>
            </ul>

        </div>
    </section>
</div>
