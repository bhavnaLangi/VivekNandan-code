<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">

<?php $this->load->view('front_includes/header');   ?>
<!--
    <section class="hero-banner">
        <h3>CAREER</h3>
    </section> -->

    <section class="ptb othePage d-flex align-items-center">
        <div class="rl_space">
        <div class="text-center contact-form">
                <h3>Career</h3>
            </div>
        <form id="career-form" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-lg-6 form-floating form-floating-2 mb-4">
                    <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="Name">
                    <label for="floatingInput">First Name *</label>
                    <div id="name_error" class="invalid-feedback"></div>
                </div>
                <div class="col-lg-6 form-floating form-floating-2 mb-4">
                    <input type="text"name="lname"  class="form-control" id="floatingInput" placeholder="Name">
                    <label for="floatingInput">Last Name *</label>
                    <div id="name1_error" class="invalid-feedback"></div>
                </div>
                <div class="col-lg-6 form-floating form-floating-2 mb-4">
                    <input type="mail" name="email" class="form-control" id="floatingPassword" placeholder="Email">
                    <label for="floatingPassword">Email *</label>
                    <div id="email_error" class="invalid-feedback"></div>
                </div>
                <div class="col-lg-6 form-floating form-floating-2">
                    <input type="tel" name="mobile" class="form-control" id="floatingPassword" placeholder="Phone">
                    <label for="floatingPassword">Phone *</label>
                    <div id="mobile_error" class="invalid-feedback"></div>
                </div>
                <input type="hidden" name="whereis" value="career">

                <div class="col-lg-12 form-floating form-floating-2 mb-4">
                    <p>Attach Resume *</p>
                    <input type="file" name="file" id="" accept="application/pdf">
                    <div id="file_error" class="invalid-feedback"></div>
                </div>

                <div class="col-lg-12 form-floating form-floating-2 a-btn">
                    <button type="submit" class="banner_btn" tabindex="-1">Apply Now</button>
                </div>

            </div>
        </form>
        </div>



    </section>

    <?php $this->load->view('front_includes/footer'); ?>

    	<?php  $this->load->view('front_includes/footer-analytics'); ?>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
        <script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="  https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
 $('#career-form').on('submit', function (event) {

    event.preventDefault();
    $.ajax({

        url: '<?php echo base_url();?>career-form',
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

                if (data.name1_error != '') {
                    $('#name1_error').html(data.name1_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#name1_error').html('');
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
                if (data.file_error != '') {
                    $('#file_error').html(data.file_error);
                    $(".invalid-feedback").css("display", "block");
                } else {
                    $('#file_error').html('');
                }

                $('.banner_btn').html('Apply Now');
                $(".banner_btn").attr("disabled", false);
            }
            if (data.success) {

                    window.location.href="<?php echo base_url();?>thank-you/career";




            }
        }
    });
});
</script>