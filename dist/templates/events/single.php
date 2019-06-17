<?php
    include_once "classes/Database.php";
    $action = new Database();
    $event = $action->getDataById("events", $_GET["id"]);
    $participants = $action->getCustomData("SELECT * FROM event_participants WHERE id_event='" . $_GET["id"] . "'");
    $imparticipating = $action->getCustomData("SELECT * FROM event_participants WHERE id_user='" . $_SESSION["id"] . "'");
    $ivoted = $action->getCustomData("SELECT * FROM event_votes WHERE id_voter='" . $_SESSION["id"] . "' AND id_event='" . $event["id"] . "'");
?>
<h1><?php echo $event["name"]; ?></h1>

<div class="row mt-3">
    <div class="col-12 col-sm-6 col-lg-8">
        <div class="mb-4">
            <h6>Desfasurare</h6>
            <?php
                $dateStart = new DateTime($event["date_from"] . " " . $event["time_from"]);
                $dateEnd = new DateTime($event["date_to"] . " " . $event["time_to"]);
                echo $dateStart->format("d F Y | h:s") . " <--> " . $dateEnd->format("d F Y | h:s");
            ?>
        </div>
        <div class="event-details">
            <h6>Detalii si instructiuni</h6>
            <?php echo $event["details"]; ?>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4">
        <h6>Participanti</h6>
        <?php if ($event["signup_open"]) { ?>
            <?php if (!$imparticipating) { ?>
                <a class="btn btn-sm btn-primary event-signup" href="<?php echo ROOT_PATH . "templates/events/signup-modal?eventId=" . $event["id"]; ?>">Inscriere</a>
            <?php } else {
                if (!$imparticipating[0]["approved"]) {
            ?>
                <div class="alert alert-info">Sunteti deja inscris in acest concurs. Cererea dumneavoastra va fi revizuita in curand.</div>
            <?php
                } else {
            ?>
                <div class="text-success mb-3">Cererea dumneavoastra a fost aprobata.</div>
            <?php
                }
            } ?>
        <?php } else { ?>
                <div class="alert alert-info">Inscrierile nu sunt deschise inca.</div>
        <?php } ?>
        <?php if ($participants) { ?>
            <?php foreach ($participants as $participant) { ?>
                <?php if ($participant["approved"]) { ?>
                    <?php
                        $user = $action->getForeignData("users", $participant["id_user"]);
                        $recipe = $action->getForeignData("recipes", $participant["id_recipe"]);
                        $isme = $participant["id_user"] === $_SESSION["id"] ? true : false;
                        $votes = $action->getCustomData("SELECT COUNT(id) as cnt FROM event_votes WHERE id_event='" . $event["id"] . "'");
                    ?>
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="<?php echo RECIPE_URL["view"] . "&id=" . $recipe["id"] ?>"><?php echo $recipe["title"]; ?></a>
                                    </div>
                                    <?php if (!$isme && !$ivoted) { ?>
                                    <div class="col-auto ml-auto">
                                        <button class="btn-vote-recipe"
                                            data-event="<?php echo $event["id"]; ?>"
                                            data-participant="<?php echo $user["id"]; ?>"
                                            data-recipe="<?php echo $recipe["id"]; ?>"
                                        ><i class="far fa-thumbs-up"></i></button>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div>
                                <small>Voturi: <span class="votes-count"><?php echo $votes[0]["cnt"]; ?></span></small>
                                </div>
                                <?php if ($ivoted && $ivoted[0]["id_recipe"] === $recipe["id"]) { ?>
                                    <small class="voted text-primary">Votat</small>
                                <?php } ?>
                            </div>
                        </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>