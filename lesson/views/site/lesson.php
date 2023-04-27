<?php
/**
 * User: alexkhovich
 * Date: 27.04.23
 * Time: 10:16
 */

use lesson\models\UserLesson;
use lesson\models\User;
use yii\helpers\Html;

/** @var \lesson\models\Lesson $lesson */
/** @var $watched */

$user = Yii::$app->user->identity;
$this->title = $lesson->name;
$this->params['breadcrumbs'][] = ['label' => 'Уроки курса "Веб-разработка"', 'url' => ['lessons']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-lesson">

    <div class="mb-4 bg-body-tertiary rounded-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="display-5 fw-bold"><?=$lesson->name?></h1>
                    <p class="col-md-8 fs-4"><?=$lesson->description?></p>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <?=$lesson->code?>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <?php if($watched): ?>
                        <?=Html::button('Урок пройден <i class="fas fa-check-circle"></i>', ['class'=>'btn btn-outline-success', 'disabled'=>'disabled'])?>
                    <?php else: ?>
                        <?=Html::a('Отметить прохождение урока', '#',
                            [
                                'id' => 'lesson_view',
                                'data-lesson' => $lesson->id,
                                'data-user' => $user->id,
                                'class'=>'btn btn-outline-primary'])?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="mb-5">&nbsp;</div>

</div>
<?php
$script = <<< JS
    $(document).ready(function(){
        $('#lesson_view').on('click', function() {
            var userId = $(this).data('user');
            var lessonId = $(this).data('lesson');
            $.ajax({
                    type: "post",
                    url: "/site/view",
                    dataType: "json",
                    data: {user_id:userId,lesson_id:lessonId},
                    success: function(html){
                                if(html['flag'] == 'ok') {
                                    $(location).attr('href', '/site/lessons');
                                } else {
                                    alert('Произошла ошибка при выполнении запроса!');    
                                }
                                
                             },
                    error: function(html){
                                alert('Произошла ошибка при выполнении запроса!');
                             }
            });
        });
    });
JS;
$this->registerJs($script, yii\web\View::POS_READY);