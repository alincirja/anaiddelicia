<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Inregistrare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="" method="post" id="formRegister">
                <input type="hidden" name="action" value="userRegister">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nume</label>
                        <input type="text" name="registerName" id="registerName" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="registerEmail" id="registerEmail" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Parola</label>
                        <input type="password" name="registerPass" id="registerPass" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Autentificare</button>
                    <button type="submit" class="btn btn-primary">Inregistrare</button>
                </div>
            </form>
        </div>
    </div>
</div>