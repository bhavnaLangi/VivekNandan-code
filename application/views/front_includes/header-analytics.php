
<head>
<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>template/front_assets/images/favicon.png" />
<!-- <link rel="manifest" href="<?php echo base_url();?>template/front_assets/images/site.webmanifest" /> -->
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="<?php echo base_url();?>template/front_assets/css/bootstrap.min.css"/> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>template/front_assets/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo base_url();?>template/front_assets/css/owl.carousel.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/front_assets/css/main.css?v=<?php echo date('Y-m-d h:m:s');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/front_assets/css/style.css?v=<?php echo date('Y-m-d h:m:s');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/front_assets/css/scroll-down-3.css?v=<?php echo date('Y-m-d h:m:s');?>"/>

    <meta charset="utf-8">
    <?php if ($meta_desc == '') { ?>

<meta name="description" content="Vivek Nandan Architects">

<?php } else { ?>

<meta name="description" content="<?php echo $meta_desc; ?>">

<?php } ?>

<?php if ($meta_title == '') { ?>

<meta name="title" content="Vivek Nandan Architects">

<?php } else { ?>

<meta name="title" content="<?php echo $meta_title; ?>">

<?php } ?>

<?php if ($meta_key == '') { ?>

<meta name="keywords" content="Vivek Nandan Architects">

<?php } else { ?>

<meta name="keywords" content="<?php echo $meta_key; ?>" >

<?php }
if(isset($page)){
    if ($page == 'Project') {

    ?>

    <title><?php echo $meta_title ?> | Project | Vivek Nandan</title>

    <meta property="og:title" content="<?php echo $meta_title; ?>" />

    <meta property="og:url" content="<?php echo $meta_title ?>" />

    <meta property="og:image" content="<?php echo $og_img ?>" />

    <meta property="og:type" content="Offering-details" />

<?php } else { ?>

     <title><?php echo  $meta_title == '' ? $page_name : $meta_title ?> | Vivek Nandan</title>

<?php }

}else{ ?>
     <title><?php echo  $meta_title == '' ? $page_name : $meta_title ?> | Vivek Nandan</title>
<?php }
?>
<meta property="og:keywords" content="Keywords, news">
<meta property="og:title" content="Vivek Nandan">
<meta property="og:description" content="Vivek Nandan">
<meta property="og:author" content="Vivek Nandan">
</head>
<div class="loader">
    <img src="<?php echo base_url();?>template/front_assets/images/loader.gif" alt="">
</div>