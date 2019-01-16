<?php

use yii\db\Migration;

/**
 * Class m190116_083944_prize
 */
class m190116_083944_prize extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('prize', [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'type' => $this->smallInteger()->null(),
			'amount' => $this->integer()->defaultValue(0),
			'cnt' => $this->integer()->defaultValue(0),
			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
		], $tableOptions);
	}

	/**
	 * @inheritdoc
	 */
	public function down()
	{
		$this->dropTable('prize');
	}
}
