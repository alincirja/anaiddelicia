"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const viewOrder = order => {
    const orderId = $(order).closest(".view-order").attr("data-id");
    $.ajax({
        url: "templates/account/admin/ajax-templates/order-details?orderId=" + orderId,
        type: "GET",
        success: res => {
            $(res).modal();
        },
        error: err => {
            console.log(err);
        }
    });
};

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
};

/** Initializare evenimente */
const initEvents = () => {
    $(document).find(".view-order").on("click", e => {
        viewOrder(e.currentTarget);
    });

    $(document).on('hidden.bs.modal', "#orderModal", function () {
        $(this).remove();
    });
};

/** Call Initialization */
initCache();
initEvents();