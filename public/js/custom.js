jQuery(document).ready( function() {
    jQuery('.setStatus').on('click', function(){
        var id = jQuery(this).attr('id');
        var href = jQuery(this).attr('data-href');
        var is_active= jQuery(this).attr('rel');
        var setUrl = href + id + '/'+ is_active;
        jQuery.ajax({
            type: "GET",
            url: setUrl,
            success: function(data) {
                if( data == 0 ) {
                    jQuery('#' + id).removeClass('bgm-lightgreen').addClass('btn-danger').attr('rel', '0');
                    jQuery('#icon-' + id).removeClass('md-check').addClass('md-close');
                } else {
                    jQuery('#' + id).removeClass('btn-danger').addClass('bgm-lightgreen').attr('rel', '1');
                    jQuery('#icon-' + id).removeClass('md-close').addClass('md-check');
                }
            }
        });
    });
    jQuery.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-z \s]+$/i.test(value);
    }, "Please enter only Alphabet.");
    jQuery.validator.addMethod("positiveNumber", function(value, element) {
        return this.optional(element) || /^\+?[0-9]+$/i.test(value);
    }, "Enter a positive integer number.");
    jQuery.validator.addMethod("specialPassword", function(value, element) {
        return this.optional(element) || /^(?=(.*[a-z]){1})(?=(.*[A-Z]){1})(?=(.*[0-9]){1})(?=(.*[\$\@\#]){1}).{4,}$/.test(value);
    }, "One lowercase letter, one capital letter, one number and one of the characters (#@$).");
    jQuery.validator.addMethod("charunderscore", function(value, element) {
        return this.optional(element) || /^[a-zA-Z_]+$/i.test(value);
    }, "Letters and underscores only please");
    jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9_ ]+$/i.test(value);
    }, "Letters, numbers, underscores and spaces only please");
    jQuery('form').each(function() {
        jQuery(this).validate({
            errorClass:'text-danger'
        });
    });

});