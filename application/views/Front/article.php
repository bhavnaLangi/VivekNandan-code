<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">

<?php $this->load->view('front_includes/header');   ?>

    <!-- <section class="hero-banner">
        <h3>ARTICLES</h3>
    </section> -->

    <section class="ptb ">
        <div class="container">
        <div class="text-center contact-form">
                <h3>Articles</h3>
            </div>
            <div class="row">
                <?php foreach($article as $art):?>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="<?php echo base_url();?>uploads/blog_feature_img/<?php echo $art['featured_image'];?>" alt="">
                        </div>
                        <h5><?php echo $art['title'];?></h5>
                        <a href="<?php echo base_url();?>uploads/pdf/<?php echo $art['main_image'];?>" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>“Architect Of The Year“-2012</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>“Accommodation Times”-2012</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>“Architect Of The Year”-2019</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>Times Property 19th Jan 2013</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>“Architect Of The Year”-2012</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>“Accommodation Times”-2012</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 main-box">
                    <div class="img-box">
                        <div class="img-scel">
                            <img src="assets/images/8846471.jpg" alt="">
                        </div>
                        <h5>“Architect Of The Year”-2019</h5>
                        <a href="assets/images/pdf/dummy.pdf" target="_blank"> <button class="banner_btn banner_btn_2" tabindex="-1">View PDF</button>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <?php $this->load->view('front_includes/footer'); ?>

    <?php $this->load->view('front_includes/footer-analytics'); ?>
</body>

</html>