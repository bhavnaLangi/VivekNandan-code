

<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header">  Edit Articles & Media
                    </h5>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                <div class="form_error">
                                    <?php echo validation_errors(); ?>
                                </div>
                            </div>
                        <?php } elseif($this->session->flashdata('warning')){ ?> 
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('warning'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                <div class="form_error">
                                    <?php echo validation_errors(); ?>
                                </div>
                            </div>
                        <?php }?> 
                        <form id="myform2"  action="<?php echo base_url(); ?>editblogupdate" method="post"  enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Article Title</label>

                                        <input type="text" name="blogtitle" value="<?php echo $value['title']; ?>"   class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Featured Image</label>
                                        <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension 850*650 px</span>

                                        <input type="file" onchange="preview1()" id="file1" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image" >
                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['featured_image'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/blog_feature_img/<?php echo $value['featured_image']; ?>" id="imgbb">
                                        <?php }
                                        ?>

                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Upload Pdf</label>
                                        <span style="color:red;font-size:12px">(Extension: .pdf)</span>
                                         <input type="file" id="file" class="form-control" accept="application/pdf"  name="pdf">
                                    </div>

                                    <div class="mb-3">
                                        <?php if ($value['main_image'] != NULL) { ?>
                                            <a href="<?php echo base_url() ?>uploads/pdf/<?php echo $value['main_image']; ?>" target="_blank" >DOWNLOAD</a>
                                           
                                        <?php }
                                        ?>

                                    </div>  

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-end">
                                        
                                        <a class="btn btn-secondary"   href="<?php echo base_url(); ?>blog-list">Back</a>
                                        <button type="submit"  class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>

<script>
// ClassicEditor.create(document.querySelector("#blogDetail"));

                                            CKEDITOR.replace('description', {
                                                filebrowserUploadUrl: "<?php echo base_url(); ?>Blog/upload"
                                            });
                                            CKEDITOR.instances["description"].on('key', function () {
                                                checkEditorText('description');
                                            });

</script>

<!--<script src="<?php echo base_url(); ?>template/custom/js/blog.js?v=5"></script>-->


<script>

    jQuery.validator.addMethod('ckrequired', function (value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
        return !params || messageLength.length !== 0;
    }, "Details field is required");

    $("#myform2").validate({
        ignore: [],
        rules: {

           
            author_id: {
                required: true,

            },
            date: {
                required: true,

            },

            blogtitle: {
                required: true,

            },

            shortdescription: {
                required: true,

            },

            description: {
                ckrequired: true
            }

        },
        messages: {
          
            author_id: {
                required: "Author Name can not be empty"

            },
            date: {
                required: "date can not be empty"

            },

            blogtitle: {
                required: "Title is mandatory"

            },

            shortdescription: {
                required: "Brief Intro can not be empty"

            }

        }
    });




</script>



<script>

    function validateForm() {
        var message = document.forms["myform"]["description"].value;


        textbox_data = CKEDITOR.instances['description'].getData();

        if (textbox_data === '')
        {
            alert('Description Can not be blank');
            return(false);
        }
    }
</script>


<script>

    function preview() {
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            $('.button').removeClass("hidden");
            imgb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>



<script>

    function preview1() {
        var fileInput = document.getElementById('file1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            $('.button').removeClass("hidden");
            imgbb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>


