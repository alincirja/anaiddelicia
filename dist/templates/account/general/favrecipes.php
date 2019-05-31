<h1>Retete Favorite</h1>
<?php
    include_once "classes/Database.php";
    $action = new Database();
    $favRecipes = $action->getCustomData("SELECT * FROM favorite_recipes WHERE id_user='" . $_SESSION["id"] . "'");

    if (!count($favRecipes)) {
        echo '<div class="alert alert-warning">Nu aveti retete favorite.</div>';
    } else {
    ?>
    <ul class="fav-recipes">
        <?php foreach ($favRecipes as $fav) {
            $recipe = $action->getForeignData("recipes", $fav["id_recipe"]);
        ?>
        <li>
            <a class="remove-fav" href="<?php echo ROOT_PATH . "inc/scripts/recipe/favorite";?>" data-id="<?php echo $fav["id"]; ?>"><i class="fas fa-trash"></i></a>
            <span><?php echo $recipe["title"]; ?></span>
        </li>
        <?php } ?>
    </ul>
    <?php
    }
?>