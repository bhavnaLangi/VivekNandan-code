<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" lang="en">

<?php $this->load->view('front_includes/header-analytics'); ?>

<body class="scroll_down">

   <?php $this->load->view('front_includes/header');   ?>

<!-- <section class="hero-banner">
        <h3>PROJECT</h3>
</section> -->

    <section class="hero_projects ptb">
    <div class="text-center contact-form">
                <h3><?php echo $this->common->cat_name2($this->uri->segment('2'),'url','subcategory','tbl_subcategory'); ?> Projects</h3>
            </div>
            <?php if(!empty($search_project)){ ?>
            <div class="projects_list">
             <?php 
                
                foreach($search_project as $pr): ?>
                <div class="projects_grid">
                    <div class="project_image">
                        <img class="image  img-fluid" alt="Project Image" data-sizes="auto" src="<?php echo base_url()?>uploads/product/<?php echo $pr['image'];?>" />
                    </div>
                    <div class="project_text">
                        <a href="<?php echo base_url();?>projects/<?php echo $pr['url'];?>">
                            <h3 class="project_title"><?php echo $pr['subcategory'];?></h3>
                            <!-- <h5><?php //echo $pr['location'];?></h5> -->
                        </a>
                    </div>
                    
                </div>
                <?php endforeach; ?>
               
               
            </div>
            <?php }else{ ?>
                    <h4 class="text-dark text-center">No Records Found</h4>
              <?php   }?>
    </section>

    <?php $this->load->view('front_includes/footer'); ?>
    <?php  $this->load->view('front_includes/footer-analytics'); ?>

</body>

</html>