<?php

use app\models\Prize;

?>

<h1>Список призов</h1>

<?php if (sizeof($prizes)): ?>
	<p><a href="/prize/manage/">Добавить новый приз</a></p>
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
