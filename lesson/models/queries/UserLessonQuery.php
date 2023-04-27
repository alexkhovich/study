<?php
/**
 * User: alexkhovich
 * Date: 27.04.23
 * Time: 11:04
 */

namespace lesson\models\queries;


use lesson\models\Lesson;
use lesson\models\User;
use yii\db\ActiveQuery;

class UserLessonQuery extends ActiveQuery
{

    public function forUser(User $user)
    {
        return $this->andWhere(['user_id'=>$user->id]);
    }

    public function forLesson(Lesson $lesson)
    {
        return $this->andWhere(['lesson_id'=>$lesson->id]);
    }

    public function orderByIdDesc()
    {
        return $this->orderBy('id DESC');
    }

    public function orderByIdAsc()
    {
        return $this->orderBy('id ASC');
    }
}