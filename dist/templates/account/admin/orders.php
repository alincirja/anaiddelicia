<h1>Administrare <span class="text-primary">Comenzi</span></h1>
<?php
    $action = new Database();
    $orders = $action->getData("orders");
?>
<div class="order-search mb-3">
    <div class="row">
        <div class="col-12 col-sm-4 col-lg-3">
            <input class="form-control" type="text" name="searchType" id="searchType" placeholder="nume, telefon" />
        </div>
        <div class="col-12 col-sm-4 col-lg-3">
            <select class="form-control" name="orderStatus" id="orderStatus">
                <option value="">-- status --</option>
                <?php foreach ($orders as $order) { ?>
                    <option value="<?php echo $order["status"]; ?>"><?php echo $order["status"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div><!--/.order-search-->
<div class="order-list">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Data</td>
                <td>Contact</td>
                <td>Eveniment</td>
                <td>Status</td>
                <td></td>
            </tr>
        </thead>
        <tbody id="orderList">
        <?php foreach ($orders as $order) { ?>
            <tr>
                <td><?php echo $order["id"]; ?></td>
                <td><?php echo $order["date"]; ?></td>
                <td><?php echo $order["contact_person"] . "<br />" . $order["phone"]; ?></td>
                <td><?php echo $order["event_type"]; ?></td>
                <td><?php echo $order["status"]; ?></td>
                <td>
                    <button class="btn btn-sm btn-primary view-order" data-id="<?php echo $order["id"]; ?>"><i class="fas fa-eye"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>