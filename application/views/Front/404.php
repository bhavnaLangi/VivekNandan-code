<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">
<?php $this->load->view('front_includes/header-analytics'); ?>
<body class="scroll_down">
<?php $this->load->view('front_includes/header'); ?>
    <section class="thank-you error_page ptb othePage d-flex align-items-center">
        <div class="rl_space">
            <span class="icon_page">
                <i class="fa-solid fa-xmark"></i>
            </span>
            <h6>404</h6>
            <p class="mb-2">We've received your message. Our team will contact you soon.</p>
            <a href="<?php echo base_url();?>" class="banner_btn">Back To Home</a>
        </div>
    </section>

    <?php $this->load->view('front_includes/footer'); ?>
    <?php   $this->load->view('front_includes/footer-analytics'); ?>
</body>
</html>