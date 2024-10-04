<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">
<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">
<?php $this->load->view('front_includes/header'); ?>
    <section class="thank-you ptb othePage d-flex align-items-center">
        <div class="rl_space">
            <span class="icon_page">
                <i class="fa-solid fa-check"></i>
            </span>
            <h6>Thank You</h6>
            <?php if($get=='career'){ ?>
               <p class="mb-2">We have received your application, we will get back to you shortly.</p>
            <?php }else{ ?>
                <p class="mb-2">We appreciate you contacting us. One of our representative will be in touch with you soon! <br> Have a great day!</p>

                <?php } ?>
            <a href="<?php echo base_url();?>" class="banner_btn">Back To Home</a>
        </div>
    </section>
    <?php $this->load->view('front_includes/footer'); ?>
    <?php   $this->load->view('front_includes/footer-analytics'); ?>
</body>
</html>