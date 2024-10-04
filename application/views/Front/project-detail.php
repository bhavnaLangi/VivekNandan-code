<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down p_detail">

<?php $this->load->view('front_includes/header');?>
<section class="hero_content listing_content project_detailContent mobile_navigation" id="project_detailContent">
    <div class="banner_fullscreen">
        <div class="fixed_banner fixed">
            <div class="banner_content listing_banner">
                <div class="owl-carousel owl-theme ">
                    <?php foreach($images as $img):?>
                    <div class="item">
                        <img alt="Banner" src="<?php echo base_url();?>uploads/product/<?php echo $img['image'];?>" />
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="hero_content listing_content project_detailContent mobile_navigation banner_fullscreen">
    <div class="full-screen">
        <div class="owl-carousel owl-theme ">
            <?php foreach($images as $img):?>
            <div class="item">
                <img alt="Banner" src="<?php echo base_url();?>uploads/product/<?php echo $img['image'];?>" />
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> -->
<div class="sticky_description">
    <a href="#project_detail" class="project_title upper_top">Description</a>
    <a href="#project_detailContent" class="project_title lower_top">Description</a>
</div>
<?php foreach($project_details as $pd): ?>
    <section class="bg-lightt p-detail d-flex" id="project_detail">

        <div class="rl_space dtp">

            <h6 class="mb-4">PROJECTS - <?php echo $pd['name'];?></h6>

            <div class="detail-page">
                <h5><strong>Location</strong> - <?php echo $pd['location'];?></h5>
                <h5><strong>Client</strong> - <?php echo $pd['client'];?></h5>
            </div>
            <div class="detail-page mb-4">
                <h5><strong>Area</strong> - <?php echo $pd['area'];?></h5>
                <h5><strong>Construction Cost</strong> - <?php echo $pd['concost'];?></h5>
            </div>
            <?php echo $pd['description'];?>
            <!-- <p class="mb-2">A Re-Development project in a MHADA layout at Magathane. The scheme has been designed as a premium Residential project in this residential neighbourhood of Magathane at Borivili. The design scheme has 2 towers of 22 storeys high (70 M) having 6 flats per flr.</p>
            <p class="mb-2">- well-designed, cross-ventilated airy flats with good natural light and ventilation. The scheme has 1,1.5, & 2 BHK flats.Multi-Level Podium parking takes care of the parking needs with a Garden on the Podium top. Clubhouse, Pergola covered Recreation area, Children’s play area etc. form part of the amenities.</p>
            <p class="mb-2">A Re-Development project in a MHADA layout at Magathane. The scheme has been designed as a premium Residential project in this residential neighbourhood of Magathane at Borivili. The design scheme has 2 towers of 22 storeys high (70 M) having 6 flats per flr.</p>
            <p class="mb-2">- well-designed, cross-ventilated airy flats with good natural light and ventilation. The scheme has 1,1.5, & 2 BHK flats.Multi-Level Podium parking takes care of the parking needs with a Garden on the Podium top. Clubhouse, Pergola covered Recreation area, Children’s play area etc. form part of the amenities.</p>
            <p class="mb-2">A Re-Development project in a MHADA layout at Magathane. The scheme has been designed as a premium Residential project in this residential neighbourhood of Magathane at Borivili. The design scheme has 2 towers of 22 storeys high (70 M) having 6 flats per flr.</p>
            <p class="mb-2">- well-designed, cross-ventilated airy flats with good natural light and ventilation. The scheme has 1,1.5, & 2 BHK flats.Multi-Level Podium parking takes care of the parking needs with a Garden on the Podium top. Clubhouse, Pergola covered Recreation area, Children’s play area etc. form part of the amenities.</p>
             -->
        </div>
    </section>
<?php endforeach; ?>
    <?php $this->load->view('front_includes/footer'); ?>
    <?php  $this->load->view('front_includes/footer-analytics'); ?>
</body>

</html>