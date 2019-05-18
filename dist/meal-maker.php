<?php
    include_once "classes/Database.php";
    $action = new Database();

    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Comanda Noua";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page">
        <div class="container">
            <?php if (!loggedIn()) { ?>
                <div class="alert alert-warning">Pentru trimiterea unei comenzi trebuie sa fiti autentificat. <a class="alert-link" data-toggle="modal" data-target="#loginModal" href="#">Click aici</a> pentru autentificare</div>
            <?php } else { ?>
                <h1>Comanda noua</h1>
                <div class="order-container">
                    <form class="order-form" id="orderForm" method="post">
                        <h4>Detalii eveniment</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="eventType">Eveniment</label>
                                    <select name="eventType" id="eventType" class="form-control">
                                        <option value="">-- selecteaza--</option>
                                        <option value="Nunta">Nunta</option>
                                        <option value="Botez">Botez</option>
                                        <option value="Zi de Nastere">Zi de Nastere</option>
                                        <option value="Majorat">Majorat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="eventDate">Data Evenimentului</label>
                                    <input type="date" class="form-control" name="eventDate" id="eventDate">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="servingsNo">Numar de Portii</label>
                                    <input type="number" min="1" max="500" name="servingsNo" id="servingsNo" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="contactPerson">Persoana de Contact</label>
                                    <input type="text" name="contactPerson" id="contactPerson" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="phoneNumber">Telefon</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="locationName">Nume Locatie</label>
                                    <input type="text" name="locationName" id="locationName" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="locationAddress">Adresa Locatiei</label>
                                    <input type="text" name="locationAddress" id="locationAddress" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="otherDetails">Alte Detalii</label>
                                    <textarea name="otherDetails" id="otherDetails" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-m"></div>
                        </div>
                        <h4>Meniu</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <h5>Aperitiv</h5>
                                <div class="form-group">
                                    <div><label class="mr-3">Doriti aperitiv preferential?</label></div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input value="no" type="radio" id="appetizerNo" name="appetizerType" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="appetizerNo">Nu</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input value="yes" type="radio" id="appetizerYes" name="appetizerType" class="custom-control-input">
                                        <label class="custom-control-label" for="appetizerYes">Da</label>
                                    </div>
                                </div>
                                <div class="form-group" id="standardAppetizerContainer">
                                    <label for="appetizerStandard">Aperitiv Standard</label>
                                    <select name="appetizerStandard" id="appetizerStandard" class="form-control">
                                        <option value="">-- selecteaza --</option>
                                        <?php
                                            $appetizers = $action->getCustomData("SELECT * FROM recipes WHERE id_category='5'");
                                            foreach ($appetizers as $appetizer) { ?>
                                        <option value="<?php echo $appetizer["id"]; ?>"><?php echo $appetizer["title"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group d-none" id="preferentialAppetizerContainer">
                                    <label for="appetizerPreferential">Aperitiv Preferential</label>
                                    <textarea name="appetizerPreferential" id="appetizerPreferential" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <h5>Felul 1</h5>
                                <div class="form-group">
                                    <label for="steak">Friptura</label>
                                    <select name="steak" id="steak" class="form-control">
                                        <option value="">-- selecteaza --</option>
                                        <?php
                                            $steaks = $action->getCustomData("SELECT * FROM recipes WHERE id_category='4'");
                                            foreach ($steaks as $steak) { ?>
                                        <option value="<?php echo $steak["id"]; ?>"><?php echo $steak["title"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sideDish">Garnitura</label>
                                    <select name="sideDish" id="sideDish" class="form-control">
                                        <option value="">-- selecteaza --</option>
                                        <?php
                                            $sideDishes = $action->getCustomData("SELECT * FROM recipes WHERE id_category='7'");
                                            foreach ($sideDishes as $sideDish) { ?>
                                        <option value="<?php echo $sideDish["id"]; ?>"><?php echo $sideDish["title"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sideDish">Salata</label>
                                    <select name="salad" id="salad" class="form-control">
                                        <option value="">-- selecteaza --</option>
                                        <?php
                                            $salades = $action->getCustomData("SELECT * FROM recipes WHERE id_category='2'");
                                            foreach ($salades as $salad) { ?>
                                        <option value="<?php echo $salad["id"]; ?>"><?php echo $salad["title"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <h5>Felul 2</h5>
                                <div class="form-group">
                                    <label for="category">Categorie</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">-- selecteaza --</option>
                                        <?php
                                            $categories = $action->getCustomData("SELECT * FROM categories ORDER BY name ASC");
                                            foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dish">Preparat</label>
                                    <select name="dish" id="dish" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <h5>Desert</h5>
                                <div class="form-group">
                                    <label for="desert">Selecteaza desertul</label>
                                    <select name="desert" id="desert" class="form-control">
                                        <option value="">-- selecteaza --</option>
                                        <?php
                                            $deserts = $action->getCustomData("SELECT * FROM recipes WHERE id_category='1'");
                                            foreach ($deserts as $desert) { ?>
                                        <option value="<?php echo $desert["id"]; ?>"><?php echo $desert["title"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Trimite Comanda</button>
                        </div>
                    </form>
                </div><!--/.order-container-->
            <?php } // loggedIn(); ?>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>