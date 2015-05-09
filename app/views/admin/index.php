<div class="col-md-4">
    <header>
        <h1>Post Manager</h1>
    </header>

    <div class="list-group">
        <a href="#" class="list-group-item">
            <p class="glyphicon glyphicon-pencil"> New Post</p>
        </a>

        <?php
        foreach ($data as $post): ?>
            <div class="list-group-item">
                <h4 class="list-group-item-heading"><?= $post['title']; ?></h4>

                <div class="pull-right">
                    <a href="<?= DIR_PUBLIC . 'admin/post/' . $post['id']; ?>" class="btn btn-danger btn-delete">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="<?= DIR_PUBLIC . 'admin/post/' . $post['id']; ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </div>

                <p class="list-group-item-text"><?= strip_tags(substr($post['content'], 0, 100)); ?></p>
            </div>
        <?php endforeach ?>

    </div>
</div>

<div class="col-md-8">

    <form method="post">
        <?php if (!empty($opened['image'])): ?>
            <label for="image">Image:</label>
            <div id="image">
                <div class="image-container"
                     style="background-image: url('<?= DIR_PUBLIC . 'img/' . $opened['image']; ?>')"></div>
            </div>
        <?php endif ?>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="<?= $opened['image']; ?>"/>
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $opened['title']; ?>"
                   placeholder="Title">
        </div>

        <div class="form-group">
            <label for="username">User:</label>

            <select class="form-control" name="username" id="username">
                <option value="0">No user</option>
                <?php
                foreach ($users as $user) {
                    echo "<option value=" . $user['username'] . " ";
                    selected($opened['username'], $user['username'], 'selected');
                    echo '>' . $user['username'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>

            <select class="form-control" name="category" id="category">
                <option value="0">No category</option>
                <?php
                foreach ($categories as $category) {
                    echo "<option value=" . $category['label'] . " ";
                    selected($opened['category'], $category['label'], 'selected');
                    echo '>' . $category['label'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags:</label>
            <input class="form-control" type="text" name="tags" id="tags" value="<?= $opened['tags']; ?>"
                   placeholder="Tags">
        </div>

        <div class="form-group">
            <label for="body">Content:</label>
            <textarea class="form-control editor" rows="8" name="content" id="content"
                      placeholder="Content"><?= $opened['content']; ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Save</button>
            <input type="hidden" name="post" value="1">
        </div>

        <?php if (isset($opened['id'])) { ?>
            <input type="hidden" name="id" value="<?= $opened['id']; ?>">
        <?php } ?>

    </form>
</div>