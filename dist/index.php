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
<section id="main-content" class="content-page m-0 py-4">
    <div class="container">
        <h1>Adaugate Recent</h1>
        <div class="row">
        <?php foreach($recipes as $recipe) { ?>
            <div class="col-12 col-md-6 col-lg-4 my-4">
                <?php include "templates/recipe/tile.php"; ?>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
<?php
    require_once("templates/common/footer.php");
?>