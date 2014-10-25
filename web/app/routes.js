/**
 * Created by khanhnh on 25/09/2014.
 */

define(function(require) {
    'use strict';

    var Backbone = require('backbone'),
        SignUp = require('account:signup');

    return Backbone.Router.extend({
        routes: {
            '': 'index'
        },
        index: function() {
            new SignUp();
        }
    });
});