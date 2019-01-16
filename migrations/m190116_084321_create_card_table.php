<?php

use yii\db\Migration;

/**
 * Handles the creation of table `card`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `prize`
 */
class m190116_084321_create_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('card', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'prize_id' => $this->integer()->notNull(),
            'cardType' => $this->integer()->defaultValue(1),
            'cardNumber' => $this->string(16),
            'amount' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(0),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-card-user_id',
            'card',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-card-user_id',
            'card',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `prize_id`
        $this->createIndex(
            'idx-card-prize_id',
            'card',
            'prize_id'
        );

        // add foreign key for table `prize`
        $this->addForeignKey(
            'fk-card-prize_id',
            'card',
            'prize_id',
            'prize',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-card-user_id',
            'card'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-card-user_id',
            'card'
        );

        // drops foreign key for table `prize`
        $this->dropForeignKey(
            'fk-card-prize_id',
            'card'
        );

        // drops index for column `prize_id`
        $this->dropIndex(
            'idx-card-prize_id',
            'card'
        );

        $this->dropTable('card');
    }
}
