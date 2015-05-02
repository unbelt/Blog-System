'use strict';

require.config({
    paths: {
        jquery: '../../public/libs/jquery/jquery.min',
        bootstrap: '../../public/libs/bootstrap/js/bootstrap.min'
    },
    shim: {
        bootstrap: {
            deps: ['jquery']
        }
    },
    deps: [],
    callback: null
});

require(['bootstrap'], function ($) {
        if($) {
            console.log('JQ');
        }
    }
);