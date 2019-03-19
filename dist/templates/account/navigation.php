<div class="card">
    <div class="card-body">
        <div class="side-user-info">
            <div class="photo">
                <?php echo substr($me["name"], 0, 2); ?>
            </div>
            <div class="text">
                <h5 class="name"><?php echo $me["name"]; ?></h5>
                <time class="register-date">
                    Membru din
                    <?php
                    $format = "Y-m-d H:i:s";
                    $date = DateTime::createFromFormat($format, $me["register_date"]);
                    echo $date->format("F Y");
                    ?>
                </time>
            </div>
        </div>
    </div>
</div>
<?php
function activeNav($sec) {
    if (isset($_GET["section"]) && $sec === $_GET["section"]) {
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
        <h6 class="card-title card-trigger m-0 text-uppercase">Setari generale <span class="d-md-none"><i class="fas fa-fw fa-angle-down nav-open"></i><i class="fas fa-fw fa-angle-up nav-close"></i></span></h6>
        <ul class="account-nav mt-3">
            <li><a href="account" class="<?php activeNav("account"); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a></li>
            <li><a href="?section=profile" class="<?php activeNav("profile"); ?>">
                <i class="far fa-fw fa-user"></i>
                <span>Modifica Profil</span>
            </a></li>
            <li><a href="?section=photo" class="<?php activeNav("photo"); ?>">
                <i class="far fa-fw fa-image"></i>
                <span>Poza Profil</span>
            </a></li>
            <li><a href="?section=password" class="<?php activeNav("password"); ?>">
                <i class="fas fa-fw fa-fingerprint"></i>
                <span>Modifica Parola</span>
            </a></li>
            <li><a href="?section=recipes" class="<?php activeNav("recipes"); ?>">
                <i class="far fa-fw fa-copy"></i>
                <span>Retetele Mele</span>
            </a></li>
            <li><a href="?section=favrecipes" class="<?php activeNav("favrecipes"); ?>">
                <i class="far fa-fw fa-heart"></i>
                <span>Retete Favorite</span>
            </a></li>
            <li><a href="?section=tips" class="<?php activeNav("cooking_tips"); ?>">
                <i class="far fa-fw fa-grin-wink"></i>
                <span>Sfaturi culinare</span>
            </a></li>
            <li><a href="?section=delete" class="<?php activeNav("delete"); ?>">
                <i class="far fa-fw fa-trash-alt"></i>
                <span>Sterge cont</span>
            </a></li>
        </ul>
    </div>
</div>