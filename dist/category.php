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
            $cats = $object->getData("categories");
            if ($cats) {
                foreach ($cats as $cat) {
                    echo $cat["id"] . " " . $cat["name"] . "<br>";
                }
            }
            $single = $object->getDataById("categories", 1);
            echo $single["id"] . " " . $single["name"];
            ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>