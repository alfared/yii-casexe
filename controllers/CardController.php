<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Card;
use app\models\Prize;

class CardController extends Controller
{
    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $payments = Card::find()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('payments', ['payments' => $payments]);
    }

    // Действие при выводе приза с деньгами
	public function actionShow($id) {

		$model = new Card();
		$prize = Prize::find()->where(['id' => $id])->one();

		$model->cardType = 1;
		$model->amount = rand(0,100);

		$this->view->title = 'Взять деньги на карту';
		return $this->render('cardForm', compact('model'));

	}

}