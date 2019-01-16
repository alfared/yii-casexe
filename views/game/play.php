<?php

use app\assets\AppAsset;
use yii\bootstrap\Html;
$this->registerJsFile('@web/js/game.js', ['depends' => 'yii\web\YiiAsset']);

?>

<h1><?= $this->title; ?></h1>

<div class="prize-wrapper">
	<p>Нажмите на кнопку, чтобы выиграть приз!</p>
<!--	<p><a id="playButton" class="btn btn-success prize-action" href="/game/prize/">PLAY!</a></p>-->


    <?php echo Html::a('Play', ['/game/prize/'], ['class'=>'btn btn-primary play']) ?>


</div>
