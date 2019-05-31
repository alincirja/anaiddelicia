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
?>
<div class="card">
    <div class="card-body">
        <h6 class="card-title card-trigger m-0 text-uppercase">Zona Administrare <span class="d-md-none"><i class="fas fa-fw fa-angle-down nav-open"></i><i class="fas fa-fw fa-angle-up nav-close"></i></span></h6>
        <ul class="account-nav mt-3">
            <li><a href="?admin=recipes" class="<?php activeNavAdmin("recipes"); ?>">
                Retete
            </a></li>
            <li><a href="?admin=categories" class="<?php activeNavAdmin("categories"); ?>">
                Categorii
            </a></li>
            <li><a href="?admin=users" class="<?php activeNavAdmin("users"); ?>">
                Utilizatori
            </a></li>
            <li><a href="?admin=tips" class="<?php activeNavAdmin("tips"); ?>">
                Sfaturi Culinare
            </a></li>
            <li><a href="?admin=orders" class="<?php activeNavAdmin("orders"); ?>">
                Comenzi
            </a></li>
        </ul>
    </div>
</div>