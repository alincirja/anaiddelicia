<h1>Evenimente</h1>
<?php
    include_once "classes/Database.php";
    $action = new Database();
    $events = $action->getCustomData("SELECT * FROM events WHERE enabled=1 ORDER BY date_from DESC");

    if ($events) {
        echo "<div class='row'>";
        foreach ($events as $event) {
            $winner = $action->getForeignData("users", $event["id_winner"]);
        ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $event["name"]; ?></h5>
                        <h6 class="m-0">Desfasurare:</h6>
                        <div>
                            <?php
                                $dateStart = new DateTime($event["date_from"] . " " . $event["time_from"]);
                                $dateEnd = new DateTime($event["date_to"] . " " . $event["time_to"]);
                                echo $dateStart->format("d F Y | h:s") . " <--> " . $dateEnd->format("d F Y | h:s");
                            ?>
                        </div>
                        <div class="mt-4">
                            <a class="btn btn-sm btn-primary" href="<?php echo ROOT_URL . "events?view=single&id=" . $event["id"]; ?>">Vizualizare</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        echo "</div>";
    } ?>
