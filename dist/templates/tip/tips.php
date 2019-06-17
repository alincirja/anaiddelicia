<h1>Sfaturi Culinare</h1>
<?php
    include_once "classes/Database.php";
    $action = new Database();
    $tips = $action->getData("cooking_tips");

    if ($tips) { ?>
        <div class="row">
    <?php
        foreach($tips as $tip) { ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5><?php echo $tip["title"]; ?></h5>
                        <p><?php echo substr($tip["body"], 0, 55) . "..."; ?></p>
                        <button class="btn btn-sm btn-outline-primary" data-id="<?php echo $tip["id"]; ?>" data-toggle="modal" data-target="#tipModal">Citeste</button>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>
        </div><!--/.row-->
<?php
    }
?>
<div class="modal fade" id="tipModal" tabindex="-1" role="dialog" aria-labelledby="tipModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tipModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
      </div>
    </div>
  </div>
</div>