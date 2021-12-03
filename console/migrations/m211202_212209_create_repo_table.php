<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%repo}}`.
 */
class m211202_212209_create_repo_table extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('{{%repo}}', [
            'id' => $this->primaryKey(),
            'q' => $this->string(255)->notNull()->comment('Поисковый запрос'),
            'result' => $this->json()->notNull()->comment('Результат поиска'),
        ]);

        $this->createIndex(
            'q',
            'repo',
            'q'
        );

        $this->addCommentOnTable('{{%repo}}', 'Репозитории');
    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->dropIndex(
            'q',
            'repo'
        );

        $this->dropTable('{{%repo}}');
    }
}
