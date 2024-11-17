<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\Categoria;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\VarDumper;


$categorias=Categoria::find()->all();
$items=[];
foreach ($categorias as $key => $categoria) {
    $items[]= ['label' => $categoria->categoria, 'url' => ['/categoria/view', 'id' => $categoria->id]];
}


AppAsset::register($this);
\yidas\yii\fontawesome\FontawesomeAsset::register($this);
$this->title = Yii::t("app", "");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    $this->registerLinkTag([
        'rel' => 'icon',
        'type' => 'image/x-icon',
        'href' => Yii::getAlias('@web/images/vina32x32.png') // Ruta al logo de 32px para pestaña
    ]);
    
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.png', [
            'alt' => 'Vina Blossom',
            'class' => 'logo-class',
            'style' => 'height: 40px; margin-right: 5px;'
            ]) . Html::tag('span', 'Vina Blossom', ['style' => 'font-size: 1.25rem; font-weight: bold;']),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-md navbar-light bg-light fixed-top']
        ]);

    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Productos', 'url' => ['/producto/index']],
            [
                'label' => 'Categorías',
                'items' => $items
                //     // // ['label' => 'Bases', 'url' => ['/categoria/view/']],
                //     // ['label' => 'Correctores', 'url' => ['/producto/correctores']],
                //     // ['label' => 'Herramientas', 'url' => ['/producto/herramientas']],
                //     // ['label' => 'Labiales', 'url' => ['/producto/labiales']],
                //     // ['label' => 'Iluminadores', 'url' => ['/producto/iluminadores']],
                //     // ['label' => 'Sombras', 'url' => ['/producto/sombras']],
                //     // ['label' => 'Polvos', 'url' => ['/producto/polvos']],
                //     // ['label' => 'Rubores', 'url' => ['/producto/rubores']],
                //     // ['label' => 'Primers', 'url' => ['/producto/primers']],
                //     // ['label' => 'Mascaras', 'url' => ['/producto/mascaras']],
                //     // ['label' => 'Esmaltes', 'url' => ['/producto/esmaltes']],
                //     // ['label' => 'Contornos', 'url' => ['/producto/contornos']],
                //     // ['label' => 'Bronceadores', 'url' => ['/producto/bronceadores']],
                //     // ['label' => 'Fijadores', 'url' => ['/producto/fijadores']],
                //     // ['label' => 'Cejas', 'url' => ['/producto/cejas']],
        
                // ],
            ],
            '<li class="nav-item">' . Html::a('<i class="fas fa-shopping-cart"></i> (' . Yii::$app->cart->getItemCount() . ')', ['compra/view'], ['class' => 'nav-link']) . '</li>',
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
    <div class="container mt-5 pt-5">
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
            <div class="col-md-6 text-center text-md-end">
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-tiktok"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
