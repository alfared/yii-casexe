<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Card;


// https://yiiframework.com.ua/uk/doc/guide/2/tutorial-console/


class PrizeController extends Controller
{
    public function actionIndex()
    {
        $total = Card::find()->where(['=', 'status', '0'])->count();
        echo 'Waiting for payment: ' .$total ."\n";

        return 0;
    }

    public function actionPay($count) {
        $payments = Card::find()->where(['=', 'status', '0'])->orderBy(['id' => SORT_ASC])->limit($count)->all();
        if (sizeof($payments)) {
            foreach ($payments as $p) {
                Card::paymentDone($p->id);
                print 'Card type:' . Card::cardType($p->cardType) .' Card Number: ' .$p->cardNumber .' - paid $' .$p->amount ."\n";
            }
        }
        else {
            echo 'All payments done.' ."\n";
        }
        return 0;
    }
}