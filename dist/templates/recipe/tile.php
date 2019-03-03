<?php
    $viewLink = ROOT_URL . "recipe?type=view&id=" . $recipe["id"];
?>

<div class="card recipe-tile">
    <div class="embed-responsive embed-responsive-16by9">
        <a href="<?php echo $viewLink; ?>">
            <img class="embed-responsive-item" src="img/upload/recipes/<?php echo $recipe["image"]; ?>" alt="<?php echo $recipe["title"]; ?>">
        </a>
    </div>
    <div class="card-body">
        <h5 class="card-title text-capitalize">
            <a href="<?php echo $viewLink; ?>"><?php echo $recipe["title"]; ?></a>
        </h5>
        <div class="description">
            <?php echo utf8_encode($recipe["description"]); ?>
        </div>
    </div>
</div>