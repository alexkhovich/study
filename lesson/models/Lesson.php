<?php
/**
 * User: alexkhovich
 * Date: 27.04.23
 * Time: 9:52
 */

namespace lesson\models;


use yii\db\ActiveRecord;

/**
 *
 * @property int $id
 * @property string $name
 * @property string $imagefile
 * @property string|null $announce
 * @property string|null $description
 * @property string $code
 */

class Lesson extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%lesson}}';
    }

    public function rules()
    {
        return [
            [['name', 'imagefile', 'code'], 'required'],
            [['name', 'imagefile'], 'string', 'max' => 255],
            [['announce', 'description', 'code'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'imagefile' => 'Изображение',
            'announce' => 'Анонс',
            'description' => 'Описание',
            'code' => 'Код YouTube',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLessons()
    {
        return $this->hasMany(UserLesson::class, ['lesson_id' => 'id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->via('userLessons');
    }

}