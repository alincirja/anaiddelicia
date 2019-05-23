<?php 
$keyword = ""
if (isset($_POST["action"]) && $_POST["action"] === "liveSearch") {
    $keyword = $_POST["liveSearch"];
} else {
    exit();
}

include_once "../../../../inc/global-variables.php";
include_once "../../../../classes/CookingTip.php";
$tipObj = new CookingTip();
$mytips = $tipObj->getCustomData("SELECT * FROM cooking_tip WHERE title LIKE '%". $keyword ."%'");

if (count($mytips) > 0) {
    foreach($mytips as $tip) { 
    $author = $tipObj->getForeignData("users", $tip["id_user"]);
?>
    <tr>
        <td><?php echo $tip["title"]; ?></td>
        <td><?php echo $author["name"]; ?></td>
        <td class="text-capitalize tip-status text-<?php echo $tip["status"]; ?>"><?php echo $tip["status"]; ?></td>
        <td></td>
        <td class="text-right">
            <a href="<?php echo TIP_URL["view"] . $tip["id"]; ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
            <a href="<?php echo TIP_URL["edit"] . $tip["id"]; ?>" class="btn btn-sm btn-info"><i class="fas fa-fw fa-edit"></i></a>
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