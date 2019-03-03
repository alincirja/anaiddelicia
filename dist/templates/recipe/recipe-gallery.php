<?php
    $action = new Database();
    $id = $_GET["id"];

    $myrecipe   = $recipe->getById($id);
    $gallery    = $recipe->getGallery($id);
?>
<h1>Galerie: <?php echo $myrecipe["title"] . " #" . $myrecipe["id"]; ?></h1>
<div class="gallery-form mb-3">
    <form action="javascript:;" enctype="multipart/form-data" id="galleryForm">
        <input type="hidden" name="action" value="addImage">
        <input type="hidden" name="idRecipe" value="<?php echo $myrecipe["id"]; ?>">
        <div class="form-row flex-nowrap align-items-center">
            <div class="col">
                <input type="file" class="" id="galleryFile" name="galleryFile" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-upload"></i></button>
            </div>
        </div>
        <div class="feedback mt-2"></div>
    </form>
</div>
<div class="row">
    <?php foreach ($gallery as $image) { ?>
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4 gallery-image" id="image-<?php echo $image["id"]; ?>">
        <div class="card">
            <div class="embed-responsive embed-responsive-16by9">
                <img class="embed-responsive-item" src="img/upload/recipes/<?php echo $image["name"]; ?>" alt="<?php echo $image["name"]; ?>">
            </div>
            <a class="delete-image btn btn-sm btn-block btn-danger" href="<?php echo ROOT_URL . "inc/scripts/recipe/gallery/delete?id=" . $image["id"]; ?>"><i class="fas fa-trash"></i> <span>Sterge Fotografia</span></a>
        </div><!--/.card-->
    </div>
    <?php } ?>
</div><!--/.row-->