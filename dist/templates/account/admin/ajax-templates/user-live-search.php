<?php
$keyword = "";
if (isset($_POST["action"]) && $_POST["action"] === "liveSearchUser") {
    $keyword = $_POST["liveSearchUser"];
} else {
    exit();
}

include_once "../../../../inc/global-variables.php";
include_once "../../../../classes/User.php";
$userObj = new User();
$users = $userObj->getCustomData("SELECT * FROM users WHERE name LIKE '%". $keyword ."%' OR rights LIKE '%". $keyword ."%'");

if (count($users) > 0) {
    foreach($users as $user) {
?>
    <tr>
        <td><?php echo $user["id"]; ?></td>
        <td><?php echo $user["name"]; ?></td>
        <td><?php echo $user["email"]; ?></td>
        <td><?php echo $user["rights"]; ?></td>
        <td></td>
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