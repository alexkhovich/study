<?php

use yii\db\Migration;

/**
 * Class m230427_060620_lesson
 */
class m230427_060620_lesson extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'imagefile' => $this->string()->notNull(),
            'announce' => $this->text(),
            'description' => $this->text(),
            'code' => $this->text()->notNull(),
        ], $tableOptions);

        $this->insert('{{%lesson}}', [
            'name' => 'Топ-5 полезных сервисов для прокачки скилов Frontend-разработчика',
            'imagefile' => 'images/less1.png',
            'announce' => 'В этом видео:<br> 
                            ✔️ о 5 онлайн-сервисах по прокачке своих скилов;<br> 
                            ✔️ почему нужно практиковаться в написании кода;',
            'description' => 'Описание урока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est necessitatibus placeat sapiente soluta totam voluptatum.',
            'code' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/-_gBYCWJ9rU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ]);

        $this->insert('{{%lesson}}', [
            'name' => 'Какой первый заказ взять начинающему frontend-разработчику на фрилансе',
            'imagefile' => 'images/less2.png',
            'announce' => 'В этом видео: <br> 
                            ✔️ в какой момент брать первый заказ;<br> 
                            ✔️ какие критерии того проекта, который уже можно взять;<br> 
                            ✔️ как перестать бояться взять первый заказ.',
            'description' => 'Описание урока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est necessitatibus placeat sapiente soluta totam voluptatum.',
            'code' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/0wqB6zW0ukE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ]);

        $this->insert('{{%lesson}}', [
            'name' => 'Как поймать баг в коде: отладка JavaScript в браузере',
            'imagefile' => 'images/less3.png',
            'announce' => 'В этом видео: <br> 
                            ✔️ что такое отладка кода (дебаг);<br> 
                            ✔️ как правильно дебажить JS код;<br> 
                            ✔️ почему важно уметь делать отладку кода и исправлять возникшие баги самостоятельно.',
            'description' => 'Описание урока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est necessitatibus placeat sapiente soluta totam voluptatum.',
            'code' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/sqP9M5GteMc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ]);

        $this->insert('{{%lesson}}', [
            'name' => 'Нужен ли фронтенд-фреймворк для поиска работы и трудоустройства?',
            'imagefile' => 'images/less4.png',
            'announce' => 'В этом видео:<br> 
                            ✔️ что такое фронтенд-фреймворк;<br> 
                            ✔️ обязательно ли нужно его изучать, чтобы найти первую работу фронтенд-разработчиком.',
            'description' => 'Описание урока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est necessitatibus placeat sapiente soluta totam voluptatum.',
            'code' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/SrihQzC610M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ]);

        $this->insert('{{%lesson}}', [
            'name' => 'Что такое frontend, backend, fullstack? Как и что выбрать?',
            'imagefile' => 'images/less5.png',
            'announce' => 'В этом видео: <br> 
                            ✔️ что такое frontend, backend и fullstack;<br> 
                            ✔️ о том, каждый ли сайт имеет деление на фронтенд / бэкенд;<br> 
                            ✔️ кто такой веб-верстальщик;',
            'description' => 'Описание урока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est necessitatibus placeat sapiente soluta totam voluptatum.',
            'code' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/4WjSZ_2JV6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ]);

        $this->insert('{{%lesson}}', [
            'name' => 'Как выбрать компьютер для веб-разработки в 2022?',
            'imagefile' => 'images/less6.png',
            'announce' => 'В этом видео:<br> 
                            ✔️ процессор;<br> 
                            ✔️ оперативная память;<br> 
                            ✔️ жесткий диск;',
            'description' => 'Описание урока Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est necessitatibus placeat sapiente soluta totam voluptatum.',
            'code' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/kjnHXhMcQz8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ]);
    }

    public function down()
    {

        $this->dropTable('{{%lesson}}');
    }

}
