<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/locomotive-scroll.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <title>Hello, world!</title>
    </head>
    <body>
        <section class="c-section -fixed" data-scroll-section data-persistent>
            <div class="o-container" id="fixed-elements">
                <div class="o-layout">
                    <div class="o-layout_item u-2/5@from-medium">
                        <div class="c-section_infos -padding" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                            <div class="c-section_infos_inner" data-scroll data-scroll-offset="200">
                                <h3>
                                    04. <br>
                                    Fixed elements
                                </h3>
                                <div class="c-sections_infos_text u-text">
                                    <p>
                                        Create slides that stick and untick to the viewport while scrolling through.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="o-layout_item u-3/5@from-medium">
                        <div class="c-fixed_wrapper" data-scroll data-scroll-call="dynamicBackground" data-scroll-repeat>
                            <div class="c-fixed_target" id="fixed-target"></div>
                            <div class="c-fixed" data-scroll data-scroll-sticky data-scroll-target="#fixed-target" style="background-image:url('assets/images/slider-1.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/js/locomotive-scroll.js"></script>
        <script src="assets/js/main.js"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>