<?php
/**
 * User: alexkhovich
 * Date: 27.04.23
 * Time: 0:16
 */

use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var $allLessons */
/** @var $countLessons */
/** @var $watchedLessons */
/** @var $lastUserLessonId */
/** @var $lastLessonId */
/** @var \lesson\models\Lesson $lesson */

$user = Yii::$app->user->identity;
$this->title = 'Уроки курса "Веб-разработка"';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-lessons">
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Здравствуйте, <?=$user->username?>!</h5>
                            <?php if(($lastLessonId == $lastUserLessonId)&&$countLessons): ?>
                                <h6 class="card-subtitle mb-4 text-body-secondary" style="color: green;">Поздравляем! Вы изучили курс: Веб разработка</h6>
                                <div class="mt-5 d-flex justify-content-between">
                                    <p class="mb-0">
                                        <?=Html::a('Выйти',['/site/logout'],
                                            [
                                                'class' => 'btn btn-sm btn-secondary',
                                                'data' => [
                                                    'method' => 'post',
                                                ],
                                            ])?>
                                    </p>
                                </div>
                            <?php else: ?>
                                <h6 class="card-subtitle mb-4 text-body-secondary">Вы изучаете курс: Веб разработка</h6>
                                <p class="card-text">Всего уроков в курсе: <strong><?=$countLessons?></strong></p>
                                <?php if($countLessons): ?>
                                    <p class="card-text">Пройдено уроков: <strong style="color: green;"><?=$watchedLessons?></strong></p>
                                    <p class="card-text">Осталось пройти: <strong style="color: blue;"><?=$countLessons-$watchedLessons?></strong></p>
                                    <?php endif; ?>
                                    <div class="mt-5 d-flex justify-content-between">
                                        <?php if($countLessons): ?>
                                            <p class="mb-0">
                                                <?=Html::a('Смотреть следующий урок  &nbsp; <i class="fas fa-circle-play"></i>',['/site/lesson','id'=>$lastUserLessonId+1],['class' => 'btn btn-sm btn-primary'])?>
                                            </p>
                                        <?php endif; ?>
                                        <p class="mb-0">
                                            <?=Html::a('Выйти',['/site/logout'],
                                                [
                                                        'class' => 'btn btn-sm btn-secondary',
                                                        'data' => [
                                                            'method' => 'post',
                                                        ],
                                                ])?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <?php if($allLessons): ?>
                    <?php foreach ($allLessons as $lesson): ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <?=Html::a(Html::img('/'.$lesson->imagefile, ['class'=>'img-fluid', 'alt'=>$lesson->name]), ['/site/lesson', 'id'=>$lesson->id])?>
                                <div class="card-body">
                                    <p class="card-text" style="height: 120px; overflow: hidden;">
                                        <?=$lesson->announce?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <?php if($lesson->getUsers()->where(['id'=>$user->id])->one()): ?>
                                            <?=Html::a('Пройдено &nbsp; <i class="fas fa-check-circle"></i>', ['/site/lesson', 'id'=>$lesson->id],
                                                [
                                                    'class' => 'btn btn-sm btn-outline-success',
                                                ])?>
                                            <?php else: ?>
                                                <?php if($lesson->id == $lastUserLessonId+1): ?>
                                                    <?=Html::a('Смотреть &nbsp; <i class="fas fa-circle-play"></i>', ['/site/lesson', 'id'=>$lesson->id],
                                                        [
                                                            'class' => 'btn btn-sm btn-outline-primary',
                                                        ])?>
                                                <?php else: ?>
                                                    <?=Html::button('Смотреть &nbsp; <i class="fas fa-circle-play"></i>',
                                                        [
                                                            'class' => 'btn btn-sm btn-outline-secondary',
                                                            'disabled'=>'disabled',
                                                        ])?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-lg-12">
                        <strong><i>Не найдено уроков в базе данных!</i></strong>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<< JS
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
JS;
$this->registerJs($script, yii\web\View::POS_READY);