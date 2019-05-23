<form action="" method="post" id="addContactForm"> 
    <input type="hidden" name="action" value="addContact">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="form-group required">
                <label for="contactName">Nume</label>
                <input class="form-control" type="text"   placeholder="Nume" id="contactName" name="contactName" required >
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group required">
            <label for="contactEmail">Email</label>
                <input class="form-control" type="email"   placeholder="Email" id="contactEmail" name="contactEmail" required>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group required">
                <label for="contactPhone">Telefon</label>
                <input class="form-control" type="tel"   placeholder="Telefon" id="contactPhone" name="contactPhone" required>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group required">
                <label for="contactSubject">Subiect</label>
                <input  class="form-control" type="subject"  placeholder="Subiect" id="contactSubject" name="contactSubject" required>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group required">
                <label for="contactMessage">Mesaj</label>
                <textarea class="form-control"  name="contactMessage" id="contactMessage" required placeholder="Mesaj" rows="6"></textarea>
            </div>
        </div>
    </div><!--/.row-->
    <div class="text-center">
        <button type="submit" class="btn btn-lg btn-outline-primary">Trimite mesajul </button>
        <div class="feedback pt-3"></div>
    </div>
</form>