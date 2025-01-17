$('.edit-profile').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-profile",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#edit-profile-btn').html('Processing...');
            $("#edit-profile-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }
                if (data.contact_error != '') {
                    $('#contact_error').html(data.contact_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#contact_error').html('');
                }
                if (data.email_error != '') {
                    $('#email_error').html(data.email_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#email_error').html('');
                }

                $('#edit-profile-btn').html('Update');
                $("#edit-profile-btn").attr("disabled", false);

            }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();


                    }

                })






            }
        }
    });
});

$('.feset-password').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "feset-password",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#reset-btn').html('Processing...');
            $("#reset-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error == 'true1') {
                if (data.current_password_error != '') {
                    $('#current_password_error').html(data.current_password_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#current_password_error').html('');
                }
                if (data.new_password_error != '') {
                    $('#new_password_error').html(data.new_password_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#new_password_error').html('');
                }
                if (data.confirm_password_error != '') {
                    $('#confirm_password_error').html(data.confirm_password_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#confirm_password_error').html('');
                }

                $('#reset-btn').html('Update');
                $("#reset-btn").attr("disabled", false);

            }
            if (data.error == false) {

                $.toast({
                    heading: 'Success',
                    text: data.msg,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {

                        window.location.reload();


                    }

                })



            }
            if (data.error == true) {
                $.toast({
                    heading: 'Error',
                    text: data.msg,
                    icon: 'error',
                    loader: true,
                    position: 'top-right',
                   afterHidden: function () {

                        window.location.reload();


                    }

                })



            }
        }
    });
});

$('.change-password').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "change-pass",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#reset1-btn').html('Processing...');
            $("#reset1-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error == 'true') {
                if (data.current_password1_error != '') {
                    $('#current_password1_error').html(data.current_password1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#current_password1_error').html('');
                }
                if (data.new_password1_error != '') {
                    $('#new_password1_error').html(data.new_password1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#new_password1_error').html('');
                }
                if (data.confirm_password1_error != '') {
                    $('#confirm_password1_error').html(data.confirm_password1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#confirm_password1_error').html('');
                }

                $('#reset1-btn').html('Update');
                $("#reset1-btn").attr("disabled", false);

            }
            if (data.error == false) {
                $.toast({
                    heading: 'Success',
                    text: data.msg,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        $('#edit-profile-btn').html('Update');
                        $("#edit-profile-btn").attr("disabled", false);
                        window.location.reload();


                    }

                })


            }
            if (data.error == true) {
                $.toast({
                    heading: 'Error',
                    text: data.msg,
                    icon: 'error',
                    loader: true,
                    position: 'top-right',

                })


            }
        }
    });
});






$(document).ready(function () {
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });
});



$('.add-user').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "insert-user",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#add-btn').html('Processing...');
            $("#add-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                if (data.name_error != '') {
                    $('#name_error').html(data.name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name_error').html('');
                }

                if (data.email_error != '') {
                    $('#email_error').html(data.email_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#email_error').html('');
                }

                if (data.contactno_error != '') {
                    $('#contactno_error').html(data.contactno_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#contactno_error').html('');
                }

                if (data.password_error != '') {
                    $('.password_error').html(data.password_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#password_error').html('');
                }


                if (data.address_error != '') {
                    $('#address_error').html(data.address_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#address_error').html('');
                }

                if (data.country_error != '') {
                    $('#country_error').html(data.country_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#country_error').html('');
                }

                if (data.state_error != '') {
                    $('#state_error').html(data.state_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#state_error').html('');
                }

                if (data.city_error != '') {
                    $('.city_error').html(data.city_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#city_error').html('');
                }

                if (data.pcode_error != '') {
                    $('.pcode_error').html(data.pcode_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#pcode_error').html('');
                }

                if (data.company_name_error != '') {
                    $('.company_name_error').html(data.company_name_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#company_name_error').html('');
                }


                if (data.gst_error != '') {
                    $('.gst_error').html(data.gst_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#gst_error').html('');
                }

                $('#add-btn').html('Add');
                $("#add-btn").attr("disabled", false);
            }

            if (data.error) {
                $.toast({
                    heading: 'Success',
                    text: data.msg,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {

                        window.location.reload();


                    }

                })


            }

        }
    });
});

$('.edit-setting').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "edit-setting",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#edit-setting-btn').html('Processing...');
            $("#edit-setting-btn").attr("disabled", true);
        },
        success: function (data) {
            console.log(data);
            var data = jQuery.parseJSON(data);
            if (data.error) {
                $.toast({
                    heading: 'Warning',
                    text: data.error,
                    icon: 'warning',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();


                    }

                })

                $('#edit-setting-btn').html('Update');
                $("#edit-setting-btn").attr("disabled", false);

            }
            if (data.success) {
                $.toast({
                    heading: 'Success',
                    text: data.success,
                    icon: 'success',
                    loader: true,
                    position: 'top-right',
                    afterHidden: function () {
                        window.location.reload();


                    }

                })






            }
           
        }
    });
});
