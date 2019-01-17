<?php

namespace app\models;

use yii\db\ActiveRecord;

class Card extends ActiveRecord
{

	public static function paymentDone($id) {
		Card::updateAll(['status' => 1], 'id ='. $id);
	}

	public function attributeLabels() {

		return [
			'cardType' => 'Тип картки',
			'cardNumber' => 'Номер картки'
		];
	}

	public function rules()
	{
		return [
			['cardNumber' , 'required'],
			['cardNumber', 'myRule']
		];
	}

	public static function cardStatus($id = null) {
		$types = [
			0 => 'New',
			1 => 'Paid'
 		];

		if ($id !== null) {
			return isset($types[$id]) ? $types[$id] : 'Undefined';
		}
		else {
			return $types;
		}
	}

	public static function cardType($id = null) {

		$types = [
			1 => 'Visa',
			2 => 'MasterCard'
 		];

		if ($id) {
			return isset($types[$id]) ? $types[$id] : 'Undefined';
		}

		else {
			return $types;
		}
	}

	public function myRule($attribute, $params) {
		if (!preg_match('/^[0-9]{5}$/', $this->$attribute)) {
			$this->addError($attribute, 'Картка должна иметь 5 цифр');
		}
	}

}