<?php
    $tipPage = false;

    if (isset($_GET["type"])) {
        $tipPage = $_GET["type"];
    }
    /**
     * COMMON VARIABLES
     */
    $pageTitle = " Adauga Sfat";

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
            if (!$tipPage) {
                include_once "templates/tip/tips.php";
            } else {
                if ($tipPage === "new") {
                    $GLOBALS["editMode"] = false;
                    if (loggedIn()) {
                        echo "<h1>Sfat nou</h1>";
                        include_once "classes/CookingTip.php";
                        include_once "templates/tip/tip-form.php";
                    } else {
                        echo 'Pentru a accesa aceasta pagina, trebuie sa fiti autentificat: <a href="#" data-toggle="modal" data-target="#loginModal">Autentificare!</a>';
                    }
                } else{
                    $tipId = isset($_GET["id"]) && !empty($_GET["id"]) ? $_GET["id"] : 0;
                    if (!$tipId) {
                        include_once "404.php";
                    } else {
                        include_once "classes/CookingTip.php";
                        $tip = new CookingTip();
                        $mytip = $tip->getById($tipId);
                        if (!$mytip) {
                            include_once "404.php";
                        } else {
                            if ($tipPage === "edit") {
                                if ($mytip["id_user"] === $_SESSION["id"] || isAdmin()) {
                                    $GLOBALS["editMode"] = true;
                                    echo "<h1>Modificare Sfat <a href='" . TIP_URL["view"] . $_GET["id"] . "'>#" . $_GET["id"] . "</a></h1>";
                                    include_once "templates/tip/tip-form.php";
                                } else {
                                    include_once "404.php";
                                }
                            } elseif ($tipPage === "view") {
                                include_once "templates/tip/tip-view.php";
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