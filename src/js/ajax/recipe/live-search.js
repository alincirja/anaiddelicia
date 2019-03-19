"use strict";

import $ from "jquery";
import * as util from "../../utils";

const $cache = {};

const liveSearch = () => {
    const data = {
        "action": "liveSearch",
        "liveSearch": $("#liveSearch").val()
    }
    $.ajax({
        url: "templates/account/admin/ajax-templates/recipe-live-search.php",
        type: "POST",
        data: data,
        success: function(data) {
            $cache.searchContainer.html(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
    return false;
};


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.searchField = $("#liveSearch");
    $cache.searchContainer = $("#searchContainer");
};

/** Initializare evenimente */
const initEvents = () => {
    liveSearch();
    $cache.searchField.on("keyup", liveSearch);
};

/** Call Initialization */
initCache();
initEvents();