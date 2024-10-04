<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="homescroll_down" id="sider_bar">

    <?php $this->load->view('front_includes/header'); ?>

    <?php
    foreach ($p1 as $fe) : ?>
        <section class="hero_banner overflow_banner 1st-slider">
            <div class="banner_fullscreen">
                <a href="<?php echo base_url() ?>project/<?php echo $fe['url']; ?>" class="fixed_banner fixed">
                    <div class="banner_image">
                        <img class="landscape-image img-fluid" alt="Banner" data-sizes="auto" src="<?php echo base_url() ?>uploads/product/<?php echo $fe['image']; ?>" />
                    </div>
                    <div class="banner_content">
                        <h1 class=""><?php echo $fe['name']; ?></h1>
                        <p><?php echo $fe['location']; ?></p>
                        <button class="banner_btn" tabindex="-1">Learn More</button>



                    </div>
                </a>
                <div class="container_mouse">
                    <a href="#section_2" class="mouse-btn">
                        <span class="mouse-scroll">
                            <!-- <img class=" img-fluid" alt="Banner" data-sizes="auto" src="<?php echo base_url() ?>template/front_assets/images/arrow-down.png" /> -->
                            <!-- <i class="fa fa-arrow-down-long"></i> -->
                        </span>
                    </a>
                    <span class="scroll_text">Scroll Down</span>
                </div>
            </div>
        </section>
    <?php
    endforeach; ?>

    <?php
    foreach ($p2 as $fe) : ?>
        <section class="hero_banner overflow_banner " id="section_2">
            <div class="banner_fullscreen">
                <a href="<?php echo base_url() ?>project/<?php echo $fe['url']; ?>" class="fixed_banner fixed">
                    <div class="banner_image">
                        <img class="landscape-image img-fluid" alt="Banner" data-sizes="auto" src="<?php echo base_url() ?>uploads/product/<?php echo $fe['image']; ?>" />
                    </div>
                    <div class="banner_content">
                        <h1 class=""><?php echo $fe['name']; ?></h1>
                        <p><?php echo $fe['location']; ?></p>
                        <button class="banner_btn" tabindex="-1">Learn More</button>
                    </div>
                </a>
                <div class="container_mouse">
                    <a href="#section_3" class="mouse-btn">
                        <span class="mouse-scroll">
                            <!-- <i class="fa fa-arrow-down-long"></i> -->
                        </span>
                    </a>
                    <span class="scroll_text">Scroll Down</span>
                </div>
            </div>
        </section>
    <?php
    endforeach; ?>
    <?php
    foreach ($p3 as $fe) : ?>
        <section class="hero_banner overflow_banner" id="section_3">
            <div class="banner_fullscreen">
                <a href="<?php echo base_url() ?>project/<?php echo $fe['url']; ?>" class="fixed_banner fixed">
                    <div class="banner_image">
                        <img class="landscape-image img-fluid" alt="Banner" data-sizes="auto" src="<?php echo base_url() ?>uploads/product/<?php echo $fe['image']; ?>" />
                    </div>
                    <div class="banner_content">
                        <h1 class=""><?php echo $fe['name']; ?></h1>
                        <p><?php echo $fe['location']; ?></p>
                        <button class="banner_btn" tabindex="-1">Learn More</button>
                    </div>
                </a>
                <div class="container_mouse">
                    <a href="#section_4" class="mouse-btn">
                        <span class="mouse-scroll">
                            <!-- <i class="fa fa-arrow-down-long"></i> -->
                        </span>
                    </a>
                    <span class="scroll_text">Scroll Down</span>
                </div>
            </div>
        </section>
    <?php
    endforeach; ?>
    <?php
    foreach ($p4 as $fe) : ?>
        <section class="hero_banner overflow_banner" id="section_4">
            <div class="banner_fullscreen">
                <a href="<?php echo base_url() ?>project/<?php echo $fe['url']; ?>" class="fixed_banner fixed">
                    <div class="banner_image">
                        <img class="landscape-image img-fluid" alt="Banner" data-sizes="auto" src="<?php echo base_url() ?>uploads/product/<?php echo $fe['image']; ?>" />
                    </div>
                    <div class="banner_content">
                        <h1 class=""><?php echo $fe['name']; ?></h1>
                        <p><?php echo $fe['location']; ?></p>
                        <button class="banner_btn" tabindex="-1">Learn More</button>
                    </div>
                </a>
                <div class="container_mouse">
                    <a href="#section_5" class="mouse-btn">
                        <span class="mouse-scroll">
                            <!-- <i class="fa fa-arrow-down-long"></i> -->
                        </span>
                    </a>
                    <span class="scroll_text">Scroll Down</span>
                </div>
            </div>
        </section>
    <?php
    endforeach; ?>
    <?php
    foreach ($p5 as $fe) : ?>
        <section class="hero_banner overflow_banner" id="section_5">
            <div class="banner_fullscreen">
                <a href="<?php echo base_url() ?>project/<?php echo $fe['url']; ?>" class="fixed_banner fixed">
                    <div class="banner_image">
                        <img class="landscape-image img-fluid" alt="Banner" data-sizes="auto" src="<?php echo base_url() ?>uploads/product/<?php echo $fe['image']; ?>" />
                    </div>
                    <div class="banner_content">
                        <h1 class=""><?php echo $fe['name']; ?></h1>
                        <p><?php echo $fe['location']; ?></p>
                        <button class="banner_btn" tabindex="-1">Learn More</button>
                    </div>
                </a>
                <div class="container_mouse">
                    <a href="#section_6" class="mouse-btn">
                        <span class="mouse-scroll">
                            <!-- <i class="fa fa-arrow-down-long"></i> -->
                        </span>
                    </a>
                    <span class="scroll_text">Scroll Down</span>
                </div>
            </div>
        </section>
    <?php
    endforeach; ?>
    <section class="hero_content mobile_navigation" id="section_6">
        <div class="banner_fullscreen">
            <div class="fixed_banner fixed">
                <div class="banner_content">
                    <p class="balance-text">As an Architectural firm we have the ability to develop ambitious and innovative architectural design solutions.</p>

                    <p class="balance-text"> It is our aim “to create architecture that is conceptual, enduring and modernistic” - to explore originality – an innovative, intuitive response -  resulting in an unique & topical yet practical design every time – an Architecture that is flamboyant & exuberant - an icon to look up to. </p>

                    <p class="balance-text">With some of the leading consultants at our side we are able to translate these concepts into reality.</p>

                    <div class="container_mouse align_right">
                        <a href="#projects_list" class="mouse-btn">
                            <span class="mouse-scroll">
                                <!-- <i class="fa fa-arrow-down-long"></i> -->
                            </span>
                        </a>
                        <!-- <span class="scroll_text">Scroll Down</span> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero_projects " id="projects_list">
        <div class="projects_list">
            <?php foreach ($projects as $pr) : ?>
                <div class="projects_grid ">
                    <div class="project_image">
                        <img class="image  img-fluid" alt="Project Image" data-sizes="auto" src="<?php echo base_url() ?>uploads/product/<?php echo $pr['featured_image']; ?>" />
                    </div>
                    <div class="project_text">
                        <a href="<?php echo base_url() ?>project/<?php echo $pr['url']; ?>">
                            <h3 class="project_title"><?php echo $pr['name']; ?></h3>
                            <h5><?php echo $pr['location']; ?></h5>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
    <!-- <a id="back-to-top" href="#" class="show">
        <i class="fa fa-arrow-up-long"></i>
    </a> -->
    <?php $this->load->view('front_includes/footer'); ?>
    <?php $this->load->view('front_includes/footer-analytics'); ?>

</body>

</html>