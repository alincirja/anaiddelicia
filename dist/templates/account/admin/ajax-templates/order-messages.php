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
?>

<div class="modal fade" id="orderMessages" tabindex="-1" role="dialog" aria-labelledby="orderMessagesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderMessagesLabel">Mesaje Comanda #<?php echo $order["id"]; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="order-messages-list" id="messagesList"></ul>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <form class="row no-gutters" method="POST" id="sendMsg">
                        <input type="hidden" name="orderId" value="<?php echo $order["id"]; ?>">
                        <div class="col-10">
                            <textarea name="msg" id="msg" rows="1" placeholder="Scrie un mesaj" class="form-control"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>