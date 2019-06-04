<?php
    session_start();
    include_once "../../../../classes/Database.php";
    $action = new Database();

    if (isset($_GET["messagesList"]) && !empty($_GET["messagesList"])) {
        $messages = $action->getCustomData("SELECT * FROM order_messages WHERE id_order=" . $_GET["messagesList"] . " ORDER BY date ASC");
        if (count($messages)) {
            foreach ($messages as $msg) { ?>
                <li class="message <?php echo $msg["id_user"] === $_SESSION["id"] ? "mine" : "other"; ?>">
                    <span><?php echo $msg["message"]; ?></span>
                </li>
            <?php }
        } else { ?>
            <li class="no-message">
                <div class="alert alert-warning">Nu ati deschis inca o conversatie despre aceasta comanda.</div>
            </li>
        <?php }
    } else { ?>
        <li class="no-message">
            <div class="alert alert-warning">Conversatia nu exista</div>
        </li>
<?php exit();
    }
?>