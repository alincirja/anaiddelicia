<h1>Retete Favorite</h1>
<?php
    include_once "classes/Database.php";
    $action = new Database();
    $favRecipes = $action->getCustomData("SELECT * FROM favorite_recipes, recipes WHERE favorite_recipes.id_user='" . $_SESSION["id"] . "' AND favorite_recipes.id_recipe=recipes.id");

    if (!count($favRecipes)) {
        echo '<div class="alert alert-warning">Nu aveti retete favorite.</div>';
    } else {
    ?>
    <ul class="fav-recipes">
        <?php foreach ($favRecipes as $recipe) { ?>
        <li>
            <a href="inc/scripts/recipe/removefav" data-recipe="<?php echo $recipe["id_recipe"]; ?>" data-user="<?php echo $recipe["id_user"]; ?>"><i class="fas fa-trash"></i></a>
            <span><?php echo $recipe["title"]; ?></span>
        </li>
        <?php } ?>
    </ul>
    <?php
    }
?>