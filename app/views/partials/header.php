<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?> | Blog System</title>
    <link rel="stylesheet" href="<?= DIR_PUBLIC ?>css/main.css">
    <link rel="stylesheet" href="<?= DIR_PUBLIC ?>libs/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?= DIR_PUBLIC ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= DIR_PUBLIC ?>img/favicon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="author" content="unbelt">
    <meta name="keywords" content="blog, system">
    <meta name="description" content="Blog System">

</head>
<body>

<!--Navigation-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= DIR_PUBLIC ?>home">The Blob</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= DIR_PUBLIC ?>home">Home</a></li>
                <li><a href="<?= DIR_PUBLIC ?>about">About</a></li>
                <li><a href="<?= DIR_PUBLIC ?>contact">Contact</a></li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= DIR_PUBLIC ?>login">Login</a></li>
                <li><a href="<?= DIR_PUBLIC ?>register">Register</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <span>
                        User |
                        <a href="<?= DIR_PUBLIC ?>logout">Logout</a>
                    </span>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<!--Main Content-->
<div id="main">
    <div class="container">