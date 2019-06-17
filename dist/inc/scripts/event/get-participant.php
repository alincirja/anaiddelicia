<?php
if (isset($_GET["participant"])) {
    include_once "../../../classes/Database.php";
    include_once "../../../inc/global-variables.php";
    $action = new Database();
    $participant = $action->getDataById("event_participants", $_GET["participant"]);
    if ($participant) {
        $user = $action->getForeignData("users", $participant["id_user"]);
        $recipe = $action->getForeignData("recipes", $participant["id_recipe"]);
?>
        <td><?php
            echo $user["name"];
        ?></td>
        <td><?php echo $recipe["title"]; ?></td>
        <td class="text-right"><?php
            if (!$participant["approved"]) {
        ?>
            <a href="<?php echo ROOT_URL; ?>inc/scripts/event/participant-status?id=<?php echo $participant["id"]; ?>&status=1" data-id="<?php echo $participant["id"]; ?>" class="btn btn-sm btn-primary participant-status">Aprob</a>
        <?php
            } else {
        ?>
            <a href="<?php echo ROOT_URL; ?>inc/scripts/event/participant-status?id=<?php echo $participant["id"]; ?>&status=0" data-id="<?php echo $participant["id"]; ?>" class="btn btn-sm btn-danger participant-status">Refuz</a>
        <?php
            }
        ?></td>
<?php
    }
}
?>