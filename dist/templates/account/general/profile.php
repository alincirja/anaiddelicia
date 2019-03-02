<h1>Profil</h1>
<form action="" method="post" id="editProfileForm">
    <input type="hidden" name="action" value="updateProfile" />
    <input type="hidden" name="userId" value="<?php echo $me["id"]; ?>" />
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="editName">Nume</label>
                <input type="text" class="form-control" placeholder="Nume" id="editName" name="editName" value="<?php echo $me["name"]; ?>" required />
            </div><!--/.form-group-->
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="text" class="form-control" placeholder="Email" id="editEmail" name="editEmail" value="<?php echo $me["email"]; ?>" required />
            </div><!--/.form-group-->
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="editDescription">Descriere</label>
                <textarea rows="9" class="form-control" placeholder="Descriere" id="editDescription" name="editDescription"><?php echo $me["description"]; ?></textarea>
            </div><!--/.form-group-->
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="editFacebook">Facebook</label>
                <input type="text" class="form-control" placeholder="Facebook" id="editFacebook" name="editFacebook" value="<?php echo $me["social_facebook"]; ?>" />
            </div><!--/.form-group-->
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="editInstagram">Instagram</label>
                <input type="text" class="form-control" placeholder="Instagram" id="editInstagram" name="editInstagram" value="<?php echo $me["social_instagram"]; ?>" />
            </div><!--/.form-group-->
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="editLinkedin">Linkedin</label>
                <input type="text" class="form-control" placeholder="Linkedin" id="editLinkedin" name="editLinkedin" value="<?php echo $me["social_linkedin"]; ?>" />
            </div><!--/.form-group-->
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="editYoutube">Youtube</label>
                <input type="text" class="form-control" placeholder="Youtube" id="editYoutube" name="editYoutube" value="<?php echo $me["social_youtube"]; ?>" />
            </div><!--/.form-group-->
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizare</button>
</form>