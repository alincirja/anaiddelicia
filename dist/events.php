<?php
    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Evenimente";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page content-events">
        <div class="container">
            <?php
                $view = isset($_GET["view"]) && !empty($_GET["view"]) ? $_GET["view"] : null;
                $eventId = isset($_GET["id"]) && !empty($_GET["id"]) ? $_GET["id"] : null;
                $viewCases = array("single");

                if ($view && in_array($view, $viewCases)) {
                    if ($eventId) {
                        include_once "templates/events/" . $view . ".php";
                    } else {
                        include_once "templates/events/list.php";
                    }
                } else {
                    include_once "templates/events/list.php";
                }
            ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>