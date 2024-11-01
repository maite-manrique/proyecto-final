<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'estilo-nav  navbar-expand-md fixed-top bg-transparent']
    ]);
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav estilo-nav '],
        'items' => [
            ['label' => 'Home<i class="fas fa-user"></i>', 'url' => ['/site/index']],
            ['label' => 'Bases', 'url' => ['/site/about']],
            ['label' => 'Productos', 'url' => ['/producto/index']],
            ['label' => 'Correctores', 'url' => ['/site/contact']],
            ['label' => 'Herramientas', 'url' => ['/site/contact']],
            ['label' => 'Labiales', 'url' => ['/site/contact']],
            ['label' => 'Iluminadores', 'url' => ['/site/contact']],
            ['label' => 'Sombras', 'url' => ['/site/contact']],
            ['label' => 'Polvos', 'url' => ['/site/contact']],
            ['label' => 'Rubores', 'url' => ['/site/contact']],
            ['label' => 'Primers', 'url' => ['/site/contact']],
            ['label' => 'Mascaras', 'url' => ['/site/contact']],
            ['label' => 'Esmaltes', 'url' => ['/site/contact']],
            ['label' => 'Contornos', 'url' => ['/site/contact']],
            ['label' => 'Bronceadores', 'url' => ['/site/contact']],
            ['label' => 'Fijadores', 'url' => ['/site/contact']],
            ['label' => 'Cejas', 'url' => ['/site/contact']],
            ['label' => '<i class="fas fa-shopping-cart"></i>', 'url' => ['/compra/view']],
            ['label' => 'Usuario', 'url' => ['/site/contact']],

            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
        
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Tienda online de maquillaje. Todos los derechos reservados <?= date('Y') ?></div>
            <div class="">
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-tiktok"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
