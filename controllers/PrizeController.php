<?php


namespace app\controllers;

use Yii;
use app\models\Prize;
use yii\web\Controller;

class PrizeController extends Controller
{
    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'Access denied.');
            return $this->redirect('/site/login');
        }

        $prizes = Prize::find()->all();
        return $this->render('index', compact('prizes'));
    }

    

}