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
    require_once("templates/common/header.php");
    require_once("templates/common/page-title.php");
?>
    <section class="recipes-section">
        <div class="container">
            <?php
            include "inc/Action.php";
            $object = new Action();
            $cats = $object->getData("categorie");
            foreach ($cats as $cat) {
                echo $cat["id"] . " " . $cat["nume"];
            }
            ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>