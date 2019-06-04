
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
                            <h5>Categorii Populare</h5>
                            <?php
                                $artsLabels = "";
                                $artsVals = "";
                                $orderedArticles = $action->getCustomData("SELECT category.name as cat_name, count(category.id_category) as nr FROM recipes, category WHERE recipes.id_category= id_category GROUP BY recipes.id_category");
                                for ($i = count($orderedArticles) - 1; $i >= 0; $i--) {
                                    if ($orderedArticles[$i]["nr"] > 2) {
                                        $artsLabels .= $i > 0 ? $orderedArticles[$i]["cat_name"] ."," : $orderedArticles[$i]["cat_name"];
                                        $artsVals .= $i > 0 ? $orderedArticles[$i]["nr"] ."," : $orderedArticles[$i]["nr"];
                                    }
                                }
                            ?>
                            <canvas id="chartCategories" width="400" height="400"
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