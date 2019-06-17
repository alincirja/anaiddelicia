"use strict";

import $ from "jquery";
import * as util from "./utils";

const $cache = {};

const getEventsList = () => {
    $.ajax({
        url: "templates/account/admin/ajax-templates/events-list?action=getEventsList",
        type: "GET",
        success: res => {
            $("#eventsList").html(res);
        }
    });
};

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

const getEventParts = trigger => {
    const $btn = $(trigger).closest(".btn");
    let data = "?event=" + $btn.attr("data-id");
    $.ajax({
        url: "templates/account/admin/ajax-templates/participants-modal.php" + data,
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
        },
        error: err => {
            console.log(err);
        }
    });
}

const setPublicStatus = event => {
    const $cbox = $(event).closest(".public-event-check");
    const $card = $cbox.closest(".card");
    util.spinner($card, "start");
    const data = {
        "action": "setStatus",
        "enabled": $cbox.is(":checked") ? 1 : 0,
        "event": $cbox.attr("data-event")
    };

    $.ajax({
        url: "inc/scripts/event/status.php",
        type: "POST",
        data: data,
        error: err => {
            console.log(err);
        },
        complete: () => {
            getEventsList();
            util.spinner($card, "stop");
        }
    });
};

const newEvent = form => {
    const $form = $(form);
    const data = $form.serialize();
    $form.find(".alert").remove();
    $form.find(".form-control").removeClass("is-invalid");
    $.ajax({
        url: "inc/scripts/event/new-edit.php",
        type: "POST",
        data: data,
        success: res => {
            let dataJSON;
            try {
                dataJSON = JSON.parse(res);
            } catch (error) {
                console.error(error);
            }

            if (dataJSON) {
                $form.append(`<div class="alert alert-${dataJSON.type}">${dataJSON.msg}</div>`)
                if (dataJSON.fields) {
                    dataJSON.fields.forEach(el => {
                        $(".form-control[name=" + el + "]").addClass("is-invalid");
                    });
                } else {
                    $(document).find("#eventModal").modal('toggle');
                    getEventsList();
                }
            } else {
                console.log(res);
            }
        },
        error: err => {
            console.log(err);
        }
    });
};

const deleteEvent = event => {
    $.ajax({
        url: "inc/scripts/event/delete.php",
        type: "POST",
        data: {
            "action": "deleteEvent",
            "event": event
        },
        error: err => {
            console.log(err);
        },
        complete: () => {
            getEventsList();
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

    $(document).on("click", ".getEventParts", e => {
        e.preventDefault();
        getEventParts(e.currentTarget);
    });

    $(document).on('hidden.bs.modal', "#participantsModal", function () {
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

    $(document).on("click", ".public-event-check", e => {
        e.preventDefault();
        setPublicStatus(e.target);
    });

    $(document).on("submit", "#formSubmitEvent", e => {
        e.preventDefault();
        newEvent(e.target);
    });

    $(document).on("click", ".delete-event", e => {
        e.preventDefault();
        if (confirm("Sigur doriti sa stergeti evenimentul?")) {
            deleteEvent($(e.target).closest(".delete-event").attr("data-event"));
        }
    });

    $(document).on("click", ".participant-status", e => {
        e.preventDefault();
        const $btn = $(e.target);
        const participant = $btn.attr("data-id");
        $.ajax({
            url: $btn.attr("href"),
            type: "GET",
            success: res => {
                const dataJSON = JSON.parse(res);
                if (dataJSON.type === "success") {
                    $.get("inc/scripts/event/get-participant.php?participant=" + participant, res => {
                        console.log(res);
                        $(document).find(".participant-" + participant).html(res);
                    });
                }
            },
            error: err => {
                console.log(err);
            }
        });
    });
};

/** Call Initialization */
initCache();
initEvents();