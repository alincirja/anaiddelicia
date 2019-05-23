<?php
    $action = new Database();

    function editValue($field) {
        if($GLOBALS["editMode"]) {
            $tip = new CookingTip();
            $mytip = $tip->getById($_GET["id"]);
            return $mytip[$field];
        }
    }
?>

<form action="javascript:;" method="post" id="addEditTipForm">
    <input type="hidden" name="action" value="<?php echo $GLOBALS["editMode"] ? "editTip" : "addTip"; ?>" />
    <?php if ($GLOBALS["editMode"]) { ?>
        <input type="hidden" name="tipId" value="<?php echo editValue("id"); ?>" />
    <?php } ?>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group required">
                        <label for="tipsTitle">Titlu</label>
                        <input value="<?php echo editValue("title"); ?>" type="text" class="form-control" placeholder="Titlu" id="tipsTitle" name="tipTitle"  />
                    </div><!--/.form-group-->
                </div>
                <div class="col-12">
                    <div class="form-group required">
                        <label for="tipsBody">Descriere</label>
                        <textarea class="form-control" placeholder="Descriere" id="tipsBody" name="tipBody"  cols="30" rows="5"><?php echo editValue("description"); ?></textarea>
                    </div><!--/.form-group-->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Trimite sfatul </button>
            <div class="feedback pt-3"></div>
        </div>
    </div><!--/.row-->
</form>