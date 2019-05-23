"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const addContact = () => {
    const $form = $cache.addContact;
    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/contact/add-contact.php",
            type: "POST",
            data: $form.serialize(),
            success: function(data) {
                console.log(data);
                const dataJSON = JSON.parse(data);
                $form.find(".feedback").append("<div class='alert alert-"+dataJSON.type+"'>"+dataJSON.msg+"</div>");
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
    $cache.addContact= $("#addContactForm");
};

/** Initializare evenimente */
const initEvents = () => {
    addContact();
};

/** Call Initialization */
initCache();
initEvents();