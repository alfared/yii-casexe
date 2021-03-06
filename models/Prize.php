<?php

namespace app\models;

use yii\db\ActiveRecord;

class Prize extends ActiveRecord
{
	public function attributeLabels()
	{
		return ['name' => 'Имя приза',
		        'type' => 'Тип приза',
		        'amount' => 'Доступность призов',
		        'cnt' => 'Сколько доступно призов'
		];
	}

	public function rules()
	{
		return [ [['name', 'type', 'cnt'], 'required'],
			['amount', 'required', 'when' => function($model) {
				return in_array($model->type, [1,2]);
			}],
			[['type', 'amount', 'cnt'], 'integer', 'integerOnly' => true, 'min' => 0],
		];
	}

	public static function prizeType($id = null) {
		$types = [1 => 'Money',
		          2 => 'Bonus',
		          3 => 'Thing'
		];

		if ($id) {
			return isset($types[$id]) ? $types[$id] : 'Undefined';
		}
		else {
			return $types;
		}
	}

	// Вывод имени приза
	public static function prizeName($id) {
		$prize = Prize::find()->where(['=', 'id', $id])->one();

		return $prize->name;
	}

	// Уменьшаем количетсво бонуса для приза
	public static function acceptPrize($prize) {
		Prize::updateAll(['cnt' => $prize->cnt -1], 'id =' .$prize->id);
	}


}