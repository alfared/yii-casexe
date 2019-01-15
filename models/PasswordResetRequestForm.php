<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Форма отправления запроса на пароль
 */
class PasswordResetRequestForm extends Model
{
	public $email;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		//https://stackoverflow.com/questions/12778326/how-to-validate-email-and-email-already-exist-or-not-check-in-yii-framework

		return [
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'exist',
				'targetClass' => '\common\models\User',
				'filter' => ['status' => User::STATUS_ACTIVE],
				'message' => 'There is no user with this email address.'
			],
		];
	}

	/**
	 * Отправка письма для сброса пароля
	 */
	public function sendEmail()
	{
		//https://www.yiiframework.com/wiki/656/how-to-send-emails-using-smtp

		$user = User::findOne([
			'status' => User::STATUS_ACTIVE,
			'email' => $this->email,
		]);

		if (!$user) {
			return false;
		}

		return Yii::$app
			->mailer
			->compose(
				['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
				['user' => $user]
			)
			->setFrom('from@domain.com')
			->setTo($this->email)
			->setSubject('Password reset for ' . Yii::$app->name)
			->send();
	}
}