<?php
    session_start();
    $eventId = 0;
    if (isset($_GET["eventId"])) {
        $eventId = $_GET["eventId"];
    } else {
        exit();
    }

    include_once "../../inc/global-variables.php";
    include_once "../../classes/Database.php";

    $action = new Database();
    $event = $action->getDataById("events", $eventId);
    $myRecipes = $action->getCustomData("SELECT * FROM recipes WHERE id_user=" . $_SESSION["id"]);
?>

<div class="modal fade" id="signupEvent" tabindex="-1" role="dialog" aria-labelledby="signupEventLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupEventLabel"><?php echo $event["name"]; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="eventSignupForm">
                <div class="modal-body">
                    <input type="hidden" name="id_event" value="<?php echo $eventId; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION["id"]; ?>">
                    <?php if ($myRecipes) { ?>
                        <select name="id_recipe" id="id_recipe" class="form-control">
                            <option value="">-- selecteaza --</option>
                            <?php foreach ($myRecipes as $recipe) { ?>
                                <option value="<?php echo $recipe["id"] ?>"><?php echo $recipe["title"] ?></option>
                            <?php } ?>
                        </select>
                    <?php } else { ?>
                        <div class="alert alert-warning">Nu ati adaugat nicio reteta</div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <?php if ($myRecipes) { ?>
                    <button type="submit" class="btn btn-block btn-primary">Particip</button>
                    <?php } else { ?>
                        <a href="<?php echo RECIPE_URL["new"]; ?>" class="btn btn-block btn-primary">Adauga o reteta</a>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>