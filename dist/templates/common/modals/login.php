<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Autentificare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="" method="post" id="formLogin">
                <input type="hidden" name="action" value="userLogin">
                <div class="modal-body">   
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="loginEmail" id="loginEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Parola</label>
                        <input type="password" name="loginPass" id="loginPass" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Cont Nou</button>
                    <button type="submit" class="btn btn-primary">Autentifica-ma</button>
                </div>
            </form>
        </div>
    </div>
</div>