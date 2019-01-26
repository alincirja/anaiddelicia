"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const register = () => {
    const $form = $cache.registerForm;

    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $.ajax({
            url: "inc/scripts/user/register.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                const dataJSON = JSON.parse(data);
                console.log(dataJSON);
                $form[0].reset();
                $form.prepend("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>")
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
    $cache.registerForm = $("#formRegister");
};

/** Initializare evenimente */
const initEvents = () => {
    register();
};

/** Call Initialization */
initCache();
initEvents();