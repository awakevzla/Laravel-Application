/*
 *  Document   : base_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function(){
        jQuery('.js-validation-bootstrap').validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'farm-name': {
                    required: true,
                    minlength: 3
                },
                'farm-subdomain': {
                    required: true,
                    minlength: 3
                },
                'farm-phone': {
                    required: true,
                    minlength: 9
                },
                'farm-email': {
                    required: true,
                    email: true
                },
                'address-country': {
                    required: true,
                    minlength: 5,
                    regex: "^[a-zA-Z]{1,40}$"
                },
                'address-state': {
                    required: true,
                    minlength: 3
                },
                'address-city': {
                    required: true,
                    minlength: 3
                },
                'address-postal': {
                    required: true,
                    postalcode: true
                },
                'address-street-number': {
                    required: true,
                    minlength: 1,
                    number: true
                },
                'address-street-name': {
                    required: true,
                    range: [1, 5]
                },
                'user-first-name': {
                    required: true,
                    minlength: 3
                },
                'user-last-name': {
                    required: true,
                    minlength: 3
                },
                'user-username': {
                    required: true,
                    minlength: 3
                },
                'user-email': {
                    required: true,
                    email: true
                },
                'user-password': {
                    required: true,
                    minlength: 3
                },
                'user-confirm-password': {
                    required: true,
                    minlength: 3,
                    equalTo: true
                }

            },
            messages: {
                'vuser-username': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'user-email': 'Please enter a valid email address',
                'user-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                'user-confirm-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'val-terms2': 'You must agree to the service terms!'
            }
        });
    };

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );

    $.validator.addMethod('postalcode', function (value) {
        return /^((\d{5}-\d{4})|(\d{5})|([A-Z]\d[A-Z]\s\d[A-Z]\d))$/.test(value);
    }, 'Please enter a valid US or Canadian postal code.');

    // Init Material Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationMaterial = function(){
        jQuery('.js-validation-material').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'farm[name]': {
                    required: true,
                    minlength: 3
                },
                'farm-subdomain': {
                    required: true,
                    minlength: 3
                },
                'farm-phone': {
                    required: true,
                    minlength: 9
                },
                'farm-email': {
                    required: true,
                    email: true
                },
                'address-country': {
                    required: true,
                    minlength: 5,
                    //regex: "^[a-zA-Z]{1,40}$"
                },
                'address-state': {
                    required: true,
                    minlength: 3
                },
                'address-city': {
                    required: true,
                    minlength: 3
                },
                'address-postal': {
                    required: true,
                    //postalcode: true
                },
                'address-street-number': {
                    required: true,
                    minlength: 1,
                    number: true
                },
                'address-street-name': {
                    required: true,
                    minlength: 3
                },
                'user-first-name': {
                    required: true,
                    minlength: 3
                },
                'user-last-name': {
                    required: true,
                    minlength: 3
                },
                'user-username': {
                    required: true,
                    minlength: 3
                },
                'user-email': {
                    required: true,
                    email: true
                },
                'user-password': {
                    required: true,
                    minlength: 3
                },
                'user-confirm-password': {
                    required: true,
                    minlength: 3,
                    equalTo: true
                }
            },
            messages: {
                'user-username': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'user-email': 'Please enter a valid email address',
                'user-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                'user-confirm-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'val-terms2': 'You must agree to the service terms!'
            }
        });
    };

    return {
        init: function () {
            // Init Bootstrap Forms Validation
            //initValidationBootstrap();

            // Init Meterial Forms Validation
            initValidationMaterial();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormValidation.init(); });