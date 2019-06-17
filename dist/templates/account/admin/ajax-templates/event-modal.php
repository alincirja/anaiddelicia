<?php
    $editMode = isset($_GET["action"]) && $_GET["action"] === "editEvent" ? true : false;
    $eventId = $editMode && isset($_GET["eventId"]) && !empty($_GET["eventId"]) ? $_GET["eventId"] : null;
    $event = array();
    if ($eventId) {
        include_once "../../../../classes/Database.php";
        $action = new Database();
        $event = $action->getDataById("events", $eventId);
    }
?>

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="formSubmitEvent">
                <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
                <?php if ($editMode) { ?>
                    <input type="hidden" name="eventId" value="<?php echo $event["id"]; ?>">
                <?php } ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="eventName" value="<?php echo $event ? $event["name"] : ""; ?>" placeholder="Nume eveniment" />
                    </div>
                    <div class="form-group">
                        <label>De la</label>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="date" name="date_from" id="eventDateFrom" value="<?php echo $event ? $event["date_from"] : ""; ?>" />
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="time" name="time_from" id="eventTimeFrom" value="<?php echo $event ? $event["time_from"] : ""; ?>" />
                            </div>
                        </div><!--/.row-->
                    </div><!--/.form-group-->
                    <div class="form-group">
                        <label>Pana la</label>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="date" name="date_to" id="eventDateTo" value="<?php echo $event ? $event["date_to"] : ""; ?>" />
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="time" name="time_to" id="eventTimeTo" value="<?php echo $event ? $event["time_to"] : ""; ?>" />
                            </div>
                        </div><!--/.row-->
                    </div><!--/.form-group-->
                    <div class="form-group">
                        <label>Inscrieri deschise</label>
                        <select name="signup_open" id="eventSignupOpen" class="form-control">
                            <option value="0" <?php echo $event && $event["signup_open"] === "0" ? "selected" : ""; ?>>Nu</option>
                            <option value="1" <?php echo $event && $event["signup_open"] === "1" ? "selected" : ""; ?>>Da</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Detalii si instructiuni</label>
                        <textarea rows="5" class="form-control" name="details" id="eventDetails"><?php echo $event ? $event["details"] : ""; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Public</label>
                        <input type="checkbox" name="enabled" value="1" id="eventEnabled" <?php echo $event && $event["enabled"] ? "checked" : ""; ?> />
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn">Anulare</button>
                    <button type="submit" class="btn btn-primary">Salvare</button>
                </div>
            </form>
        </div>
    </div>
</div>