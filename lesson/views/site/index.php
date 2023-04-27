<?php
/**
 * User: alexkhovich
 * Date: 26.04.23
 * Time: 22:33
 */

/** @var \yii\web\View $this */

$this->title = "Курс по изучению";

?>

<div class="site-index">
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">ВЕБ-РАЗРАБОТКА</h1>
                <p class="lead text-body-secondary">
                    Онлайн-школа IT-профессий - Айтилогия. В этом канале вы найдете видеоуроки и мастер-классы по созданию сайтов, разработке, веб-дизайну, фрилансу, фишкам в IT и многому другому. Подписывайтесь, чтобы быть первым в курсе всех новостей Айтилогии!
                </p>
                <p>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <?=\yii\helpers\Html::a('Войти для изучения', ['/site/login'], ['class'=>"btn btn-primary my-2"])?>
                    <?php else: ?>
                        <?=\yii\helpers\Html::a('Перейти к курсу', ['/site/lessons'], ['class'=>"btn btn-success my-2"])?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </section>
</div>
