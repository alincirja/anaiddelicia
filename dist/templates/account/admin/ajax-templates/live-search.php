<?php
$keyword = "";
if (isset($_POST["action"]) && $_POST["action"] === "liveSearch") {
    $keyword = $_POST["liveSearch"];
} else {
    exit();
}

include_once "../../../../inc/global-variables.php";
include_once "../../../../classes/Recipe.php";
$recipeObj = new Recipe();
$myrecipes = $recipeObj->getCustomData("SELECT * FROM recipes WHERE title LIKE '%". $keyword ."%'");

if (count($myrecipes) > 0) {
    foreach($myrecipes as $recipe) { 
    $author = $recipeObj->getForeignData("users", $recipe["id_user"]);
?>
    <tr>
        <td><?php echo $recipe["title"]; ?></td>
        <td><?php echo $author["name"]; ?></td>
        <td class="text-capitalize recipe-status text-<?php echo $recipe["status"]; ?>"><?php echo $recipe["status"]; ?></td>
        <td></td>
        <td class="text-right">
            <a href="<?php echo RECIPE_URL["view"] . $recipe["id"]; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
            <a href="<?php echo RECIPE_URL["edit"] . $recipe["id"]; ?>" class="btn btn-sm btn-info"><i class="fas fa-fw fa-edit"></i></a>
            <a href="<?php echo RECIPE_URL["gallery"] . $recipe["id"]; ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-image"></i></a>
        </td>
    </tr>
<?php }
} else { print_r($_POST); ?>
<tr>
    <td colspan="5">
        <div class="alert alert-warning">
            Nu exista inregistrari. Incercati alt cuvant
        </div>
    </td>
</tr>
<?php } ?>