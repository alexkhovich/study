<?php

use yii\db\Migration;

/**
 * Class m230427_073952_user_lesson
 */
class m230427_073952_user_lesson extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_lesson}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'lesson_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-ulesson-user_id', '{{%user_lesson}}', 'user_id');
        $this->createIndex('idx-ulesson-lesson_id', '{{%user_lesson}}', 'lesson_id');
        $this->addForeignKey('fk-ulesson-user_id', '{{%user_lesson}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-ulesson-lesson_id', '{{%user_lesson}}', 'lesson_id', '{{%lesson}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_lesson}}');
    }

}