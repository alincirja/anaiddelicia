<?php
   
    $pageTitle = "Contact";

    require_once("templates/common/head.php");
?>

<?php
    require_once("templates/common/header.php");
?>
<section id="main" class="main-content content-page">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <h4 class="line-title">Informatii</h4>
                <div class="card">
                    <div class="card-body">
                        <p>Retete deliciose din zona Moldovei</p>
                        <div class="contact-list">
                            <div class="contact-item d-flex flex-nowrap">
                                <div class="icon"><i class="fas fa-fw fa-map-marked-alt"></i></div>
                                <div class="info">
                                    <p><span class="text-primary">Adresa:</span> 200, ANAID DELICIA comuna BORCA, NEAMT, NT 676045, Romania</p>
                                </div>
                            </div>
                            <div class="contact-item d-flex flex-nowrap">
                                <div class="icon"><i class="fas fa-fw fa-phone"></i></div>
                                <div class="info">
                                    <p><span class="text-primary">Telefon:</span> +40 739 834 384</p>
                                </div>
                            </div>
                            <div class="contact-item d-flex flex-nowrap">
                                <div class="icon"><i class="fas fa-fw fa-envelope"></i></div>
                                <div class="info">
                                    <p><span class="text-primary">Email:</span> contact@anaiddelicia.ro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <h4 class="line-title">Contact </h4>
                <div class="card">
                    <div class="card-body">
                        <?php include_once "templates/contact/contact-form.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once("templates/common/footer.php");
?>
