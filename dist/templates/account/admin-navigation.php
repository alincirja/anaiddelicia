<?php
function activeNavAdmin($sec) {
    if (isset($_GET["admin"]) && $sec === $_GET["admin"]) {
        echo "active";
    } else {
        $uri = $_SERVER["REQUEST_URI"];
        $locArray = explode("/", $uri);
        if (end($locArray) === $sec) {
            echo "active";
        }
    }
}

$adminNav = array(
    "recipes" => "Retete",
    "categories" => "Categorii",
    "users" => "Utilizatori",
    "tips" => "Sfaturi Culinare",
    "orders" => "Comenzi",
    "events" => "Evenimente"
);
?>
<div class="card">
    <div class="card-body">
        <h6 class="card-title card-trigger m-0 text-uppercase">Zona Administrare <span class="d-md-none"><i class="fas fa-fw fa-angle-down nav-open"></i><i class="fas fa-fw fa-angle-up nav-close"></i></span></h6>
        <ul class="account-nav mt-3">
        <?php if (count($adminNav)) {
            foreach ($adminNav as $slug => $name) { ?>
            <li><a href="?admin=<?php echo $slug; ?>" class="<?php activeNavAdmin($slug); ?>">
            <?php echo $name; ?>
            </a></li>
        <?php }
            } ?>
        </ul>
    </div>
</div>