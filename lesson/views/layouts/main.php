<?php
/**
 * User: alexkhovich
 * Date: 26.04.23
 * Time: 22:27
 */

/** @var \yii\web\View $this */
/** @var string $content */

use lesson\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Tekhical task example">
        <meta name="author" content="Alex Liakhovich">

        <link rel="icon" href="/favicon.ico" type="image/x-icon">

        <?php $this->registerCsrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header data-bs-theme="dark">
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <i class="fas fa-video"></i>
                    <strong style="margin-left: 15px;">Курс "Веб-разработка"</strong>
                </a>
            </div>
        </div>
    </header>

    <main class="flex-shrink-0">
        <div class="container mt-2">
            <?= \yii\bootstrap5\Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>

        <?=$content?>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <p class="mb-1">Курс по изучению  All rights reserved © Alex Liakhovich <?=date('Y', time())?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();