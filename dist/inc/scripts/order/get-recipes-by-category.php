<?php
if (!isset($_POST["action"])) {
    header("Location: ../../../404");
} else {
    if ($_POST["action"] === "getRecipesByCategory") {
        include_once "../../../classes/Recipe.php";
        $recipeObj = new Recipe();

        $recipes = $recipeObj->getCustomData("SELECT * FROM recipes WHERE id_category='" . $_POST["category"] . "'");
        $recipesOptions = "<option val=''>-- selecteaza --</option>";
        foreach ($recipes as $recipe) {
            $recipesOptions .= '<option value="' . $recipe["id"] . '">' . $recipe["title"] . '</option>';
        }
        echo $recipesOptions;
    }
}