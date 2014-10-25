/**
 * Created by ezgoing on 9/25/14.
 */

define(function(require){
    'use strict';

    var app = require('app'),
        $ = require('jquery'),
        _ = require('underscore'),
        Backbone = require('backbone'),
        User = require('model:book'),
        template = require('text!account:signup.html');

    return  Backbone.View.extend({
        useNative: true,
        $el: $('.content'),
        template: _.template(template),
        events: {
            'click #btnCreate': 'create',
            'click #btnCancel': 'cancel'
        },
        initialize: function() {
            this.render();
        },
        render: function() {
            var html = this.template();
            this.$el.html(html);

            return this;
        },
        create: function()
        {
            var user = new User({
                email: $('#txtEmail').val(),
                name: $('#txtUsername').val()
            });
            user.save({}, {
                success: function(data, response){
                    alert(response.message);
                }
            });
        },
        destructor: function () {
            console.log('destroy view');
        }
    });
})
