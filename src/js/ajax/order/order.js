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

const updateOrder = order => {
    const $this = $(order).closest(".modal-content");
    util.spinner($this, "start");
    const id = $this.attr("data-id");
    const data = {
        "action": "updateOrder",
        "orderId": id,
        "comments": $this.find("#adminDetails").val(),
        "status": $this.find("#orderStatus").val()
    };

    $.ajax({
        url: "inc/scripts/order/update.php",
        type: "POST",
        data: data,
        success: res => {
            console.log(res);
        },
        error: err => {
            console.log(err)
        },
        complete: () => {
            util.spinner($this, "stop");
        }
    });
}

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

    $(document).on("click", ".update-order", e => {
        updateOrder(e.target);
    });
};

/** Call Initialization */
initCache();
initEvents();