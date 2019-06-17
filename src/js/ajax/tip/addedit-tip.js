"use strict";

import $ from "jquery";
import * as util from "../../utils";

/** Initializare evenimente */
const initEvents = () => {
    $(document).on('show.bs.modal', "#tipModal", function (e) {
        const $btn = $(e.relatedTarget);
        const modal = $(this);
        $.get("templates/tip/get-tip.php?action=getTip&id=" + $btn.attr("data-id"), res => {
            const resJSON = JSON.parse(res);
            modal.find(".modal-title").text(resJSON.type);
            modal.find(".modal-body p").text(resJSON.msg);
        });
    });

    $(document).on("click", ".tip-edit", e => {
        const $this = $(e.target);
        const form  = $("#tipForm");
        form.find("#tipTitle").val($this.attr("data-title"));
        form.find("#tipBody").val($this.attr("data-body"));
        form.find("[name=id]").val($this.attr("data-id"));
        form.find("[name=action]").val("editTip");
    });

    $(document).on("click", ".tip-form-reset", e => {
        const form  = $("#tipForm");
        form.find("[name=id]").val("");
        form.find("[name=action]").val("newTip");
        form.find(".alert").remove();
    });

    $("#tipForm").on("submit", e => {
        e.preventDefault();
        $(e.target).find(".alert").remove();
        $.ajax({
            url: "inc/scripts/tip/addedit-tip.php",
            type: "POST",
            data: $(e.target).serialize(),
            success: res => {
                const dataJSON = JSON.parse(res);
                $(e.target).find(".buttons-feedback").append(`<div class="mt-2 alert alert-${dataJSON.type}">${dataJSON.msg}</div>`);
            },
            error: err => {
                console.log(err);
            }
        });
    });
};

/** Call Initialization */
initEvents();
