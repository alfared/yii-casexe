<?php

namespace app\controllers;

use yii;
use \yii\web\Controller;
use app\models\Prize;


class GameController extends \yii\web\Controller
{
	private $moneyToBonusConvertRate = 10;

	// Cлучайный розыграш призов
	private function choosePrize() {
		//$this->layout = 'empty';
		$won_prize = null;
		$prizes = Prize::find()->where(['>','cnt',0])->all();
		if (sizeof($prizes)) {
			$prize_num = rand(0,sizeof($prizes) - 1);
			$won_prize = $prizes[$prize_num];
		}

		return $this->render('prize', ['prize' => $won_prize]);

	}

	public function convertMoneyToBonus($id) {
		$prize = Prize::find()->where(['id' => $id])->one();

		$amount = $prize->amount * $this->moneyToBonusConvertRate;
		return $amount;
	}

	public function actionPlay() {
		if (!yii::$app->user->isGuest) {
			if (yii::$app->request->isAjax ) {
				echo 'true';
			}

			//echo yii::$app->request->isAjax;
			$this->view->title = 'Играйте!';
			return $this->render('play');
		}
		else {
			return $this->goHome();
		}
	}

	public function actionPrize()
	{
		//$this->choosePrize();

		$won_prize = null;
		$prizes = Prize::find()->where(['>','cnt',0])->all();
		if (sizeof($prizes)) {
			$prize_num = rand(0,sizeof($prizes) - 1);
			$won_prize = $prizes[$prize_num];
		}

		return $this->render('prize', ['prize' => $won_prize]);
	}

	public function actionBonus($id, $amount = 0) {
		$prize = Prize::find()->where(['id' => $id])->one();
		Prize::acceptPrize($prize);
		return $this->render('bonus');
	}

	public function actionConvert($id) {
		$this->actionBonus($id, $this->convertMoneyToBonus($id));
	}

	public function actionMoney($id) {

	}


}