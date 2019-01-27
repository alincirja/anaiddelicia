"use strict";

import $ from "jquery";
import * as util from "./utils";

const $cache = {};

const fixNavigation = () => {
    if (util.isMobile()) {
        $cache.menuContainer.addClass("menu-collapsed");
    } else {
        $cache.menuContainer.removeClass("menu-collapsed");
    }
};

const toggleMenu = () => {
    if (util.isMobile()) {
        $cache.menuContainer.toggleClass("menu-collapsed");
    }
};

const toggleSearchForm = e => {
    if ($(e.currentTarget).attr("class") === "searchformcontainer") {
        e.preventDefault();
        e.stopPropagation();
        $cache.searchForm.addClass("show");
        $cache.searchFormField.focus();
    } else {
        $cache.searchForm.removeClass("show");
    }
}

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.body = $("body");
    $cache.toggleMenuBtn = $(".mobile-menu-trigger");
    $cache.menuContainer = $(".site-header");
    $cache.pageTitle = $(".page-title");
    $cache.searchTrigger = $(".searchformcontainer");
    $cache.searchForm = $(".searchform");
    $cache.searchFormField = $cache.searchForm.find(".form-control");
};

/** Initializare evenimente */
const initEvents = () => {
    $cache.toggleMenuBtn.on("click", toggleMenu);
    $cache.searchTrigger.on("click", toggleSearchForm);
    $cache.body.on("click", toggleSearchForm);
    $(window).on("load resize", fixNavigation);
    $('[data-toggle="tooltip"]').tooltip();
};

/** Call Initialization */
initCache();
initEvents();