<?php

namespace app\controllers;

use Yii;
use Yii\web\Controller;
use app\models\Prize;


class GameController extends Controller
{
	private $moneyToBonusConvertRate = 10;

	// Cлучайный розыграш призов
	private function choosePrize() {
		$this->layout = 'empty';
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
		
	}


}