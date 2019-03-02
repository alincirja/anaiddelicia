<h1>Schimba Parola</h1>
<form action="" method="post" id="checkPassword">
    <input type="hidden" name="action" value="checkPassword" />
    <input type="hidden" name="userId" value="<?php echo $me["id"]; ?>" />
    <div class="form-group">
        <label for="currentPassword">Parola Curenta</label>
        <div class="row">
            <div class="col col-md-8 col-lg-6 col-xl-4 pr-0">
                <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="Parola curenta" reuquired />
            </div>
            <div class="col-auto pl-0">
                <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i></button>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col col-md-8 col-lg-7 col-xl-5">
        <form action="" method="post" id="editPassword" class="d-none">
            <input type="hidden" name="action" value="updatePassword">
            <input type="hidden" name="userId" value="<?php echo $me["id"]; ?>" />
            <div class="form-group">
                <label for="newPassword">Parola Noua</label>
                <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="Parola noua" reuquired />
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirmare Parola</label>
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmare Parola" reuquired />
            </div>
            <button type="submit" class="btn btn-primary">Actualizare</button>
        </form>
    </div>
</div>