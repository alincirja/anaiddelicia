"use strict";

import $ from "jquery";
import * as util from "./utils";

const $cache = {};

const mediaTabs = () => {
    $cache.tabBtns.on("click", e => {
        e.preventDefault();
        const $this = e.currentTarget;
        const target = $($this).attr("href");
        $cache.tabContent.each(function() {
            $(this).removeClass("active");
        });
        $($cache.tabBtns).parent("li").each(function() {
            $(this).removeClass("active");
        });
        $(target).addClass("active");
        $($this).parent("li").addClass("active");
    });
}

const checkItem = item => {
    $(item).toggleClass("checked");
}


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.body = $("body");
    $cache.tabBtns = $(".media-tabs-btns").find("a");
    $cache.tabContent = $(".media-tabs-content").find(".media-tab-content");
    $cache.checkItem = $(document).find(".check-item");
};

/** Initializare evenimente */
const initEvents = () => {
    mediaTabs();
    $cache.checkItem.on("click", e => {
        checkItem(e.currentTarget);
    });
};

/** Call Initialization */
initCache();
initEvents();