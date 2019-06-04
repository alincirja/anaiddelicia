"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const viewMsgs = order => {
    const orderId = $(order).closest(".view-order-msgs").attr("data-id");

    $.ajax({
        url: "templates/account/admin/ajax-templates/order-messages?orderId=" + orderId,
        type: "GET",
        success: res => {
            $(res).modal();
            getMesgs(orderId);
        },
        error: err => {
            console.log(err);
        }
    });
};

const getMesgs = order => {
    $.ajax({
        url: "templates/account/admin/ajax-templates/order-messages-list?messagesList=" + order,
        type: "GET",
        success: res => {
            const $msgList = $(document).find("#messagesList");
            $msgList.html(res);
            $msgList.scrollTop($msgList[0].scrollHeight);
        },
        error: err => {
            console.log(err);
        }
    });
};

const sendMsg = form => {
    const $form = $(form);
    const $msgInp = $form.find("#msg");
    $form.find(".invalid-feedback").empty();
    $msgInp.removeClass("is-invalid");
    if ($msgInp.val() === "") {
        $form.find(".invalid-feedback").text('Nu puteti trimite mesajul gol');
        $msgInp.addClass("is-invalid");
    } else {
        $.ajax({
            url: "inc/scripts/order/send-message.php",
            type: "POST",
            data: $form.serialize() + "&action=sendMsg",
            success: res => {
                $msgInp.val("");
            },
            error: err => {
                console.log(err);
            },
            complete: () => {
                getMesgs($form.find("[name=orderId]").val());
            }
        });
    }
}

const msgRefresh = () => {
    const $msgModal = $(document).find("#orderMessages");
    if ($msgModal.length) {
        const orderId = $msgModal.find("[name=orderId]").val();
        if (orderId) {
            getMesgs(orderId);
        }
    }
}

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
};

/** Initializare evenimente */
const initEvents = () => {
    $(document).find(".view-order-msgs").on("click", e => {
        viewMsgs(e.currentTarget);
    });

    $(document).on('hidden.bs.modal', "#orderMessages", function () {
        $(this).remove();
    });

    $(document).on("submit", "#sendMsg", e => {
        e.preventDefault();
        sendMsg(e.currentTarget);
    });

    setInterval(() => {
        msgRefresh();
    }, 1000);
};

/** Call Initialization */
initCache();
initEvents();