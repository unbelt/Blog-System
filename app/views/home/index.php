<div class="col-md-8">
    <?php foreach ($posts as $post): ?>
        <?php include DIR_VIEWS . '/partials/post.php' ?>
    <?php endforeach; ?>

    <hr/>
    <ul class="pager">
        <li class="previous"><a href="#">&larr; Previous</a></li>
        <li class="next"><a href="#">Next &rarr;</a></li>
    </ul>
    <hr/>
</div>