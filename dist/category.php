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
?>
    <section id="main-content" class="content-page">
        <div class="container">
            <?php
            include "classes/Action.php";
            $object = new Action();
            $cats = $object->getData("categorii");
            foreach ($cats as $cat) {
                echo $cat["id"] . " " . $cat["nume_cateorie"] . "<br>";
            }
            $single = $object->getDataById("categorii", 1);
            echo $single["id"] . " " . $single["nume_cateorie"];
            ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>