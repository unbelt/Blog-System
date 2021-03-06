<div class="col-md-4">
    <header>
        <h1>Post Manager</h1>
    </header>

    <div class="list-group">
        <a href="<?= DIR_PUBLIC . 'admin' ?>" class="list-group-item">
            <p class="glyphicon glyphicon-pencil"> New Post</p>
        </a>

        <?php foreach ($this->data as $post): ?>
            <div class="list-group-item">
                <h4 class="list-group-item-heading"><?= $post['title']; ?></h4>

                <div class="pull-right clearfix">
                    <a href="<?= DIR_PUBLIC . 'admin/post/' . $post['id']; ?>" class="btn btn-default">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="<?= DIR_PUBLIC . 'admin/delete/' . $post['id']; ?>" class="btn btn-danger btn-delete">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>

                <p class="list-group-item-text"><?= strip_tags(substr($post['content'], 0, 100)); ?></p>
            </div>
        <?php endforeach ?>
    </div>

    <form method="post">
        <div class="form-group">
            <label for="title">Add Category</label>
            <input class="form-control" type="text" name="category" id="category" placeholder="Category name">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Save</button>
        </div>
    </form>
</div>

<div class="col-md-8">

    <form enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <?php if (!empty($opened['image'])): ?>
                <div class="img-responsive">
                    <img class="img-thumbnail" width="400" src="<?= DIR_PUBLIC . 'img/' . $opened['image']; ?>"
                         alt="NO IMAGE"/>
                </div>
            <?php endif ?>

            <label for="image">Image:</label>
            <input type="file" class="form-control" name="file" id="file"/>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option <?php $this->selected($opened['status'], 1, 'selected') ?> value="1" selected="selected">
                    Published
                </option>
                <option <?php $this->selected($opened['status'], 2, 'selected') ?> value="2">Private</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $opened['title']; ?>"
                   placeholder="Title">
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" name="category_id" id="category_id">
                <?php foreach ($this->categories as $category) : ?>
                    <option <?php $this->selected($opened['category_id'], $category['id'], 'selected') ?>
                        value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
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
        </div>

        <input type="hidden" name="user_id" value="<?= $this->user['id'] ?>"/>

        <?php if (isset($opened['id'])) { ?>
            <input type="hidden" name="id" value="<?= $opened['id']; ?>">
        <?php } ?>

    </form>
</div>