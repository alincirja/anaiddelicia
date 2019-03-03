<?php
    $recipePage = false;

    if (isset($_GET["type"])) {
        $recipePage = $_GET["type"];
    }

    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Adauga reteta";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page">
        <div class="container">
        <?php
            if (!$recipePage) {
                include_once "404.php";
            } else {
                if ($recipePage === "new") {
                    $GLOBALS["editMode"] = false;
                    if (loggedIn()) {
                        echo "<h1>Reteta noua</h1>";
                        include "classes/Recipe.php";
                        include "templates/recipe/recipe-form.php";
                    } else {
                        echo 'Pentru a accesa aceasta pagina, trebuie sa fiti autentificat: <a href="#" data-toggle="modal" data-target="#loginModal">Autentificare!</a>';
                    }
                } else {
                    $recipeId = isset($_GET["id"]) && !empty($_GET["id"]) ? $_GET["id"] : 0;
                    if (!$recipeId) {
                        include_once "404.php";
                    } else {
                        include "classes/Recipe.php";
                        $recipe = new Recipe();
                        $myrecipe = $recipe->getById($recipeId);
                        if (!$myrecipe) {
                            include_once "404.php";
                        } else {
                            if ($recipePage === "edit") {
                                $GLOBALS["editMode"] = true;
                                echo "<h1>Modificare Reteta #" . $_GET["id"] . "</h1>";
	                            include_once "templates/recipe/recipe-form.php";
                            } elseif ($recipePage === "view") {
                                include_once "templates/recipe/recipe-view.php";
                            } elseif ($recipePage === "gallery") {
                                include_once "templates/recipe/recipe-gallery.php";
                            }
                        }
                    }
                }
            }
        ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>