<?php
    $action = new Database();
    $orders = $action->getCustomData("SELECT * FROM orders WHERE id_user='" . $_SESSION["id"] . "'");
?>
<div class="order-list">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Data</td>
                <td>Eveniment</td>
                <td>Status</td>
                <td></td>
            </tr>
        </thead>
        <tbody id="orderList">
        <?php foreach ($orders as $order) { ?>
            <tr class="status-<?php echo $order["status"]; ?>">
                <td><?php echo $order["id"]; ?></td>
                <td class="date"><?php echo $order["date"]; ?></td>
                <td class="event-type"><?php echo $order["event_type"]; ?></td>
                <td class="status"><?php echo $order["status"]; ?></td>
                <td>
                    <button class="btn btn-sm btn-primary view-order" data-id="<?php echo $order["id"]; ?>"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-sm btn-warning view-order-msgs" data-id="<?php echo $order["id"]; ?>"><i class="fas fa-envelope"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>