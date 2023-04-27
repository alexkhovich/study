<?php
/**
 * User: alexkhovich
 * Date: 27.04.23
 * Time: 10:59
 */

namespace lesson\models;


use lesson\models\queries\UserLessonQuery;
use yii\db\ActiveRecord;

/**
 * Class UserLesson
 * @package lesson\models
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 *
 */

class UserLesson extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%user_lesson}}';
    }

    public function rules()
    {
        return [
            [['user_id', 'lesson_id'], 'required'],
            [['user_id', 'lesson_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    public static function find()
    {
        return new UserLessonQuery(get_called_class());
    }

}