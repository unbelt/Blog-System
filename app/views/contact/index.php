<div class="col-md-8">
    <header>
        <h1><?= App::$page_title; ?></h1>
    </header>

    <div class="well">
        <p class="lead">
            Any questions? You know what to do and how to do it, so get to it.
        </p>
    </div>

    <form role="form" method="post" id="contact-form">
        <div class="form-group">
            <label for="name" class="col-md-2">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="email" class="col-md-2">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="subject" class="col-md-2">Subject</label>
            <input type="subject" class="form-control" id="subject" name="subject" placeholder="Subject">
        </div>

        <div class="form-group">
            <label for="message" class="col-md-2">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message"></textarea>
        </div>

        <div class="form-group pull-right">
            <input type="submit" name="mail" class="btn btn-lg btn-primary" value="Submit your message!">
        </div>
    </form>
</div>
