<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m241024_121401_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        'price' => $this->decimal(10, 2)->notNull(),
        'stock' => $this->integer()->notNull(),
        'category' => $this->string()->notNull(),
        'description' => $this->text(),
        'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
