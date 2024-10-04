<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">
    <div class="contentTop_wrapp">

    <?php $this->load->view('front_includes/header');   ?>

        <section class="ptb othePage d-flex align-items-center">
            <div class="rl_space">
                <div class="text-center contact-form">
                    <h3>Contact</h3>
                </div>
                <form method="POST" id="contact-form">
                <div class="row">
                    <div class="col-lg-6">

                            <div class="form-floating mb-4">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
                                <label for="floatingInput">Name *</label>
                                <div id="name_error" class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="mail" name="email"  class="form-control" id="floatingPassword" placeholder="Email">
                                <label for="floatingPassword">Email *</label>
                                <div id="email_error" class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating">
                                <input type="tel" name="mobile" class="form-control" id="floatingPassword" placeholder="Phone">
                                <label for="floatingPassword">Phone *</label>
                                <div id="mobile_error" class="invalid-feedback"></div>
                            </div>
                            <select name="subject" id="subject" class="form-select mb-4 mt-4" aria-label="Default select example">
                                <option selected value="">Select Subject *</option>
                                <option value="New Business Inquiries">New Business Inquiries</option>
                                <option value="New Proposal Inquiries">New Proposal Inquiries</option>
                                <option value="Press Inquiries">Press Inquiries </option>
                                <option value="Vendor Inquiries">Vendor Inquiries</option>

                                <option value="Others">Others</option>
                            </select>
                            <div id="subject_error" class="invalid-feedback" style="margin-top: -18px; margin-bottom: 10px;"></div>
                            <div class="form-floating" id="ot">
                                <input type="text" name="others" class="form-control ohr" id="floatingPassword" placeholder="Phone">
                                <label for="floatingPassword">Others *</label>
                                <div id="others_error" class="invalid-feedback"></div>
                            </div>
                        <input type="hidden" name="whereis" value="contact">
                    </div>
                    <div class="col-lg-6 list">

                        <div class="form-floating mb-4">
                            <textarea class="form-control" placeholder="Leave a comment here" name="message" id="floatingTextarea2"></textarea>
                            <label for="floatingTextarea2">Message *</label>
                        </div>

                        <button class="banner_btn banner_btn_2" tabindex="-1">Send</button>

                    </div>

                    <!-- <div class="col-lg-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.6396602098853!2d72.88825117433508!3d19.123457650482653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c94ee7c29e23%3A0xddcab1d14ebddb3e!2sVIVEK%20NANDAN%20ARCHITECTS!5e0!3m2!1sen!2sin!4v1698731579770!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div> -->
                </div>
                </form>
            </div>

        </section>
    </div>

  <?php $this->load->view('front_includes/footer'); ?>

  <?php $this->load->view('front_includes/footer-analytics'); ?>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
<script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>

    $('#ot').hide();

    $('#subject').on('change',function(){

            if($(this).find(':selected').val()=='Others'){
                $('#ot').show();
            }else{
                $('#ot').hide();
            }

    })


 $('#contact-form').on('submit', function (event) {

    event.preventDefault();
    debugger;
    if($('#subject').find(':selected').val()=='Others'){
        if($('.ohr').val()==''){
            $('#others_error').html('This Field is Required');
            $(".invalid-feedback").css("display", "block");
        }else{

         $.ajax({

                url: '<?php echo base_url();?>contact-form',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

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
                        if (data.subject_error != '') {
                            $('#subject_error').html(data.subject_error);
                            $(".invalid-feedback").css("display", "block");
                        } else {
                            $('#subject_error').html('');
                        }


                        if (data.mobile_error != '') {
                            $('#mobile_error').html(data.mobile_error);
                            $(".invalid-feedback").css("display", "block");
                        } else {
                            $('#mobile_error').html('');
                        }


                        $('.banner_btn_2').html('Send');
                        $(".banner_btn_2").attr("disabled", false);
                    }
                    if (data.success) {

                            window.location.href="<?php echo base_url();?>thank-you/contact";




                    }
                }
            });

         }
         $('#others_error').html('');
      }else{
        $.ajax({

url: '<?php echo base_url();?>contact-form',
method: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
beforeSend: function () {

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
        if (data.subject_error != '') {
            $('#subject_error').html(data.subject_error);
            $(".invalid-feedback").css("display", "block");
        } else {
            $('#subject_error').html('');
        }


        if (data.mobile_error != '') {
            $('#mobile_error').html(data.mobile_error);
            $(".invalid-feedback").css("display", "block");
        } else {
            $('#mobile_error').html('');
        }


        $('.banner_btn_2').html('Send');
        $(".banner_btn_2").attr("disabled", false);
    }
    if (data.success) {

            window.location.href="<?php echo base_url();?>thank-you/contact";




    }
}
});
      }

});


</script>