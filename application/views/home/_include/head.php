<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>

    <link href="<?= base_url() ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <link href="<?= base_url() ?>asset/css/business-casual.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">NGEWARKOP YUUK ... </span>
        <span class="site-heading-lower">Penghilang stress</span>
    </h1>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item <?php if (current_url() == base_url()) echo "active" ?> px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="<?= base_url() ?>">Home
                        </a>
                    </li>
                    <li class="nav-item <?php if (current_url() == base_url('home/menu')) echo "active" ?> px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="<?= base_url() ?>home/menu">Menu
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>