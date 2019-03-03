<?php
session_start();
include "../../../classes/Recipe.php";

if (isset($_POST["action"])) {
    $recipe = new Recipe();

    $info["title"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeTitle"]);
    $info["description"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeDescription"]);
    $info["directions"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeDirections"]);
    $info["id_user"] = $_SESSION["id"];
    $info["id_category"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeCategory"]);
    $info["id_region"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeRegion"]);
    $info["ingredients"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeIngredients"]);
    $info["cooking_time"] = mysqli_real_escape_string($recipe->connect, $_POST["recipecookingTime"]);
    $info["complexity"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeComplexity"]);
    $info["servings_no"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeServingsNo"]);
    $info["de_post"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeDePost"]);
    $info["image"] = $_FILES["recipeImage"] ? $_FILES["recipeImage"] : false;
    $info["video"] = mysqli_real_escape_string($recipe->connect, $_POST["recipeVideo"]);
    $info["action"] = mysqli_real_escape_string($recipe->connect, $_POST["action"]);
    $info["recipeId"] = isset($_POST["recipeId"]) ? mysqli_real_escape_string($recipe->connect, $_POST["recipeId"]) : 0;
    
    //print_r($info);
    $recipe->addEditRecipe($info);
} else {
    echo "Eroare: Not set";
}
?>
