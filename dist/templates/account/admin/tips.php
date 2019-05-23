<?php
    include_once "classes/CookingTip.php";
    $tipObj = new CookingTip();
    $mytips = $tipObj->getData("cooking_tips");
?>

<h1>Administrare <span class="text-primary">Sfaturi Culinare</span></h1>
<div class="mb-3">
    <div class="row">
        <div class="col-12 col-6 col-md-4 col-lg-auto">
            
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Titlu</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Data</th>
                <th>
                    <form action="javascript:;" method="post" class="tips-live-search" id="tipLiveSearch">
                        <div class="input-group input-group-sm m-0">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Cauta</div>
                            </div>
                            <input type="text" class="form-control" id="liveSearch" name="liveSearch" placeholder="Sfat">
                        </div>
                    </form>
                </th>
            </tr>
        </thead>
        <tbody id="searchContainer">
            
        </tbody>
    </table>
</div>