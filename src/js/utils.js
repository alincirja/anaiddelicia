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

export const log = mes => {
    console.log(mes);
}
