"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const login = () => {
    const $form = $cache.loginForm;

    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/user/login.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                console.log(data);
                const dataJSON = JSON.parse(data);
                if (dataJSON.type === "success") {
                    window.location.replace(dataJSON.msg);
                } else {
                    $form.find(".modal-body").append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
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
    $cache.loginForm = $("#formLogin");
};

/** Initializare evenimente */
const initEvents = () => {
    login();
};

/** Call Initialization */
initCache();
initEvents();