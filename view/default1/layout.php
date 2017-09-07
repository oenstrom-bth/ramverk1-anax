<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?php foreach ($stylesheets as $stylesheet) : ?>
    <link rel="stylesheet" type="text/css" href="<?= $this->asset($stylesheet) ?>">
    <?php endforeach; ?>
</head>
<body>

<?php if ($this->regionHasContent("header")) : ?>
<div class="outer-header-wrap margin-bottom-20">
    <div class="inner-header-wrap container">
        <div class="row">
        <?php $this->renderRegion("header") ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent("navbar")) : ?>
<div class="navbar-wrap">
    <?php $this->renderRegion("navbar") ?>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent("main")) : ?>
<div class="outer-main-wrap margin-bottom-20">
    <div class="inner-main-wrap container">
        <div class="row">
        <?php $this->renderRegion("main") ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent("footer")) : ?>
<div class="outer-footer-wrap">
    <div class="inner-footer-wrap container">
        <div class="row">
        <?php $this->renderRegion("footer") ?>
        </div>
    </div>
</div>
<?php endif; ?>

</body>
</html>
