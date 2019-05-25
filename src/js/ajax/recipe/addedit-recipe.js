"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const previewImage = (input) => {
    if (input && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $("#imgPrev").removeClass("d-none").find("img").attr("src", e.target.result);
            $cache.fileInput.closest(".form-group").addClass("d-none");
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $("#imgPrev").addClass("d-none");
        $cache.fileInput.closest(".form-group").removeClass("d-none");
    }
};

function removeImg() {
    $cache.fileInput.wrap('<form>').closest('form').get(0).reset();
    $cache.fileInput.unwrap();
    $("#imgPrev").addClass("d-none");
    $cache.fileInput.closest(".form-group").removeClass("d-none");
}

const addeditRecipe = () => {
    const $form = $cache.addeditRecipeForm;
    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert, .invalid-feedback").remove();
        $form.find(".form-control").removeClass("is-invalid");
        let formData = new FormData($form[0]);
        $.ajax({
            url: "inc/scripts/recipe/addedit-recipe.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                const dataJSON = JSON.parse(data);
                $form.find(".feedback").append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
                if (dataJSON.type === "danger") {
                    if (dataJSON.fields) {
                        dataJSON.fields.forEach(element => {
                            $("#" + element).addClass("is-invalid").parent().append("<div class='invalid-feedback'>Acest camp este obligatoriu</div>");
                        });
                    }
                }
                util.spinner($form, "stop");
            },
            error: function(err) {
                console.log(err);
                util.spinner($form, "stop");
            }
        });
    });
};

const insertImage = () => {
    const $form = $cache.galleryForm;
    $form.on("submit", e => {
        e.preventDefault();
        $form.find(".alert").remove();
        util.spinner($form, "start");
        let formData = new FormData($form[0]);
        $.ajax({
            url: "inc/scripts/recipe/gallery/add.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                const dataJSON = JSON.parse(data);
                $form.find(".feedback").append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
                if (dataJSON.type === "success") {
                    location.reload();
                }
                util.spinner($form, "stop");
            },
            error: function(err) {
                console.log(err);
                util.spinner($form, "stop");
            }
        });
    });
};

const deleteImage = item => {
    const data = {
        "action": "deleteImage"
    }
    $.ajax({
        url: $(item).attr("href"),
        type: "POST",
        data: data,
        success: function(data) {
            console.log(data);
            const dataJSON = JSON.parse(data);
            if (dataJSON.type === "success") {
                location.reload();
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
    return false;
};

const setStatus = item => {
    const data = {
        "action": "setStatus"
    }
    $.ajax({
        url: $(item).attr("href"),
        type: "POST",
        data: data,
        success: function(data) {
            const dataJSON = JSON.parse(data);
            if (dataJSON.type === "success") {
                location.reload();
            } else {
                $(item).closest(".card-body").append("<div class='alert mt-2 alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
    return false;
};

const addToFavs = item => {
    $.ajax({
        url: $(item).attr("href"),
        type: "POST",
        data: {
            "action": "addToFavs",
            "user": $(item).attr("data-user"),
            "recipe": $(item).attr("data-recipe")
        },
        success: res => {
            const dataJSON = JSON.parse(res);
            if (dataJSON.type === "success") {
                location.reload();
            } else {
                $cache.FavContainer.append("<div class='invalid-feedback'>" + dataJSON.msg + "</div>");
            }
        },
        error: err => {
            console.log(err);
        }
    });
}


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.addeditRecipeForm = $("#addEditRecipeForm");
    $cache.fileInput = $("#recipeImage");
    $cache.galleryForm = $("#galleryForm");
    $cache.galleryInput = $("#galleryFile");
    $cache.galleryDelete = $(document).find(".delete-image");
    $cache.statusBtn = $(document).find(".set-status");
    $cache.addFavsBtn = $(document).find(".add-to-favs");
    $cache.FavContainer = $(document).find(".fav-container");
};

/** Initializare evenimente */
const initEvents = () => {
    addeditRecipe();
    insertImage();
    $cache.fileInput.on("change", function() {
        previewImage(this);
    });
    $cache.galleryDelete.on("click", function(e) {
        e.preventDefault();
        deleteImage(this);
    });
    $cache.statusBtn.on("click", function(e) {
        e.preventDefault();
        setStatus(this);
    });
    $(".help-btn.remove").on("click", removeImg);
    $cache.addFavsBtn.on("click", e => {
        e.preventDefault();
        addToFavs(e.target);
    });
};

/** Call Initialization */
initCache();
initEvents();