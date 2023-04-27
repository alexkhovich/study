<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <div class="container">
        <div class="row py-5">
            <div class="col-lg-12">
                <h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    Произошла ошибка при обработке Вашего запроса сервером.
                </p>
                <p>
                    Пожалуйста, сообщите нам, если Вы считаете, что это ошибка сервера. Спасибо!
                </p>
            </div>
        </div>
    </div>



</div>
