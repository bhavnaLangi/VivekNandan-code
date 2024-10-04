<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">

    <?php $this->load->view('front_includes/header');   ?>

    <!-- <section class="hero-banner">
        <h3>ARTICLES</h3>
    </section> -->

    <section class="ptb media">
        <div class="container">
            <div class="text-center contact-form">
                <h3>Media</h3>
            </div>
            <div class="row gy-5">
                <?php foreach($medialist as $ml):?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="<?php echo base_url(); ?>uploads/team/<?php echo $ml['fb']; ?>" target="_blank">
                        <div class="media-card">
                            <div class="box">
                                <img src="<?php echo base_url(); ?>uploads/team/<?php echo $ml['featured_image']; ?>" alt="">
                            </div>
                            <div class="content">
                                <h3><?php echo  $ml['name']; ?></h3>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php  endforeach; ?>

               <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="template/front_assets/images/pdf/dummy.pdf" target="_blank">
                        <div class="media-card">
                            <div class="box">
                                <img src="template/front_assets/images/1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>The Times of India</h3>
                            </div>
                        </div>
                        </a>
                    </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="template/front_assets/images/pdf/dummy.pdf" target="_blank">
                        <div class="media-card">
                            <div class="box">
                                <img src="template/front_assets/images/1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>The Times of India</h3>
                            </div>
                        </div>
                        </a>
                    </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="template/front_assets/images/pdf/dummy.pdf" target="_blank">
                        <div class="media-card">
                            <div class="box">
                                <img src="template/front_assets/images/1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>The Times of India</h3>
                            </div>
                        </div>
                        </a>
                    </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="template/front_assets/images/pdf/dummy.pdf" target="_blank">
                        <div class="media-card">
                            <div class="box">
                                <img src="template/front_assets/images/1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>The Times of India</h3>
                            </div>
                        </div>
                        </a>
                    </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="template/front_assets/images/pdf/dummy.pdf" target="_blank">
                        <div class="media-card">
                            <div class="box">
                                <img src="template/front_assets/images/1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>The Times of India</h3>
                            </div>
                        </div>
                    </a>
                </div>-->
            </div>
        </div>
    </section>


    <?php $this->load->view('front_includes/footer'); ?>

    <?php $this->load->view('front_includes/footer-analytics'); ?>
</body>

</html>