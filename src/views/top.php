<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/app.css">
  <title><?= $title ?? 'no name' ?></title>
</head>
<body>

<?php use App\Auth\Authorization as A; ?>

<ul class="meniu">
  <li class="<?= URI[0] == '' ? 'active' : '' ?>"><a href="<?= URL ?>">BANKAS</a></li>

  <?php if (A::auth()): ?>
    <li class="<?= URI[0] == 'list' ? 'active' : '' ?>"><a href="<?= URL ?>list">SĄSKAITŲ SĄRAŠAS</a></li>
    <li class="<?= URI[0] == 'new' ? 'active' : '' ?>"><a href="<?= URL ?>new">NAUJA SĄSKAITA</a></li>
  <?php endif; ?>


<?php 
require __DIR__.'/logout.php';
require __DIR__.'/messages.php';