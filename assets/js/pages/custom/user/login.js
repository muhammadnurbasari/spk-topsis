"use strict";

// Class Definition
var KTLoginPage = function () {

	var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="alert alert-bold alert-solid-' + type + ' alert-dismissible" role="alert">\
			<div class="alert-text">'+msg+'</div>\
			<div class="alert-close">\
                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
            </div>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        KTUtil.animateClass(alert[0], 'fadeIn animated');
    }

	// Private Functions
	var handleLoginFormSubmit = function () {
		$('#kt_login_submit').click(function (e) {
			e.preventDefault();

			var btn = $(this);
			var form = $('#kt_login_form');

			form.validate({
				rules: {
					username: {
						required: true,
					},
					password: {
						required: true,
					}
				},
				messages :{
			        username : {
			            required : 'username harus diisi'
			        },
			        password: {
						required: 'password harus diisi',
					}
			    }
			});

			if (!form.valid()) {
				return;
			}

			KTApp.progress(btn[0]);

			setTimeout(function () {
				KTApp.unprogress(btn[0]);
			}, 2000);

			// ajax form submit:  http://jquery.malsup.com/form/
			form.ajaxSubmit({
				url: baseURL+'Welcome/login',
				type : 'post',
				data : { username : $('input[name=username]').val(), password : $('input[name=password]').val()},
				success: function (response, status, xhr, $form) {
					var result = JSON.parse(response);
					if (result.meta.response == 200) {
						location.href = baseURL+"dashboard";
					} else {
						// similate 2s delay
						setTimeout(function () {
							KTApp.unprogress(btn[0]);
							showErrorMsg(form, 'danger', result.meta.msg);
						}, 2000);
					}
				}
			});
		});
	}
	// Public Functions

	return {
		// public functions
		init: function () {
			handleLoginFormSubmit();
		}
	};
}();

// Class Initialization
jQuery(document).ready(function () {
	KTLoginPage.init();
});
