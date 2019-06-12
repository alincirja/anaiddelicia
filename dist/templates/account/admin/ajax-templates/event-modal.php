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
            <form action="" method="post" id="formLogin">
                <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="eventName" id="eventName" value="<?php echo $event ? $event["name"] : ""; ?>" placeholder="Nume eveniment" />
                    </div>
                    <div class="form-group">
                        <label>De la</label>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="date" name="eventDateFrom" id="eventDateFrom" value="<?php echo $event ? $event["date_from"] : ""; ?>" />
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="time" name="eventTimeFrom" id="eventTimeFrom" value="<?php echo $event ? $event["time_from"] : ""; ?>" />
                            </div>
                        </div><!--/.row-->
                    </div><!--/.form-group-->
                    <div class="form-group">
                        <label>Pana la</label>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="date" name="eventDateTo" id="eventDateTo" value="<?php echo $event ? $event["date_to"] : ""; ?>" />
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="time" name="eventTimeTo" id="eventTimeTo" value="<?php echo $event ? $event["time_to"] : ""; ?>" />
                            </div>
                        </div><!--/.row-->
                    </div><!--/.form-group-->
                    <div class="form-group">
                        <label>Deadline Inscrieri</label>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="date" name="eventDeadlineDate" id="eventDeadlineDate" value="<?php echo $event ? $event["signup_deadline_date"] : ""; ?>" />
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="time" name="eventDeadlineTime" id="eventDeadlineTime" value="<?php echo $event ? $event["signup_deadline_time"] : ""; ?>" />
                            </div>
                        </div><!--/.row-->
                    </div>
                    <div class="form-group">
                        <label>Detalii si instructiuni</label>
                        <textarea rows="5" class="form-control" name="eventDetails" id="eventDetails"><?php echo $event ? $event["details"] : ""; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Public</label>
                        <input type="checkbox" name="eventEnabled" id="eventEnabled" <?php echo $event && $event["enabled"] ? "checked" : ""; ?> />
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