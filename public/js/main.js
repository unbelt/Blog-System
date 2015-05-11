'use strict';

require.config({
    paths: {
        jquery: '../../public/libs/jquery.min',
        bootstrap: '../../public/libs/bootstrap/js/bootstrap.min',
        validator: '../../public/libs/bootstrap-validator.min',
        validations: '../../public/js/validations',
        tinymce: '../../public/libs/tinymce/tinymce.min'
    },
    shim: {
        bootstrap: {
            deps: ['jquery']
        },
        validator: {
            deps: ['jquery', 'bootstrap']
        },
        validations: {
            deps: ['validator']
        }
    },
    deps: [],
    callback: null
});

require(['jquery', 'bootstrap', 'validations', 'tinymce'], function ($) {
    $(document).ready(function () {

        // target _blank to all external links
        $('body a').each(function () {
            if (this.href.indexOf(location.hostname) == -1) {
                $(this).attr('target', '_blank');
            }
        });
    });

    tinymce.init({
        selector: ".editor",
        theme: "modern",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    });
});