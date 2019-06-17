"use strict";
import $ from "jquery";
const Chart = require("chart.js");

const stChartCanvas = $("#stChart").length ? $("#stChart") : false;
const stLabels = $(stChartCanvas).attr("data-labels");
const stVals = $(stChartCanvas).attr("data-vals");
if(stChartCanvas) {
    new Chart(stChartCanvas, {
        type: 'pie',
        data: {
            labels: stLabels.split(","),
            datasets: [{
                data: stVals.split(","),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    }); 
}

const ndChartCanvas = $("#ndChart").length ? $("#ndChart") : false;
const ndLabels = $(ndChartCanvas).attr("data-labels");
const ndVals = $(ndChartCanvas).attr("data-vals");
if(ndChartCanvas) {
    new Chart(ndChartCanvas, {
        type: 'pie',
        data: {
            labels: ndLabels.split(","),
            datasets: [{
                data: ndVals.split(","),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    }); 
}