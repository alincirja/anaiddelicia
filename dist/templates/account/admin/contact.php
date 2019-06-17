<h1>Mesaje de contact</h1>
<?php
    include_once "classes/Database.php";
    $action = new Database();

    $msgs = $action->getData("contact");

    if ($msgs) {
        foreach ($msgs as $message) {
        ?>
            <div class="card">
                <div class="card-body">
                    <h6><?php echo $message["subject"]; ?></h6>
                    <p><?php echo $message["message"]; ?></p>
                    <strong><?php echo $message["name"]; ?></strong>,
                    <div><?php echo $message["phone"]; ?></div>
                    <div><?php echo $message["email"]; ?></div>
                </div>
            </div>
        <?php
        }
    }
?>