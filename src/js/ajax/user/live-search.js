"use strict";

import $ from "jquery";

const $cache = {};

const liveSearchUser = () => {
    const data = {
        "action": "liveSearchUser",
        "liveSearchUser": $("#liveSearchUser").val()
    }
    $.ajax({
        url: "templates/account/admin/ajax-templates/user-live-search.php",
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
    $cache.searchField = $("#liveSearchUser");
    $cache.searchContainer = $("#searchContainerUser");
};

/** Initializare evenimente */
const initEvents = () => {
    liveSearchUser();
    $cache.searchField.on("keyup", liveSearchUser);
};

/** Call Initialization */
initCache();
initEvents();