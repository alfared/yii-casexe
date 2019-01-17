<?php


namespace app\controllers;

use Yii;
use app\models\Prize;
use app\models\Address;
use yii\web\Controller;


class PrizeController extends Controller
{
    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $prizes = Prize::find()->all();
        return $this->render('index', compact('prizes'));
    }


	public function actionManage($id = 0) {
		if (Yii::$app->user->isGuest) {
			return $this->redirect('/site/login');
		}

		if ($id) {
			$model = Prize::find()->where(['id' => $id])->one();
		}
		else {
			$model = new Prize();
		}

		if ($model->load(Yii::$app->request->post())) {
			if ($model->save()) {
				return $this->redirect('/prize/');
			}

		}
		$this->view->title = $id ? 'Редактировать приз "' .$model->name .'"' : 'Добавить новый приз';

		return $this->render('manage', compact('model'));
	}

	public function actionAdd() {

    	$id = rand(1,3);
		$model = new Address();
		$prize = Prize::find()->where(['id' => $id])->one();
		if ($model->load(Yii::$app->request->post())) {
			$model->user_id = Yii::$app->user->id;
			$model->prize_id = $prize->id;
			$model->status = 0;


			if ($model->save()) {
				Prize::acceptPrize($prize);
				return $this->redirect('/game/play/');
			}
		}

		$this->view->title = 'Введите ваш адрес';
		return $this->render('addressForm', compact('model'));

	}
}