"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const checkPassword = () => {
    const $form = $cache.checkPasswordForm;

    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/user/password/check-password.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                //console.log(data);
                const dataJSON = JSON.parse(data);
                if (dataJSON.type === "success") {
                    $form.addClass("d-none");
                    $cache.updatePasswordForm.removeClass("d-none");
                } else {
                    $form.append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
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

const updatePassword = () => {
    const $form = $cache.updatePasswordForm;

    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/user/password/update-password.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                console.log(data);
                const dataJSON = JSON.parse(data);
                if (dataJSON.type === "success") {
                    $form.parent().append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
                    $form.addClass("d-none");
                } else {
                    $form.append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
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
    $cache.checkPasswordForm = $("#checkPassword");
    $cache.updatePasswordForm = $("#editPassword");
    
};

/** Initializare evenimente */
const initEvents = () => {
    checkPassword();
    updatePassword();
};

/** Call Initialization */
initCache();
initEvents();