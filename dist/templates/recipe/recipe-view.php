<?php
    $action = new Database();
    $id = $_GET["id"];

    $myrecipe   = $recipe->getById($id);
    $gallery    = $recipe->getGallery($id);

    $author     = $action->getForeignData("users", $myrecipe["id_user"]);
    $region     = $action->getForeignData("regions", $myrecipe["id_region"]);
    $category   = $action->getForeignData("categories", $myrecipe["id_category"]);
?>

<div class="recipe">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-9">
            <div class="recipe-media">
                <div class="media-tabs">
                    <div class="media-tabs-content">
                        <?php if ($myrecipe["image"]) { ?>
                        <div class="media-tab-content active" id="image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item" src="img/upload/recipes/<?php echo $myrecipe["image"]; ?>" alt="">
                            </div>
                        </div>
                        <?php } if ($myrecipe["video"]) { ?>
                        <div class="media-tab-content" id="video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://www.youtube-nocookie.com/embed/<?php echo $myrecipe["video"]; ?>" class="embed-responsive-item" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <?php } if ($gallery) { ?>
                        <div class="media-tab-content" id="gallery">
                            <div id="recipeGallery" class="carousel slide" data-ride="carousel">
                                <ul class="list-unstyled m-0 recipe-gallery carousel-inner">
                                <?php foreach ($gallery as $key => $image) { ?>
                                    <li class="carousel-item <?php echo $key == 0 ? "active" : ""; ?>">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <img class="embed-responsive-item" src="img/upload/recipes/<?php echo $image["name"]; ?>" alt="">
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                                <a class="carousel-control-prev" href="#recipeGallery" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#recipeGallery" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div><!--/.media-tabs-content-->
                    <div class="media-tabs-btns">
                        <ul class="list-unstyled d-flex justify-content-between btns-list">
                            <?php if ($myrecipe["image"]) { ?>
                            <li class="active"><a href="#image"><span>Image</span></a></li>
                            <?php } if ($myrecipe["video"]) { ?>
                            <li><a href="#video"><span>Video</span></a></li>
                            <?php } if ($gallery) { ?>
                            <li><a href="#gallery"><span>Gallery</span></a></li>
                            <?php } ?>
                        </ul>
                    </div><!--/.media-tabs-btns-->
                </div><!--/.media-tabs-->
            </div><!--/.recipe-media-->
            <div class="recipe-info">
                <div class="card">
                    <div class="card-body">
                        <h1><?php echo $myrecipe["title"]; ?></h1>
                        <div class="description">
                            <?php echo $myrecipe["description"]; ?>
                        </div><!--/.description-->
                        <hr class="my-4">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="ingredients">
                                    <h2><i class="text-primary mr-2 fas fa-fw fa-eye-dropper"></i><span>Ingrediente</span></h2>
                                    <ul class="list-unstyled ingredients-list">
                                    <?php
                                        $ingredients = explode("\r\n", $myrecipe["ingredients"]);

                                        foreach ($ingredients as $ingredient) {
                                    ?>
                                        <li class="d-flex flex-nowrap check-item">
                                            <a href="javascript:;" class="box"><i class="fas fa-check"></i></a>
                                            <span class="text"><?php echo $ingredient; ?></span>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="directions">
                                    <h2><i class="text-primary mr-2 fas fa-fw fa-sort-numeric-down"></i><span>Instructiuni</span></h2>
                                    <ul class="list-unstyled directions-list">
                                    <?php
                                        $directions = explode("\r\n\r\n", $myrecipe["directions"]);
                                        //print_r($directions);

                                        foreach ($directions as $direction) {
                                            $direction = explode("\r\n", $direction);
                                    ?>
                                        <li class="d-flex flex-nowrap check-item">
                                            <a href="javascript:;" class="box"><i class="fas fa-check"></i></a>
                                            <div class="text">
                                                <h6 class="step-title"><?php echo $direction[0]; ?></h6>
                                                <span class="step-text"><?php echo $direction[1]; ?></span>
                                            </div>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div><!--/.row-->
                    </div><!--/.card-body-->
                </div><!--/.card-->
            </div><!--/.recipe-info-->
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <?php if (isAdmin()) { ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title d-flex flex-nowrap justify-content-between align-items-center">
                        <span>Revizuire</span>
                        <small class="recipe-status text-<?php echo $myrecipe["status"]; ?>">
                            <?php echo $myrecipe["status"] ?>
                        </small>
                    </h6>
                    <div class="row">
                        <div class="col-6">
                            <a href="<?php echo ROOT_PATH . "inc/scripts/recipe/status?status=aprobat&id=" . $myrecipe["id"]; ?>" class="btn btn-sm btn-block btn-primary set-status <?php echo $myrecipe["status"] === "aprobat" ? "disabled" : ""; ?>">Aprob</a>
                        </div>
                        <div class="col-6">
                            <a href="<?php echo ROOT_PATH . "inc/scripts/recipe/status?status=refuzat&id=" . $myrecipe["id"]; ?>" class="btn btn-sm btn-block btn-danger set-status <?php echo $myrecipe["status"] === "refuzat" ? "disabled" : ""; ?>">Refuz</a>
                        </div>
                    </div><!--/.row-->
                </div>
            </div><!--/.card-->
            <?php } ?>

            <?php if ((loggedIn() && $myrecipe["id_user"] === $_SESSION["id"]) || isAdmin()) {
                $recipeAlert = array();
                switch ($myrecipe["status"]) {
                    case "asteptare":
                        $recipeAlert["class"] = "warning";
                        $recipeAlert["msg"] = "Reteta nu este revizuita.";
                        break;
                    
                    case "refuzat":
                        $recipeAlert["class"] = "danger";
                        $recipeAlert["msg"] = "Reteta nu a fost aprobata.";
                        break;

                    case "aprobat":
                        $recipeAlert["class"] = "success";
                        $recipeAlert["msg"] = "Reteta este aprobata si este vizibila pentru toti utilizatorii.";
                        break;
                    
                    default:
                        $recipeAlert = array();
                        break;
                }

                if (count($recipeAlert) === 2) { ?>
                <div class="alert alert-<?php echo $recipeAlert["class"]; ?>"><?php echo $recipeAlert["msg"]; ?></div>
            <?php } ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">Editare</h6>
                    <div class="row">
                        <div class="col-6">
                            <a href="?type=edit&id=<?php echo $id; ?>" class="btn btn-sm btn-block btn-info">General</a>
                        </div>
                        <div class="col-6">
                            <a href="?type=gallery&id=<?php echo $id; ?>" class="btn btn-sm btn-block btn-warning">Galerie</a>
                        </div>
                    </div><!--/.row-->
                </div>
            </div><!--/.card-->
            <?php } ?>

            <div class="card">
                <div class="card-body">
                    <div class="author d-flex flex-nowrap align-items-center">
                        <div class="profile-image">
                            <div class="embed-responsive embed-responsive-1by1">
                                <img class="embed-responsive-item" src="img/upload/profile/<?php echo $author["image"]; ?>" alt="<?php echo $author["name"]; ?>">
                            </div>
                        </div>
                        <div class="name">
                            <h6 class="m-0"><?php echo $author["name"]; ?></h6>
                        </div>
                    </div>
                    <ul class="info-list">
                        <li>
                            <span class="key">Categorie</span>
                            <span class="val"><?php echo $category["name"]; ?></span>
                        </li>
                        <li>
                            <span class="key">Timp de Preparare</span>
                            <span class="val"><?php echo $myrecipe["cooking_time"]; ?></span>
                        </li>
                        <li>
                            <span class="key">Complexitate</span>
                            <span class="val"><?php echo $myrecipe["complexity"]; ?></span>
                        </li>
                        <li>
                            <span class="key">Portii</span>
                            <span class="val"><?php echo $myrecipe["servings_no"]; ?></span>
                        </li>
                        <li>
                            <span class="key">De post?</span>
                            <span class="val"><?php echo intval($myrecipe["de_post"]) ? "Da" : "Nu"; ?></span>
                        </li>
                    </ul>
                    <div class="fav-container pt-3">
                    <?php if (loggedIn()) {
                        if ($recipe->isFav($_SESSION["id"], $myrecipe["id"])) { ?>
                        <div class="text-success">Reteta este in lista de favorite</div>
                    <?php } else { ?>
                        <a href="<?php echo ROOT_PATH . "inc/scripts/recipe/favorite";?>" data-user="<?php echo $_SESSION["id"]; ?>" data-recipe="<?php echo $myrecipe["id"]; ?>" class="btn btn-block btn-sm btn-primary add-to-favs"><i class="fas fa-heart"></i> Adauga la Retete Favorite</a>
                    <?php }
                    } ?>
                    </div>
                </div><!--/.card-body-->
            </div><!--/.card-->
        </div>
    </div>
</div><!--/.recipe-->