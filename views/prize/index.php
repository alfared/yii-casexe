<?php

use app\models\Prize;
use yii\bootstrap\Html;
?>

<h1>Список призов</h1>

<?php if (sizeof($prizes)): ?>
	<p><?php echo Html::a('добавить приз', ['/prize/manage'], ['class'=>'btn btn-primary']) ; ?></p>
    <table class="table table-bordered table-hover">
        <thead>
        <tr><th>Имя приза</th>
            <th>Тип</th>
            <th>Количество</th>
            <th>Доступно призов</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($prizes as $prize) : ?>
            <tr>
                <td><?= $prize->name ?></td>
                <td><?= Prize::prizeType($prize->type) ?></td>
                <td><?= $prize->amount ?></td>
                <td><?= $prize->cnt ?></td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
	<p>Список пустой. <a href="/prize/manager/">Добавить новый приз</a></p>
<?php endif; ?>
