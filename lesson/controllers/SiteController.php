<?php
/**
 * User: alexkhovich
 * Date: 26.04.23
 * Time: 22:26
 */

namespace lesson\controllers;

use lesson\forms\LoginForm;
use lesson\models\Lesson;
use lesson\models\User;
use lesson\models\UserLesson;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'lessons', 'lesson', 'view', 'reset'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'view' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    public function actionView()
    {
        $ajaxFlag = 'error';

        $request = Yii::$app->request;
        $user_id = $request->post('user_id');
        $lesson_id = $request->post('lesson_id');

        if($user_id&&$lesson_id){

            $user = User::findOne($user_id);
            $lesson = Lesson::findOne($lesson_id);
            if($user&&$lesson) {
                $userLesson = UserLesson::find()->forUser($user)->forLesson($lesson)->limit(1)->one();
                if(!$userLesson){
                    $userLesson = new UserLesson();
                    $userLesson->user_id = $user->id;
                    $userLesson->lesson_id = $lesson->id;
                    if($userLesson->save()){
                        $ajaxFlag = 'ok';
                    }
                }
            }
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['flag' => $ajaxFlag];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionLessons()
    {
        $user = Yii::$app->user->identity;

        $allLessons = Lesson::find()->with('users')->all();

        $countLessons = Lesson::find()->count();

        $watchedLessons = UserLesson::find()->forUser($user)->count();

        $lastUserLesson = UserLesson::find()->forUser($user)->orderByIdDesc()->limit(1)->one();

        $lastLesson = Lesson::find()->orderBy('id DESC')->limit(1)->one();
        if($lastLesson){
            $lastLessonId = $lastLesson->id;
        } else {
            $lastLessonId = 0;
        }

        if($lastUserLesson){
            $lastUserLessonId = $lastUserLesson->lesson_id;
        } else {
            $lastUserLessonId = 0;
        }

        return $this->render('lessons',[
            'allLessons' => $allLessons,
            'countLessons' => $countLessons,
            'watchedLessons' => $watchedLessons,
            'lastUserLessonId' => $lastUserLessonId,
            'lastLessonId' => $lastLessonId,
        ]);
    }

    public function actionLesson($id)
    {
        $lesson = $this->findLesson($id);

        $user = Yii::$app->user->identity;

        $watched = false;

        if($lesson->getUserLessons()->where(['user_id'=>$user->id])->one()){
            $watched = true;
        }

        return $this->render('lesson', [
            'lesson' => $lesson,
            'watched' => $watched,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        //$this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('lessons');
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionReset()
    {
        $user_id = Yii::$app->user->id;

        UserLesson::deleteAll(['user_id'=>$user_id]);

        return $this->redirect('lessons');
    }

    /**
     * @param $id
     * @return Lesson|null
     * @throws NotFoundHttpException
     */
    protected function findLesson($id)
    {
        if (($city = Lesson::findOne(['id' => $id])) !== null) {
            return $city;
        }

        throw new NotFoundHttpException('Запрашиваемый урок не найден!');
    }

}