<?php

namespace app\models;

use yii\db\ActiveRecord;

class Address extends ActiveRecord
{
	public static function prizeSent($id) {
		Address::updateAll(['status' => 1], 'id =' . $id);
	}

	public function attributeLabels() {
		return [
			'reciever' => 'Reciever Name',
			'zip' => 'Zip',
			'country' => 'Country',
			'state' => 'State or Province',
			'city' => 'City',
			'address' => 'Address'
		];
	}

	public function rules()
	{
		return [
			[['reciever', 'zip', 'country', 'address', 'city'], 'required'],
			['zip', 'myRule'],
			['state', 'safe']
		];
	}

	public static function sendStatus($id = null) {

		$types = [
			0 => 'New',
			1 => 'Sent'
		];

		if ($id !== null) {
			return isset($types[$id]) ? $types[$id] : 'Undefined';
		}
		else {
			return $types;
		}
	}

	public function myRule($attribute, $params) {
		if (!preg_match('/[0-9]+/', $this->$attribute)) {
			$this->addError($attribute, 'Zip must contain only digits');
		}
	}
}