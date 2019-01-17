<?php

namespace app\models;

use yii\db\ActiveRecord;

// Модель для сохранение адреса после выбора физического предмета
class Address extends ActiveRecord
{
	public static function prizeSent($id) {
		Address::updateAll(['status' => 1], 'id =' . $id);
	}

	public function attributeLabels() {
		return [
			'reciever' => 'Имя получателя',
			'zip' => 'Zip',
			'country' => 'Страна',
			'state' => 'Область',
			'city' => 'Город',
			'address' => 'Адрес'
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
			$this->addError($attribute, 'Zip должен содержать только числа');
		}
	}
}