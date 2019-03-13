<?php
    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Anaid Delicia";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
    require_once("templates/home/hero.php");

    include "classes/Recipe.php";
    $action = new Database();
    $recipes = $action->getData("recipes");

?>
<section id="main-content" class="pt-5 pb-4">
    <div class="container">
        <h1 class="section-title">
            Rețete adaugate recent
            <span class="divider"><i class="fas fa-utensils"></i></span>
        </h1>
        <div class="row">
        <?php foreach($recipes as $recipe) {
            if ($recipe["status"] === "aprobat") { ?>
            <div class="col-12 col-md-6 col-lg-4 my-4">
                <?php include "templates/recipe/tile.php"; ?>
            </div>
        <?php } 
        } ?>
        </div>
    </div>
</section>
<?php
    require_once("templates/common/footer.php");
?>