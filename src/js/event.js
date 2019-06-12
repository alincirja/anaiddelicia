"use strict";

import $ from "jquery";
import * as util from "./utils";

const $cache = {};

const getEventModal = trigger => {
    const $btn = $(trigger).closest(".btn");
    let data = "?action=" + $btn.attr("data-action");
    data += $btn.attr("data-id") ? "&eventId=" + $btn.attr("data-id") : "";
    $.ajax({
        url: "templates/account/admin/ajax-templates/event-modal.php" + data,
        type: "GET",
        success: res => {
            $(res).modal();
        },
        error: err => {
            console.log(err);
        }
    });
};

const getEventSignupModal = trigger => {
    const $btn = $(trigger).closest(".btn");
    $.ajax({
        url: $btn.attr("href"),
        type: "GET",
        success: res => {
            $(res).modal();
        },
        error: err => {
            console.log(err);
        }
    });
};

const signupToEvent = form => {
    const $form = $(form);
    $form.find(".alert").remove();
    $.ajax({
        url: "inc/scripts/event/signup.php",
        type: "POST",
        data: $form.serialize() + "&action=eventSignup",
        success: res => {
            const dataJSON = JSON.parse(res);
            if (dataJSON.type === "success") {
                location.reload();
            } else {
                $form.find(".modal-body").append(`<div class="mt-2 mb-0 alert alert-${dataJSON.type}">${dataJSON.msg}</div>`);
            }
        },
        error: err => {
            console.log(err);
        }
    });
};

const sendVote = target => {
    const $target = $(target).closest(".btn-vote-recipe");
    const $card = $target.closest(".card-body");
    const $votesCount = $card.find(".votes-count")
    const votesCount = Number($votesCount.text());
    const data = {
        "action": "voteRecipe",
        "event": $target.attr("data-event"),
        "participant": $target.attr("data-participant"),
        "recipe": $target.attr("data-recipe")
    };

    $.ajax({
        url: "inc/scripts/event/vote.php",
        type: "POST",
        data: data,
        success: res => {
            const dataJSON = JSON.parse(res);
            if (dataJSON.type === "success") {
                $(document).find(".btn-vote-recipe").remove();
                $card.append(`<small class="voted text-primary">Votat</small>`);
                $votesCount.text(votesCount + 1);
            } else {
                $card.append(`<small class="voted text-danger">${dataJSON.msg}</small>`);
            }
        }
    });
}

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
};

/** Initializare evenimente */
const initEvents = () => {
    $(document).on("click", ".getEventModal", e => {
        e.preventDefault();
        getEventModal(e.currentTarget);
    });

    $(document).on('hidden.bs.modal', "#eventModal", function () {
        $(this).remove();
    });

    $(document).on("click", ".event-signup", e => {
        e.preventDefault();
        getEventSignupModal(e.currentTarget);
    });

    $(document).on('hidden.bs.modal', "#signupEvent", function () {
        $(this).remove();
    });

    $(document).on("submit", "#eventSignupForm", e => {
        e.preventDefault();
        signupToEvent(e.target);
    });

    $(document).on("click", ".btn-vote-recipe", e => {
        e.preventDefault();
        sendVote(e.target);
    });
};

/** Call Initialization */
initCache();
initEvents();