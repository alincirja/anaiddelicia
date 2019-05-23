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
            url: "inc/scripts/tip/addedit-tip.php",
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

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.addeditTipForm = $("#addEditTipForm");
    $cache.statusBtn = $(document).find(".set-status");
};

/** Initializare evenimente */
const initEvents = () => {
    addeditTip();
};

/** Call Initialization */
initCache();
initEvents();
