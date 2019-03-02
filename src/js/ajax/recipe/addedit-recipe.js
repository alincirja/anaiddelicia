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


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.addeditRecipeForm = $("#addRecipeForm");
    $cache.fileInput = $("#recipeImage");
};

/** Initializare evenimente */
const initEvents = () => {
    addeditRecipe();
    $cache.fileInput.on("change", function() {
        previewImage(this);
    });
    $(".help-btn.remove").on("click", removeImg);
};

/** Call Initialization */
initCache();
initEvents();