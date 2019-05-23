"use strict";

import $ from "jquery";
import * as util from "./utils";

const $cache = {};

const toggleStandardAppetizer = e => {
    const $this = $(e.currentTarget);
    if ($this.val() === "yes") {
        $cache.standardAppetizerContainer.addClass("d-none");
        $cache.preferentialAppetizerContainer.removeClass("d-none");

    } else {
        $cache.standardAppetizerContainer.removeClass("d-none");
        $cache.preferentialAppetizerContainer.addClass("d-none");
    }
}

const getDishByCategory = e => {
    const $this = $(e.currentTarget);
    const data = {
        "action": "getRecipesByCategory",
        "category": $this.val()
    }
    util.spinner($cache.orderForm, "start");

    $.ajax({
        url: "inc/scripts/order/get-recipes-by-category.php",
        type: "POST",
        data: data,
        success: res => {
            $cache.dish.html(res);
            util.spinner($cache.orderForm, "stop");
        },
        error: err => {
            console.log(err);
            util.spinner($cache.orderForm, "stop");
        }
    });
}

const addOrder = e => { 
    e.preventDefault();
    const $form = $cache.orderForm;
    util.spinner($form, "start");
    $form.find(".alert").remove();
    $.ajax({
        url: "inc/scripts/order/place-order.php",
        type: "POST",
        data: $form.serialize() + "&action=placeOrder",
        success: res => {
            const jsonData = JSON.parse(res);
            $form.append('<div class="mt-3 alert alert-' + jsonData.type + '">' + jsonData.msg + '</div>');
            util.spinner($form, "stop");
        },
        error: err => {
            console.log(err);
            util.spinner($form, "stop");
        }
    })
}


/** Initializare cache - salvare elemente DOM */
const initCache = () => {
    $cache.orderForm = $("#orderForm");
    $cache.appetizerRadio = $cache.orderForm.find("[name=appetizerType]");
    $cache.standardAppetizerContainer = $cache.orderForm.find("#standardAppetizerContainer");
    $cache.preferentialAppetizerContainer = $cache.orderForm.find("#preferentialAppetizerContainer");
    $cache.f2CategoryField = $cache.orderForm.find("#category");
    $cache.dish = $cache.orderForm.find("#dish");
};

/** Initializare evenimente */
const initEvents = () => {
    $cache.appetizerRadio.on("change", toggleStandardAppetizer);
    $cache.f2CategoryField.on("change", getDishByCategory);
    $cache.orderForm.on("submit", addOrder);
};

/** Call Initialization */
initCache();
initEvents();