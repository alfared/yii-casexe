<?php
use app\models\Card;
?>

<h1>Payments list</h1>

<?php if (sizeof($payments)) : ?>
    <table class="table table-bordered table-hover">
        <thead>
        <tr><th>Тип картки</th>
            <th>Номер картки</th>
            <th>Тип</th>
            <th>Статус</th>
            <th>Операции</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($payments as $payment) : ?>
            <tr>
                <td><?= Card::cardType($payment->cardType) ?></td>
                <td><?= $payment->cardNumber ?></td>
                <td>$<?= $payment->amount ?></td>
                <td><?= Card::cardStatus($payment->status) ?></td>
                <td>
                    <?php if (!$payment->status) : ?>
                        <a href="/admin/card/pay/?id=<?= $payment->id ?>">Pay Now</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php else : ?>
    <p>Нет денежного приза.</p>
<?php endif; ?>
