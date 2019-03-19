<?php
    $action = new Database();
    $id = $_GET["id"];

    $mytip   = $tip->getById($id);
    $author     = $action->getForeignData("users", $mytip["id_user"]);
?>

<div class="recipe">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-9">
            <div class="tip-info">
                <div class="card">
                    <div class="card-body">
                        <h1><?php echo $mytip["title"]; ?></h1>
                        <div class="description">
                            <?php echo $mytip["body"]; ?>
                        </div><!--/.description-->
                    </div><!--/.card-body-->
                </div><!--/.card-->
            </div><!--/.tip-info-->
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <?php if (isAdmin()) { ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title d-flex flex-nowrap justify-content-between align-items-center">
                        <span>Revizuire</span>
                        <small class="tip-status text-<?php echo $mytip["status"]; ?>">
                            <?php echo $mytip["status"] ?>
                        </small>
                    </h6>
                    <div class="row">
                        <div class="col-6">
                            <a href="<?php echo ROOT_PATH . "inc/scripts/tip/status?status=aprobat&id=" . $mytip["id"]; ?>" class="btn btn-sm btn-block btn-primary set-status <?php echo $mytip["status"] === "aprobat" ? "disabled" : ""; ?>">Aprob</a>
                        </div>
                        <div class="col-6">
                            <a href="<?php echo ROOT_PATH . "inc/scripts/tip/status?status=refuzat&id=" . $mytip["id"]; ?>" class="btn btn-sm btn-block btn-danger set-status <?php echo $mytip["status"] === "refuzat" ? "disabled" : ""; ?>">Refuz</a>
                        </div>
                    </div><!--/.row-->
                </div>
            </div><!--/.card-->
            <?php } ?>

            <?php if ((loggedIn() && $mytip["id_user"] === $_SESSION["id"]) || isAdmin()) {
                $tipAlert = array();
                switch ($mytip["status"]) {
                    case "asteptare":
                        $tipAlert["class"] = "warning";
                        $tipAlert["msg"] = "Sfatul culinar nu este revizuit.";
                        break;
                    
                    case "refuzat":
                        $tipAlert["class"] = "danger";
                        $tipAlert["msg"] = "Sfatul culinar nu a fost aprobat.";
                        break;

                    case "aprobat":
                        $tipAlert["class"] = "success";
                        $tipAlert["msg"] = "Sfatul culinar este aprobat si este vizibil pentru toti utilizatorii.";
                        break;
                    
                    default:
                        $tipAlert = array();
                        break;
                }

                if (count($tipAlert) === 2) { ?>
                <div class="alert alert-<?php echo $tipAlert["class"]; ?>"><?php echo $tipAlert["msg"]; ?></div>
            <?php } ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">Editare</h6>
                    <div class="row">
                        <div class="col-6">
                            <a href="?type=edit&id=<?php echo $id; ?>" class="btn btn-sm btn-block btn-info">Continut</a>
                        </div>
                    </div><!--/.row-->
                </div>
            </div><!--/.card-->
            <?php } ?>

            <div class="card">
                <div class="card-body">
                    <div class="author d-flex flex-nowrap align-items-center">
                        <div class="profile-image">
                            <div class="embed-responsive embed-responsive-1by1">
                                <img class="embed-responsive-item" src="img/upload/profile/<?php echo $author["image"]; ?>" alt="<?php echo $author["name"]; ?>">
                            </div>
                        </div>
                        <div class="name">
                            <h6 class="m-0"><?php echo $author["name"]; ?></h6>
                        </div>
                    </div>
                </div><!--/.card-body-->
            </div><!--/.card-->
        </div>
    </div>
</div><!--/.recipe-->