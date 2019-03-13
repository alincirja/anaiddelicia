<?php
    $viewLink = RECIPE_URL["view"] . $recipe["id"];
?>

<div class="card recipe-tile">
    <div class="tile-image">
        <div class="embed-responsive embed-responsive-4by3">
            <a href="<?php echo $viewLink; ?>">
                <img class="embed-responsive-item" src="<?php echo RECIPE_IMAGES . $recipe["image"]; ?>" alt="<?php echo $recipe["title"]; ?>">
            </a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title text-capitalize">
            <a href="<?php echo $viewLink; ?>"><?php echo $recipe["title"]; ?></a>
        </h5>
    </div>
</div>