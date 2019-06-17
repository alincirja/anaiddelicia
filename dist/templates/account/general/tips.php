<h1>Sfaturi Culinare</h1>
<div class="row">
    <div class="col-12 col-md-6 col-lg-5">
        <form action="" id="tipForm">
            <input type="hidden" name="action" value="newTip">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION["id"]; ?>">
            <input type="hidden" name="id">
            <div class="form-group">
                <label for="tipTitle">Titlu</label>
                <input type="text" class="form-control" name="tipTitle" id="tipTitle">
            </div>
            <div class="form-group">
                <label for="tipTitle">Continut</label>
                <textarea class="form-control" rows="7" name="tipBody" id="tipBody"></textarea>
            </div>
            <div class="mb-3 buttons-feedback">
                <button type="submit" class="btn btn-sm btn-primary">Salvare</button>
                <button type="reset" class="btn btn-sm btn-secondary tip-form-reset">Resetare</button>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-7">
        <?php
            include_once "classes/Database.php";
            $action = new Database();
            $mytips = $action->getCustomData("SELECT * FROM cooking_tips WHERE id_user='" . $_SESSION["id"] . "' ORDER BY id DESC");
            if ($mytips) { ?>
                <div class="row">
                <?php
                foreach ($mytips as $tip) { ?>
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $tip["title"]; ?></h6>
                                <button class="btn btn-sm btn-info tip-edit"
                                    data-id="<?php echo $tip["id"] ?>"
                                    data-title="<?php echo $tip["title"] ?>"
                                    data-body="<?php echo $tip["body"] ?>"
                                >Detalii si Editare</button>
                            </div>
                        </div>
                    </div>
            <?php
                }
                ?>
                </div>
        <?php
            }
        ?>
    </div>
</div>