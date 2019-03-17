<h1>Administrare <span class="text-primary">Categorii</span></h1>
<div class="mb-3">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <form action="javascript:;" method="post" class="add-category" id="addCategoryForm">
                <input type="hidden" name="action" value="addCategory">
                <div class="row no-gutters">
                    <div class="col">
                        <input type="text" class="form-control form-control-sm" name="addCategory" id="addCategory" placeholder="Categorie Noua" />
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    $action = new Database();
    $cats = $action->getData("categories");
?>
<div class="row">
<?php foreach ($cats as $cat) { ?>
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2" id="cat-<?php echo $cat["id"]; ?>">
        <div class="row no-gutters">
            <div class="col-8">
                <input class="form-control category-item" id="categoryItem<?php echo $cat["id"]; ?>" type="text" data-initial-value="<?php echo $cat["name"]; ?>" value="<?php echo $cat["name"]; ?>">
            </div>
            <div class="col-2">
                <a href="<?php echo ROOT_URL; ?>inc/scripts/category/edit.php" class="btn btn-block px-0 text-center btn-primary disabled saveEditedCat" data-id="<?php echo $cat["id"]; ?>"><i class="far fa-fw fa-save"></i></a>
            </div>
            <div class="col-2">
                <a href="#" data-name="<?php echo $cat["name"]; ?>" data-id="<?php echo $cat["id"]; ?>" data-toggle="modal" data-target="#deleteCat" class="btn btn-block px-0 text-center btn-danger deleteCat"><i class="far fa-fw fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<div class="modal fade" id="deleteCat" tabindex="-1" role="dialog" aria-labelledby="deleteCatLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCatLabel">Sigur doresti sa stergi categoria <span class="cat-name"></span>?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Anulare</button>
        <a href="<?php echo ROOT_URL; ?>inc/scripts/category/delete.php" class="btn btn-sm btn-danger deleteCat">Sterge</a>
      </div>
    </div>
  </div>
</div>