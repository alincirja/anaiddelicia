<?php
    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Category";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    include "classes/Recipe.php";
    function selectedCat() {
        $category = false;
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $category = $_GET["id"];
        }
        return $category;
    }

    $action = new Database();
    $recipes = selectedCat() ? $action->getCustomData("SELECT * FROM recipes WHERE id_category='" . $_GET['id'] . "' AND status='aprobat'") : $action->getData("recipes");
    $categories = $action->getData("categories");

    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Categorii</h6>
                            <?php if ($categories) { ?>
                            <ul class="category-list category-nav">
                            <?php foreach ($categories as $category) { ?>
                                <li class="category-item <?php echo selectedCat() && selectedCat() === $category["id"] ? "active" : ""; ?>">
                                    <a href="<?php echo ROOT_URL . "category?id=" . $category["id"]; ?>"><?php echo $category["name"]; ?></a>
                                </li>
                            <?php } ?>
                            </ul>
                            <?php } ?>
                            <a class="all-cats" href="<?php echo ROOT_URL . "category"; ?>">Toate Categoriile</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10">
                    <?php if ($recipes) { ?>
                    <div class="row">
                    <?php foreach($recipes as $recipe) {
                        if ($recipe["status"] === "aprobat") { ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <?php include "templates/recipe/tile.php"; ?>
                        </div>
                    <?php }
                    } ?>
                    </div>
                    <?php } else { ?>
                        <div class="alert alert-warning">Pentru moment nu exista articole disponibile in categoria selectata</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>