<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">

    <?php $this->load->view('front_includes/header');   ?>
    <!--
    <section class="hero-banner">
        <h3>AWARDS</h3>
    </section> -->

    <section class="ptb othePage">
        <div class="container">
            <div class="text-center contact-form">
                <h3>Awards</h3>
            </div>
            <div class="custom-grid">
                <div class="grid-sizer"></div>
                <?php foreach ($award as $ad) : ?>
                    <a href="<?php echo base_url(); ?>uploads/testimonials/<?php echo $ad['pdf']; ?>" target="_blank">
                        <div class="grid-item">
                            <img src="<?php echo base_url(); ?>uploads/testimonials/<?php echo $ad['image']; ?>" />
                            <div class="caption">
                                <div class="blur"></div>
                                <div class="caption-text">
                                    <h6><?php echo $ad['name']; ?></h6>
                                    <p><?php echo $ad['shortinfo']; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>
                <!-- <div class="grid-item">
                    <img src="https://media.licdn.com/dms/image/C5603AQGEuXeUR3ZqwA/profile-displayphoto-shrink_800_800/0/1590150398082?e=2147483647&v=beta&t=W1KFd0VovizMAnCalXLBqLZwc-7ouDLmLs9Uikld42A" />
                    <div class="caption">
                        <div class="blur"></div>
                        <div class="caption-text">
                            <h6>Amazing Caption</h6>
                            <p>Whatever It Is - Always Awesome</p>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="https://media.licdn.com/dms/image/C5603AQGEuXeUR3ZqwA/profile-displayphoto-shrink_800_800/0/1590150398082?e=2147483647&v=beta&t=W1KFd0VovizMAnCalXLBqLZwc-7ouDLmLs9Uikld42A" />
                    <div class="caption">
                        <div class="blur"></div>
                        <div class="caption-text">
                            <h6>Amazing Caption</h6>
                            <p>Whatever It Is - Always Awesome</p>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="https://media.licdn.com/dms/image/C5603AQGEuXeUR3ZqwA/profile-displayphoto-shrink_800_800/0/1590150398082?e=2147483647&v=beta&t=W1KFd0VovizMAnCalXLBqLZwc-7ouDLmLs9Uikld42A" />
                    <div class="caption">
                        <div class="blur"></div>
                        <div class="caption-text">
                            <h6>Amazing Caption</h6>
                            <p>Whatever It Is - Always Awesome</p>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="https://media.licdn.com/dms/image/C5603AQGEuXeUR3ZqwA/profile-displayphoto-shrink_800_800/0/1590150398082?e=2147483647&v=beta&t=W1KFd0VovizMAnCalXLBqLZwc-7ouDLmLs9Uikld42A" />
                    <div class="caption">
                        <div class="blur"></div>
                        <div class="caption-text">
                            <h6>Amazing Caption</h6>
                            <p>Whatever It Is - Always Awesome</p>
                        </div>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="https://media.licdn.com/dms/image/C5603AQGEuXeUR3ZqwA/profile-displayphoto-shrink_800_800/0/1590150398082?e=2147483647&v=beta&t=W1KFd0VovizMAnCalXLBqLZwc-7ouDLmLs9Uikld42A" />
                    <div class="caption">
                        <div class="blur"></div>
                        <div class="caption-text">
                            <h6>Amazing Caption</h6>
                            <p>Whatever It Is - Always Awesome</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <!-- <section class="ptb ar-detail">
        <div class="rl_space">
            <div class="row">
                <div class="col-lg-12 mb-2">
                    <div class="award">
                        <div class="award-2" >
                            <div>
                            <img src="https://www.coventry-homes.com/wp-content/uploads/2022/06/sh.jpg" alt="">
                            </div>
                            <div class="text-dark a-content" style="margin-left: 30px;">
                                <h3 class="mb-3">Digihost</h3>
                                <div class="mb-3">
                                <strong>July 17, 2023</strong>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio sed, doloremque fuga labore molestiae ullam nihil modi, hic autem ut necessitatibus nemo accusamus corporis! Porro veritatis facere incidunt sunt laboriosam?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="award">
                        <div class="award-2" >
                            <div>
                            <img src="https://www.coventry-homes.com/wp-content/uploads/2022/06/sh.jpg" alt="">
                            </div>
                            <div class="text-dark a-content" style="margin-left: 30px;">
                                <h3 class="mb-3">Digihost</h3>
                                <div class="mb-3">
                                <strong>July 17, 2023</strong>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio sed, doloremque fuga labore molestiae ullam nihil modi, hic autem ut necessitatibus nemo accusamus corporis! Porro veritatis facere incidunt sunt laboriosam?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="award">
                        <div class="award-2" >
                            <div>
                            <img src="https://www.coventry-homes.com/wp-content/uploads/2022/06/sh.jpg" alt="">
                            </div>
                            <div class="text-dark a-content" style="margin-left: 30px;">
                                <h3 class="mb-3">Digihost</h3>
                                <div class="mb-3">
                                <strong>July 17, 2023</strong>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio sed, doloremque fuga labore molestiae ullam nihil modi, hic autem ut necessitatibus nemo accusamus corporis! Porro veritatis facere incidunt sunt laboriosam?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="award">
                        <div class="award-2" >
                            <div>
                            <img src="https://www.coventry-homes.com/wp-content/uploads/2022/06/sh.jpg" alt="">
                            </div>
                            <div class="text-dark a-content" style="margin-left: 30px;">
                                <h3 class="mb-3">Digihost</h3>
                                <div class="mb-3">
                                <strong>July 17, 2023</strong>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio sed, doloremque fuga labore molestiae ullam nihil modi, hic autem ut necessitatibus nemo accusamus corporis! Porro veritatis facere incidunt sunt laboriosam?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <?php $this->load->view('front_includes/footer'); ?>

    <?php $this->load->view('front_includes/footer-analytics'); ?>

</body>

</html>