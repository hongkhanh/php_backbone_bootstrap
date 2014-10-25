/**
 * Created by khanhnh on 25/09/2014.
 */

// config curl
curl.config({
    baseUrl: '',
    paths: {
        // libs
        jquery: 'libs/jquery',
        underscore: 'libs/underscore',
        backbone: {
            location: 'libs/backbone.js',
            exports: 'Backbone',
            requires: ['jquery', 'underscore']
        },
        // app
        app: 'app/app',
        routes: 'app/routes',
        comm: 'app/comm',

        // views

        'account:add': 'views/account/account_add',

        // models
        'model:user': 'models/user',

        // collection
        'collection:book': 'collections/book',

        // templates
        'account:signup.html': 'templates/account/signup.html'
    },
    pluginPath: 'libs/curl/plugin'
});

// Kick off the application.
curl(['app', 'routes'], function(app, Route) {
    'use strict';

    app.routes = new Route();
    Backbone.history.start({pushState: false, root: ''});
});
