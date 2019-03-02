<?php
    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Account";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page account">
        <div class="container">
            <?php
            if (loggedIn()) {
                include "classes/User.php";
                $user = new User();
                $me = $user->getById($_SESSION["id"]);   
            ?>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <div class="account-navigation mb-4 mb-md-0">
                        <?php
                        require_once("templates/account/navigation.php");
                        if (isAdmin()) {
                            require_once("templates/account/admin-navigation.php");
                        } // end isAdmin
                        ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">
                        <?php
                        if (isset($_GET["section"]) && $_GET["section"] != "") {
                            require_once("templates/account/general/" . $_GET["section"] . ".php");
                        } elseif (isAdmin() && isset($_GET["admin"]) && $_GET["admin"] != "") {
                            require_once("templates/account/admin/" . $_GET["admin"] . ".php");
                        } else {
                            require_once("templates/account/dashboard.php");
                        }
                        ?>
                    </div>
                </div><!--/.row-->
            <?php } else {
                header("Location: ../");
            } // end loggedIn ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>