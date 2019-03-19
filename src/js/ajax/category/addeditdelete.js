"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const addCategory = () => {
    const $form = $cache.addCatForm;

    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/category/add.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                const dataJSON = JSON.parse(data);
                if (dataJSON.type === "success") {
                    location.reload();
                }
                $form.append("<div class='alert alert-"+dataJSON.type+" mt-2'>"+dataJSON.msg+"</div>");
                util.spinner($form, "stop");
            },
            error: function(err) {
                console.log(err);
                util.spinner($form, "stop");
            }
        });
    });
};

const preEdit = input => {
    const $saveBtn = $(input).closest(".row").find(".saveEditedCat");
    $(input).on("keyup", () => {
        const initialVal = $(input).attr("data-initial-value");
        $saveBtn.removeClass("disabled");
        const newVal = input.value;
        if (newVal != initialVal && newVal != "") {
            $saveBtn.removeClass("disabled");
        } else {
            $saveBtn.addClass("disabled");
        }
    });
};


const updateCategory = () => {
    $(document).on("click", ".saveEditedCat", e => {
        e.preventDefault();
        const $this = e.currentTarget;
        const id = $($this).attr("data-id");
        const $inputField = $("#categoryItem" + id);
        const $catContainer = $inputField.closest("#cat-" + id);
        const data = {
            action: "editCategory",
            name: $inputField.val(),
            id: id
        }

        $.ajax({
            url: $($this).attr("href"),
            type: "POST",
            data: data,
            success: function(res) {
                const resJSON = JSON.parse(res);
                if (resJSON.type === "success") {
                    $inputField.attr("data-initial-value", data.name);
                    $($this).addClass("disabled");
                }
                $("#cat-"+id).append("<small class='feedback text-"+resJSON.type+"'>"+resJSON.msg+"</small>");
                setTimeout(() => {
                    $catContainer.find(".feedback").fadeOut();
                    setTimeout(() => {
                        $catContainer.find(".feedback").remove();
                    }, 300);
                }, 3000)
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
}

const deleteCategory = () => {
    let url;
    let catId;
    const $deleteBtn = $cache.deleteCategoryModal.find(".deleteCat");

    $cache.deleteCategoryModal.on("show.bs.modal", event => {
        const $trigger = $(event.relatedTarget);
        const modal = $(event.currentTarget);
        catId = $trigger.data("id");
        url = $deleteBtn.attr("href") + "?id=" + catId;
        modal.find(".cat-name").text($trigger.data("name"));
    });

    $deleteBtn.on("click", e => {
        e.preventDefault();
        const dataAjax = {
            action: "deleteCategory",
        }
        $.ajax({
            url: url,
            type: "POST",
            data: dataAjax,
            success: function(res) {
                const resJSON = JSON.parse(res);
                if (resJSON.type === "success") {
                    $("#cat-" + catId).remove();
                    $cache.deleteCategoryModal.modal("hide");
                } else {
                    alert(resJSON.msg);
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
};


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.addCatForm = $("#addCategoryForm");
    $cache.categories = $(document).find(".category-item");
    $cache.deleteCategoryModal = $(document).find("#deleteCat");
};

/** Initializare evenimente */
const initEvents = () => {
    addCategory();
    $cache.categories.each((index, input) => {
        preEdit(input);
    });
    updateCategory();
    deleteCategory();
};

/** Call Initialization */
initCache();
initEvents();