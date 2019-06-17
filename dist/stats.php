
<?php
    include_once "classes/Database.php";
    $action = new Database();

    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Statistici";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page">
        <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Comenzi</h5>
                        <?php
                            $statusLabels = "";
                            $statusVals = "";
                            $statusStat = $action->getCustomData("SELECT status, count(status) as nr FROM orders GROUP BY status");
                            for ($i = count($statusStat) - 1; $i >= 0; $i--) {
                                $statusLabels .= $i > 0 ? $statusStat[$i]["status"] ."," : $statusStat[$i]["status"];
                                $statusVals .= $i > 0 ? $statusStat[$i]["nr"] ."," : $statusStat[$i]["nr"];
                            }
                        ?>
                        <canvas id="stChart" width="400" height="400"
                            data-labels="<?php echo $statusLabels; ?>"
                            data-vals="<?php echo $statusVals; ?>"
                        ></canvas>
                    </div>
                </div>
            </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Retete Favorite</h5>
                            <?php
                                $artsLabels = "";
                                $artsVals = "";
                                $orderedArticles = $action->getCustomData("SELECT recipes.title as title, count(favorite_recipes.id_recipe) as nr FROM recipes, favorite_recipes WHERE favorite_recipes.id_recipe= recipes.id GROUP BY favorite_recipes.id_recipe");
                                for ($i = count($orderedArticles) - 1; $i >= 0; $i--) {
                                    $artsLabels .= $i > 0 ? $orderedArticles[$i]["title"] ."," : $orderedArticles[$i]["title"];
                                    $artsVals .= $i > 0 ? $orderedArticles[$i]["nr"] ."," : $orderedArticles[$i]["nr"];
                                }
                            ?>
                            <canvas id="ndChart" width="400" height="400"
                                data-labels="<?php echo $artsLabels; ?>"
                                data-vals="<?php echo $artsVals; ?>"
                            ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>