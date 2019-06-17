<?php
    if (isset($_GET["event"]) && !empty($_GET["event"])) {
        include_once "../../../../classes/Database.php";
        include_once "../../../../inc/global-variables.php";
        $action = new Database();
        $event = $action->getDataById("events", $_GET["event"]);
        $participants = $action->getCustomData("SELECT * FROM event_participants WHERE id_event='" . $event["id"] . "'");
    } else {
        exit();
    }
?>

<div class="modal fade" id="participantsModal" tabindex="-1" role="dialog" aria-labelledby="participantsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="participants">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Participant</th>
                                <th>Reteta</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($participants) {
                                foreach ($participants as $part) {
                                    $user = $action->getForeignData("users", $part["id_user"]);
                                    $recipe = $action->getForeignData("recipes", $part["id_recipe"]);
                            ?>
                                    <tr class="participant-<?php echo $part["id"]; ?>">
                                        <td><?php
                                            echo $user["name"];
                                        ?></td>
                                        <td><?php echo $recipe["title"]; ?></td>
                                        <td class="text-right"><?php
                                            if (!$part["approved"]) {
                                        ?>
                                            <a href="<?php echo ROOT_URL; ?>inc/scripts/event/participant-status?id=<?php echo $part["id"]; ?>&status=1" data-id="<?php echo $part["id"]; ?>" class="btn btn-sm btn-primary participant-status">Aprob</a>
                                        <?php
                                            } else {
                                        ?>
                                            <a href="<?php echo ROOT_URL; ?>inc/scripts/event/participant-status?id=<?php echo $part["id"]; ?>&status=0" data-id="<?php echo $part["id"]; ?>" class="btn btn-sm btn-danger participant-status">Refuz</a>
                                        <?php
                                            }
                                        ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--/.modal-body-->
        </div>
    </div>
</div>