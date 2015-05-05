<div class="col-md-8">
    <?php foreach ($data as $posts => $post): ?>
        <article>
            <h2><a href="<?= 'http://' ?>"><?= $post['title']; ?></a></h2>

            <div class="row">
                <div class="col-sm-6 col-md-5">
                    <span class="glyphicon glyphicon-bookmark"></span> <a href="<?= 'http://' ?>">Tags</a>
                </div>
                <div class="col-sm-6 col-md-7">
                    <span class="glyphicon glyphicon-pencil"></span> <a href="<?= "http://#comment"; ?>">Comments</a>
                    &nbsp;&nbsp;<span
                        class="glyphicon glyphicon-time"></span> <?= 'date' . ' by ' . 'username' . ' <i class="fa fa-eye"></i> ' . 'counter' . ' views'; ?>
                </div>
            </div>

            <hr>

            <a href="<?= 'http://'; ?>"><img src="<?= DIR_PUBLIC . 'img/' . 'image-url'; ?>"
                                             class="img-responsive post-image"></a>
        </article>
    <?php endforeach; ?>

    <hr/>
    <ul class="pager">
        <li class="previous"><a href="#">&larr; Previous</a></li>
        <li class="next"><a href="#">Next &rarr;</a></li>
    </ul>
    <hr/>
</div>