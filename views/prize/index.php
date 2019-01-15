<?php

use app\models\Prize;

?>

<h1>Список призов</h1>

<?php if (sizeof($prizes)): ?>
	<p><a href="/prize/manage/">Добавить новый приз</a></p>
<?php else : ?>
	<p>Список пустой. <a href="/prize/manager/">Добавить новый приз</a></p>
<?php endif; ?>
