<?php if(!empty($prize)) : ?>

	<div class="won-prize">
		<h3>Поздравляем!</h3>
		<p>Вы победили:</p>
		<br /><br />
		<div class="buttons">

			<?php if ($prize->type == 1): ?>
				<a class="btn btn-success prize-action"
				   href="/card/show?id=<?= $prize->id?>">
					Взять деньги
				</a>
				<a class="btn  btn-warning prize-action"
					href="/game/convert?id=<?php $prize->id?>">
					Конвертировать в Бонусные Монеты
				</a>
				<a class="btn btn-secondary" href="/game/play">Отказываться</a>
		    <?php elseif ($prize->type == 2): ?>
				<a class="btn btn-success prize-action"
				   href="/game/bonus?id=<?= $prize->id?>">
					Возьмите бонусные монеты
				</a>
				<a class="btn btn-secondary" href="/game/play">Отказываться</a>
			<?php elseif ($prize->type == 3): ?>

			<?php else: ?>
				<div class="won-prize">
					<p>Извините, но все призы разыгрываются. Попробуйте позже.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
