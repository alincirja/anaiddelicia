<?php
    include_once "classes/Recipe.php";
    $recipe = new Recipe();
    $myrecipes = $recipe->getByUser($_SESSION["id"]);
?>

<h1>Retetele Mele</h1>
<div class="mb-3 text-right">
    <a href="<?php echo RECIPE_URL["new"]; ?>" class="btn btn-primary">Reteta Noua</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Titlu</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
<?php foreach($myrecipes as $recipe) { ?>
    <tr>
        <td><?php echo $recipe["title"]; ?></td>
        <td class="text-capitalize recipe-status text-<?php echo $recipe["status"]; ?>"><?php echo $recipe["status"]; ?></td>
        <td class="text-right">
            <a href="<?php echo RECIPE_URL["view"] . $recipe["id"]; ?>" class="btn btn-sm btn-primary">Vizualizare</a>
            <a href="<?php echo RECIPE_URL["edit"] . $recipe["id"]; ?>" class="btn btn-sm btn-info">Editare</a>
            <a href="<?php echo RECIPE_URL["gallery"] . $recipe["id"]; ?>" class="btn btn-sm btn-warning">Galerie</a>
        </td>
    </tr>
<?php } ?>
</table>