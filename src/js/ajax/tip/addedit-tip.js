"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const addeditTip = () => {
    const $form = $cache.addeditTipForm;
    $form.on("submit", e => {
        e.preventDefault();
        util.spinner($form, "start");
        $form.find(".alert").remove();
        $.ajax({
            url: "inc/scripts/tip/add-tip.php",
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
    $cache.addeditTipForm = $("#addEditTipForm");
    
};

/** Initializare evenimente */
const initEvents = () => {
    addeditTip();
};

/** Call Initialization */
initCache();
initEvents();