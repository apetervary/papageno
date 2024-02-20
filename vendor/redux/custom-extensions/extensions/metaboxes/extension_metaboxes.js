

/**
 * Redux Metaboxes
 * Dependencies      : jquery
 * Created by        : Dovy Paukstys
 * Date              : 19 Feb. 2014
 */

/* global reduxMetaboxes, redux */

jQuery(function($){

    "use strict";
    $('#publishing-action .button, #save-action .button').click(function() {
        window.onbeforeunload = null;
    });

});