"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const updateProfile = () => {
    const $form = $cache.profileForm;

    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/user/update-profile.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                console.log(data);
                const dataJSON = JSON.parse(data);
                $form.append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
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
    $cache.profileForm = $("#editProfileForm");
    
};

/** Initializare evenimente */
const initEvents = () => {
    updateProfile();
};

/** Call Initialization */
initCache();
initEvents();