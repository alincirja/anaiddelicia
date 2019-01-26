"use strict";

import $ from "jquery";

export const isMobile = () => {
    let breakpoint = $(".check-view span:visible").attr("data-breakpoint");
    if (breakpoint == "xs" || breakpoint == "sm" || breakpoint == "md") {
        return true;
    } else {
        return false;
    }
};

export const spinner = (elem, action) => {
    if (action === "start") {
        $(elem).addClass("spinning").append("<div class='spinner fa-2x'><i class='fas fa-sync fa-spin'></i></div>");
    } else if (action === "stop") {
        $(elem).removeClass("spinning").find(".spinner").remove();
    }
};
