<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Пожалуйста, заполните следующие поля для регистрации:</p>
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
