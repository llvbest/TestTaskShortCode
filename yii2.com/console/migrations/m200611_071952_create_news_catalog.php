<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubric}}`.
 */
class m200611_071952_create_news_catalog extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rubric}}', [
            'id' => $this->primaryKey(),
            //'tree' => $this->integer()->notNull(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ]);
        
        $this->execute("
            CREATE TABLE `news` (
              `id` int(11) NOT NULL,
              `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `preview` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `id_autor` int(11) DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='новость';

            INSERT INTO `news` (`id`, `title`, `preview`, `content`, `id_autor`) VALUES
            (1, 'title1', 'new year sensation', 'world sensation world sensation world sensation', 1),
            (2, 'title2', '2new year sensation', '2world sensation world sensation world sensation', 1),
            (3, 'title3', '3new year sensation', '3world sensation world sensation world sensation', 2),
            (4, 'title4', '4new year sensation', 'world sensation world sensation world sensation', 1),
            (5, 'title5', '5new year sensation', '2world sensation world sensation world sensation', 1),
            (6, 'title6', '6new year sensation', '3world sensation world sensation world sensation', 2),
            (7, 'title7', '7new year sensation', 'world sensation world sensation world sensation', 1),
            (8, 'title8', '8new year sensation', '2world sensation world sensation world sensation', 1),
            (9, 'title9', '9new year sensation', '3world sensation world sensation world sensation', 2),
            (10, 'title10', '10new year sensation', 'world sensation world sensation world sensation', 1),
            (11, 'title11', '11new year sensation', '2world sensation world sensation world sensation', 1),
            (12, 'title12', '12new year sensation', '3world sensation world sensation world sensation', 2);
            
            CREATE TABLE `news2rubric` (
              `id` int(11) NOT NULL,
              `id_news` int(11) NOT NULL,
              `id_rubric` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            
            INSERT INTO `news2rubric` (`id`, `id_news`, `id_rubric`) VALUES
            (1, 3, 5),
            (2, 3, 2),
            (3, 2, 2),
            (4, 1, 2),
            (5, 4, 3),
            (6, 5, 3),
            (7, 6, 3);
            
            INSERT INTO `rubric` (`id`, `lft`, `rgt`, `depth`, `name`) VALUES
            (1, 1, 14, 0, 'All'),
            (2, 8, 13, 1, 'Общество'),
            (3, 9, 10, 2, 'городская жизнь'),
            (4, 11, 12, 2, 'выборы'),
            (5, 2, 7, 1, 'День города'),
            (6, 3, 4, 2, 'салюты'),
            (7, 5, 6, 2, 'детская площадка');

            ALTER TABLE `news`
              ADD PRIMARY KEY (`id`);

            ALTER TABLE `news2rubric`
              ADD PRIMARY KEY (`id`);

            ALTER TABLE `rubric`
              ADD PRIMARY KEY (`id`);

            ALTER TABLE `news`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

            ALTER TABLE `news2rubric`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

            ALTER TABLE `rubric`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
            COMMIT;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubric}}');
        $this->dropTable('{{%news}}');
        $this->dropTable('{{%news2rubric}}');
    }
}
