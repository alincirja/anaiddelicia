<?php
    $action = new Database();

    function editValue($field) {
        if($GLOBALS["editMode"]) {
            $recipe = new Recipe();
            $myrecipe = $recipe->getById($_GET["id"]);
            return $myrecipe[$field];
        }
    }
?>

<form action="javascript:;" method="post" id="<?php echo $GLOBALS["editMode"] ? "editRecipeForm" : "addRecipeForm"; ?>" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php echo $GLOBALS["editMode"] ? "editRecipe" : "addRecipe"; ?>" />
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group required">
                        <label for="recipeTitle">Titlu</label>
                        <input value="<?php echo editValue("title"); ?>" type="text" class="form-control" placeholder="Titlu" id="recipeTitle" name="recipeTitle"  />
                    </div><!--/.form-group-->
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group required">
                        <label for="recipeCategory">Categorie</label>
                        <select class="form-control" name="recipeCategory" id="recipeCategory">
                            <option value="">---</option>
                        <?php
                            $categories = $action->getData("categories");
                            if ($categories) {
                                foreach ($categories as $category) {
                        ?>
                            <option
                                <?php
                                echo editValue("id_category") === $category["id"] ? "selected" : "";
                                ?>
                                value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                    </div><!--/.form-group-->
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group required">
                        <label for="recipeDescription">Descriere</label>
                        <textarea class="form-control" placeholder="Descriere" id="recipeDescription" name="recipeDescription"  cols="30" rows="5"><?php echo editValue("description"); ?></textarea>
                    </div><!--/.form-group-->
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group required">
                        <label for="recipeDirections">Instructiuni</label>
                        <textarea  class="form-control" placeholder="Instructiuni" id="recipeDirections" name="recipeDirections"  cols="30" rows="5"><?php echo editValue("directions"); ?></textarea>
                    </div><!--/.form-group-->
                </div>
                <div class="col-12">
                    <div class="form-group required">
                        <label for="recipeIngredients">Ingrediente</label>
                        <textarea  class="form-control" placeholder="Ingrediente" id="recipeIngredients" name="recipeIngredients"  cols="30" rows="10"><?php echo editValue("ingredients"); ?></textarea>
                    </div><!--/.form-group-->
                </div>
            </div>
        </div><!--/.col-->
        <div class="col-12 col-lg-4">
            <div class="row">
                <div class="col-12">
                    <label for="recipeImage">Imagine de prezentare</label>
                    <div id="imgPrev" class="mb-2 <?php echo $GLOBALS["editMode"] && editValue("image") ? "" : "d-none" ?>">
                        <img src="img/upload/recipes/<?php echo editValue("image"); ?>" alt="" class="img-fluid" />
                        <div class="helpers">
                            <label class="help-btn edit" for="recipeImage"><i class="fas fa-fw fa-edit"></i></label>
                            <label class="help-btn remove"><i class="fas fa-fw fa-times"></i></label>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo $GLOBALS["editMode"] && editValue("image") ? "d-none" : "" ?>">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  id="recipeImage" name="recipeImage" accept="image/png, image/jpeg, image/jpg"/>
                            <label class="custom-file-label" for="recipeImage">Selectati fisierul</label>
                        </div>
                    </div><!--/.form-group-->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="recipeVideo">YouTube Video ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fab fa-youtube"></i></div>
                            </div>
                            <input value="<?php echo editValue("video"); ?>" type="text" class="form-control" placeholder="4gM8MLWA8m8" id="recipeVideo" name="recipeVideo" />
                        </div>
                    </div><!--/.form-group-->
                </div>
                <div class="col-6">
                    <div class="form-group required">
                        <label for="recipeCookingTime">Timp de preparare</label>
                        <input value="<?php echo editValue("cooking_time"); ?>" type="text" class="form-control" id="recipeCookingTime" name="recipecookingTime" placeholder="30 Minute"  />                          
                    </div><!--/.form-group-->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="recipeComplexity">Nivel dificultate</label>
                        <select class="form-control" name="recipeComplexity" id="recipeComplexity">
                            <option value="usor">Usor</option>
                            <option value="mediu">Mediu</option>
                            <option value="greu">Greu</option>
                        </select>
                    </div><!--/.form-group-->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="recipeServingsNo">Numar portii</label>
                        <input value="<?php echo editValue("servings_no") || "1"; ?>" type="number" class="form-control" name="recipeServingsNo" id="recipeServingsNo" placeholder="1" min="1" />
                    </div><!--/.form-group-->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="recipeRegion">Regiune</label>
                        <select class="form-control" name="recipeRegion" id="recipeRegion">
                            <option value="">---</option>
                        <?php
                            $regions = $action->getData("regions");
                            if ($regions) {
                                foreach ($regions as $region) {
                        ?>
                            <option
                            <?php
                                echo editValue("id_region") === $region["id"] ? "selected" : "";
                                ?>
                             value="<?php echo $region["id"]; ?>"><?php echo $region["name"]; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                    </div><!--/.form-group-->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="d-block">Articol de post?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recipeDePost" id="recipeDePostNo" value="0" <?php echo $GLOBALS["editMode"] && editValue("de_post") === "0" ? "checked" : "checked"; ?>>
                            <label class="form-check-label" for="recipeDePostNo">Nu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recipeDePost" id="recipeDePostYes" value="1" <?php echo $GLOBALS["editMode"] && editValue("de_post") === "1" ? "checked" : ""; ?>>
                            <label class="form-check-label" for="recipeDePostYes">Da</label>
                        </div>
                    </div><!--/.form-group-->
                </div>
            </div><!--/.row-->
        </div><!--/.col-->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Trimite reteta</button>
            <div class="feedback pt-3"></div>
        </div>
    </div><!--/.row-->
</form>