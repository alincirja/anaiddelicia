<?php
    $action = new Database();
    $id = $_GET["id"];

    $myrecipe = $recipe->getById($id);
    $gallery = $recipe->getGallery($id);
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
                            <div>
                                <ul class="list-unstyled m-0 recipe-gallery" id="recipe-gallery">
                                <?php foreach ($gallery as $image) { ?>
                                    <li class="embed-responsive embed-responsive-16by9"><img class="embed-responsive-item" src="img/upload/recipes/<?php echo $image["name"]; ?>" alt=""></li>
                                <?php } ?>
                                </ul>
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
            <h1><?php echo $myrecipe["title"]; ?></h1>
        </div>
    </div>
</div><!--/.recipe-->