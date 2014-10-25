/**
 * Created by khanhnh on 25/09/2014.
 */

define(function(require) {
    'use strict';

    var Backbone = require('backbone'),
        ListView = require('book:list');

    return Backbone.Router.extend({
        routes: {
            '': 'index'
        },
        index: function() {
            new ListView();
        }
    });
});