<?php
    $orderId = 0;
    if (isset($_GET["orderId"])) {
        $orderId = $_GET["orderId"];
    } else {
        exit();
    }

    include_once "../../../../inc/global-variables.php";
    include_once "../../../../classes/Order.php";

    $orderObj = new Order();
    $order = $orderObj->getDataById("orders", $orderId);
    $appetizer = $orderObj->getForeignData("recipes", $order["appetizer_standard"]);
    $stSteak = $orderObj->getForeignData("recipes", $order["first_type_steak"]);
    $stDish = $orderObj->getForeignData("recipes", $order["first_type_side_dish"]);
    $stSalad = $orderObj->getForeignData("recipes", $order["first_type_salad"]);
    $ndType = $orderObj->getForeignData("recipes", $order["second_type"]);
    $desert = $orderObj->getForeignData("recipes", $order["desert"]);

    $orderStatus = array("asteptare", "procesare", "finalizat");
?>

<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Comanda #<?php echo $order["id"] . " | " . $order["date"] . " | " . $order["status"]; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <ul class="order-details-list">
                            <li>
                                <span class="data">Eveniment:</span>
                                <span class="value"><?php echo $order["event_type"]; ?></span>
                            </li>
                            <li>
                                <span class="data">Data Eveniment:</span>
                                <span class="value"><?php echo $order["event_date"]; ?></span>
                            </li>
                            <li>
                                <span class="data">Persoana de contact:</span>
                                <span class="value"><?php echo $order["contact_person"]; ?><br /><?php echo $order["phone"]; ?></span>
                            </li>
                            <li>
                                <span class="data">Locatie:</span>
                                <span class="value"><?php echo $order["location_name"] . "<br />" . $order["location_address"]; ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="order-details-list">
                            <li>
                                <span class="data">Aperitiv Standard:</span>
                                <span class="value"><?php echo $appetizer ? $appetizer["title"] : "NU"; ?></span>
                            </li>
                            <li>
                                <span class="data">Felul Unu:</span>
                                <span class="value">
                                    <a href="<?php echo RECIPE_URL["view"] . $order["first_type_steak"]; ?>"><?php echo $stSteak["title"] ?></a><br />
                                    <a href="<?php echo RECIPE_URL["view"] . $order["first_type_steak"]; ?>"><?php echo $stDish["title"] ?></a><br />
                                    <a href="<?php echo RECIPE_URL["view"] . $order["first_type_steak"]; ?>"><?php echo $stSalad["title"] ?></a>
                            </li>
                            <li>
                                <span class="data">Felul Doi:</span>
                                <span class="value"><?php echo $ndType["title"]; ?></span>
                            </li>
                            <li>
                                <span class="data">Desert:</span>
                                <span class="value"><?php echo $desert["title"]; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="details">
                    <h6>Detalii</h6>
                    <p><?php echo $order["details"]; ?></p>
                </div>
                <div class="comments mb-3">
                    <h6>Comentarii admin</h6>
                    <textarea name="adminDetails" id="adminDetails" class="form-control"><?php echo $order["comments"]; ?></textarea>
                </div>
                <div class="status">
                    <div class="row">
                        <div class="col-auto ml-auto">
                            <h6 class="my-2">Status</h6>
                        </div>
                        <div class="col-auto pl-0">
                            <select name="orderStatus" id="orderStatus" class="form-control">
                                <?php foreach ($orderStatus as $status) { ?>
                                    <option value="<?php echo $status; ?>" <?php echo $status === $order["status"] ? "selected" : ""; ?>><?php echo $status ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateOrder" data-id="<?php echo $orderId; ?>">Save changes</button>
            </div>
        </div>
    </div>
</div>