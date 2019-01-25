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

const fixPageTitle = () => {
    const headerHeight = $cache.menuContainer.outerHeight();
    $cache.pageTitle.css("margin-top", headerHeight);
};

const toggleMenu = () => {
    if (util.isMobile()) {
        $cache.menuContainer.toggleClass("menu-collapsed");
    }
};

/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.toggleMenuBtn = $(".mobile-menu-trigger");
    $cache.menuContainer = $(".site-header");
    $cache.pageTitle = $(".page-title");
};

/** Initializare evenimente */
const initEvents = () => {
    $cache.toggleMenuBtn.on("click", toggleMenu);
    $(window).on("load resize", fixNavigation);
    $(window).on("load resize", fixPageTitle);
    $('[data-toggle="tooltip"]').tooltip();
};

/** Call Initialization */
initCache();
initEvents();