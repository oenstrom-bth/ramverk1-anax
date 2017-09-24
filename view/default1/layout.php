<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php foreach ($stylesheets as $stylesheet) : ?>
    <link rel="stylesheet" type="text/css" href="<?= $this->asset($stylesheet) ?>">
    <?php endforeach; ?>
    <?php foreach ($javascripts as $javascript) : ?>
    <script src="<?= $this->asset($javascript) ?>" defer></script>
    <?php endforeach; ?>
    <title><?= $title ?></title>
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php if ($this->regionHasContent("header")) : ?>
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <?php $this->renderRegion("header") ?>
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation">
            <?php if ($app->session->has("username")) : ?>
                <button id="signed-in-menu" class="mdl-button mdl-js-button">
                    <?= getGravatar($app->session->get("email"), true, 32) ?>
                    <!-- <i class="material-icons">account_box</i> -->
                    <i class="material-icons">arrow_drop_down</i>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="signed-in-menu">
                    <li class="mdl-menu__item" onclick="window.location = '<?= $this->url("user/profile") ?>'">Inloggad som <strong><?= $app->session->get("username") ?></strong></li>
                    <li class="mdl-menu__item" onclick="window.location = '<?= $this->url("user/profile") ?>'">Din profil</li>
                    <li class="mdl-menu__item" onclick="window.location = '<?= $this->url("user/logout") ?>'">Logga ut</li>
                </ul>
            <?php else : ?>
                <a href="<?= $this->url("user/login") ?>" class="mdl-navigation__link">Logga in</a>
                <a href="<?= $this->url("user/register") ?>" class="mdl-navigation__link">Skapa konto</a>
            <?php endif; ?>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <?php $this->renderRegion("header") ?>
        <?php if ($this->regionHasContent("navbar")) : ?>
        <?php $this->renderRegion("navbar") ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>


    <?php if ($this->regionHasContent("main")) : ?>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
            <?php $this->renderRegion("main") ?>
            </div>
        </div>
    </main>
    <?php endif; ?>

    <?php if ($this->regionHasContent("footer")) : ?>
    <footer class="mdl-mini-footer">
        <div class="mdl-mini-footer__left-section">
            <?php $this->renderRegion("footer") ?>
        </div>
    </footer>
    <?php endif; ?>
</div>
</body>
</html>
