"use strict";

import $ from "jquery";
import * as util from "./utils";

const $cache = {};

const accountNavTrigger = e => {
    if (util.isMobile()) {
        const $card = $(e.currentTarget).closest(".card");
        $card.toggleClass("open");
    }
};


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.body = $("body");
    $cache.cardTrigger = $(".card-trigger");
};

/** Initializare evenimente */
const initEvents = () => {
    $cache.cardTrigger.on("click", accountNavTrigger);
};

/** Call Initialization */
initCache();
initEvents();