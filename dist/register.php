<?php
    /**
     * COMMON VARIABLES
     */
    $pageTitle = "Inregistrare";

    require_once("templates/common/head.php");
?>
<!--CUSTOM PAGE HEAD ELEMENTS-->

<!-- END - CUSTOM PAGE HEAD ELEMENTS-->
<?php
    require_once("templates/common/header.php");
?>
    <section id="main-content" class="content-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <h1>Inregistrare</h1>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" id="formRegister">
                                <input type="hidden" name="action" value="userRegister">
                                <div class="form-group">
                                    <label for="registerName">Nume</label>
                                    <input type="text" name="registerName" id="registerName" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="registerEmail">Email</label>
                                    <input type="email" name="registerEmail" id="registerEmail" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="registerPass">Parola</label>
                                    <input type="password" name="registerPass" id="registerPass" class="form-control" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Inregistrare</button>
                            </form>
                            <p class="mb-0 mt-3 text-center">
                                <small><a href="#" class="btn-link" data-toggle="modal" data-target="#loginModal">Sunt deja inregistrat.</a></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    require_once("templates/common/footer.php");
?>