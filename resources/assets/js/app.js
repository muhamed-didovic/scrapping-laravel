
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {
    let $from = $("#from");
    let $to = $("#to");

    if ($from.length > 0) {
        $from.datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });
    }

    if ($to.length > 0) {
        $to.datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });
    }
});



