<?php
    if (isset($_GET["action"]) && $_GET["action"] === "getEventsList") {
        include_once "../../../../classes/Database.php";
    }
    $action = new Database();
    $events = $action->getData("events");
?>

<?php if (count($events)) { ?>
<ul class="events-list list-unstyled">
<?php foreach ($events as $event) { ?>
    <li class="event-item" id="event-<?php echo $event["id"]; ?>">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <?php echo $event["name"]; ?>
                    </div>
                    <div class="col">
                        <h6 class="m-0">De la</h6>
                        <time><?php echo $event["date_from"] . " " . $event["time_from"]; ?></time>
                    </div>
                    <div class="col">
                        <h6 class="m-0">Pana la</h6>
                        <time><?php echo $event["date_to"] . " " . $event["time_to"]; ?></time>
                    </div>
                    <div class="col-auto">
                        <h6 class="m-0">Public</h6>
                        <input type="checkbox" <?php echo $event["enabled"] ? "checked" : ""; ?> />
                    </div>
                    <div class="col">
                        <button class="btn btn-sm btn-info"><i class="fas fa-fw fa-user"></i></button>
                        <button class="btn btn-sm btn-warning getEventModal" data-action="editEvent" data-id="<?php echo $event["id"]; ?>"><i class="fas fa-fw fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
</ul>
<?php } ?>