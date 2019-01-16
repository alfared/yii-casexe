<?php
use yii\bootstrap\Html;
if(!empty($prize)) { ?>

	<div class="won-prize">
		<h3>Вы получили</h3>
		<div class="buttons">

			<?php if ($prize->type == 1): ?>
                <h1>Деньги</h1>
                <?php
				echo Html::a('Взять деньги', ['/card/show', 'id' => $prize->id], ['class'=>'btn btn-primary']) ;
                ?>
				<?php
				echo Html::a('Конвертировать деньги', ['/game/сonvert', 'id' => $prize->id], ['class'=>'btn btn-primary']) ;
				?>
				<?php
				echo Html::a('Отказатся', ['/game/play'], ['class'=>'btn btn-primary']) ;
				?>
		    <?php elseif ($prize->type == 2): ?>
                <h1>Бонус</h1>
<!--				<a class="btn btn-success prize-action"-->
<!--				   href="/game/bonus?id=--><?//= $prize->id?><!--">-->
<!--					Возьмите бонусные монеты-->
<!--				</a>-->
				<?php
				echo Html::a('Взять деньги', ['/game/bonus', 'id' => $prize->id], ['class'=>'btn btn-primary']) ;
				?>
				<?php
				echo Html::a('Отказатся', ['/game/play'], ['class'=>'btn btn-primary']) ;
				?>
			<?php elseif ($prize->type == 3): ?>
                <h1>Вещь</h1>
				<a class="btn btn-success prize-action" href="/address/show?id=<?= $prize->id ?>">Взять приз</a> <a class="btn btn-secondary" href="/game/play">Отказываться</a>
			<?php else: ?>
				<div class="won-prize">
					<p>Извините, но все призы разыгрываются. Попробуйте позже.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php } else {  ?>
<div class="won-prize">
   <p>Призов нет</p>
</div>
<?php } ?>
