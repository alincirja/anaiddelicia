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
    })
};

const updateOrder = order => {
    const $this = $(order);
    const $modal = $this.closest(".modal-content");
    $modal.find(".alert").remove();
    $.ajax({
        url: "inc/scripts/order/update-order.php",
        type: "POST",
        data: {
            "comments": $modal.find("#adminDetails").val(),
            "status": $modal.find("#orderStatus").val(),
            "orderID": $this.attr("data-id"),
            "action": "updateOrder"
        },
        success: res => {
            const datajs = JSON.parse(res);
            $modal.append(`<div class="mx-3 alert alert-${datajs.type}">${datajs.msg}</div>`);
            setTimeout(() => {
                $modal.find(".alert").remove();
            }, 5000);
        },
        error: err => {
            console.log(err);
        }
    })
}

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
};

/** Initializare evenimente */
const initEvents = () => {
    $(document).find(".view-order").on("click", e => {
        viewOrder(e.currentTarget);
    });

    $(document).on("click", "#updateOrder", e => {
        updateOrder(e.currentTarget);
    });
};

/** Call Initialization */
initCache();
initEvents();