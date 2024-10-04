<!-- Content -->
<?php foreach ($edit_details as $value) : ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header"> Edit Project</h5>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        <div class="form_error">
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                    <?php }elseif($this->session->flashdata('warning')){ ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <?php echo $this->session->flashdata('warning'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        <div class="form_error">
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                    <?php }?>

                    <form id="myform2" action="<?php echo base_url(); ?>edit-pro" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Project
                                        Category</label>
                                    <select class="form-control" id="sel_city" name="category_id">
                                        <option value="">Select Project Category</option>
                                        <?php foreach ($category_list as $value1) : ?>
                                        <option value="<?php echo $value1['id']; ?>"
                                            <?php echo $value1['id'] == $value['category_id'] ? 'selected' : ''; ?>>
                                            <?php echo $value1['subcategory']; ?></option>
                                        <?php endforeach; ?>
                                   </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Project Sub Category</label>
                                    <select class="form-control" id="sel_subser" name="subcategory_id">

                                  
                                        <option value="">Select Project Sub Category</option>

                                        <?php foreach ($subcategory_list as $value2) : ?>

                                            <option value="<?php echo $value2['id']; ?>" <?php echo $value2['id'] == $value['subcategory_id'] ? 'selected':'' ?>>  <?php echo $value2['subcategory']; ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                    

                               </div>
                            </div>
                        </div>
                    

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Project Name</label>
                                <input type="text" class="form-control" value="<?php echo $value['name']; ?>"
                                    name="name" placeholder="Enter Project Name">
                            </div>
                        </div>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Location</label>
                            <input type="text" class="form-control" name="location" value="<?php echo $value['location']; ?>" placeholder="Enter Location">
                            <div class="invalid-feedback" id="name_error"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Client</label>
                            <input type="text" class="form-control" name="client" value="<?php echo $value['client']; ?>" placeholder="Enter Client">
                            <div class="invalid-feedback" id="name_error"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Area</label>
                            <input type="text" class="form-control" name="area" value="<?php echo $value['area']; ?>" placeholder="Enter Area">
                            <div class="invalid-feedback" id="name_error"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Construction Cost</label>
                            <input type="text" class="form-control" name="concost" value="<?php echo $value['concost']; ?>" placeholder="Enter Construction Cost">
                            <div class="invalid-feedback" id="name_error"> </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">Featured Image</label>
                            <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp)
                                Note:Dimension Size 510*632px</span>
                            <input type="file" onchange="preview()" id="file" class="form-control"
                                name="featured_image">
                        </div>
                        <div class="mb-3">
                            <?php if ($value['featured_image'] != NULL) { ?>
                            <img style="width: 100px"
                                src="<?php echo base_url() ?>uploads/product/<?php echo $value['featured_image']; ?>"
                                id="imgb">
                            <?php }
                                    ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">Main Image</label>
                            <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp)
                                Note:Dimension Size 1000*500px</span>
                                <input type="file" onchange="preview1()" id="file1"  class="form-control" multiple name="files[]" >                       
                            <div class="invalid-feedback" id="msg_error"> </div>
                        </div>
                        <div class="mb-3">
                             <?php 

                                    foreach($multi_image as $val){

                                    if ($val['image'] != NULL) { ?>

                                    <img style="width: 100px" src="<?php echo base_url() ?>uploads/product/<?php echo $val['image']; ?>" id="imgbb">

                                    <button type="button" class="btn btn-xs deleteim" data-id="<?php echo $val['id']; ?>" ><i class="fa fa-window-close"></i></button>

                                    <?php }

                                    }

                                    ?>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">Home Page Image</label>
                            <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 1250*275px</span>
                            <input type="file" class="form-control" id="file3" onchange="previewhimage()" name="home_image"  >
                        </div>
                        <div class="mb-3">                            
                        <?php if ($value['image'] != NULL) { ?>
                            <img style="width: 100px"
                                src="<?php echo base_url() ?>uploads/product/<?php echo $value['image']; ?>"
                                id="imgb2">
                            <?php }
                                    ?>
                        </div>
                    </div>
                </div> 
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-bio">Brief Intro</label>
                            <textarea class="form-control" name="briefinfo"
                                placeholder="Details"><?php echo $value['briefinfo']; ?></textarea>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-bio">Details</label>
                            <textarea class="form-control " id="description1" name="description1"
                                placeholder="Details"><?php echo $value['description']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                        <div class="card-footer p-0 text-end">
                            <a href="<?php echo base_url();?>project-list" class="btn btn-secondary">Back</a>
                            <button type="submit" id="updatpro-btn" class="btn btn-primary mr-1"
                                type="submit">Update</button>

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
jQuery.validator.addMethod('ckrequired', function(value, element, params) {
    var idname = jQuery(element).attr('id');
    var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
    return !params || messageLength.length !== 0;
}, "Details field is required");
$("#myform2").validate({
    ignore: [],

    rules: {

        name: {
            required: true,

        },

        area: {
            required: true,

        },
        location: {
            required: true,

        },
        client: {
            required: true,

        },
        concost: {
            required: true,

        },
        description1: {
            ckrequired: true
        },
        category_id: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Name can not be empty"

        },
       
        category_id: {
            required: "Category Can Not be Empty."

        },
    }
});
</script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
CKEDITOR.replace('description1', {
    height: 200,

    filebrowserUploadUrl: "<?php echo site_url('upload_ckeditor'); ?>"
});
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
        
        imgbb.src = URL.createObjectURL(event.target.files[0]);
    }
}

function previewhimage() {
    var fileInput = document.getElementById('file3');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
    if (!allowedExtensions.exec(filePath)) {
        alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        
        imgb2.src = URL.createObjectURL(event.target.files[0]);
    }
}
</script>
<script>
function pdf(input) {
    debugger;
    var validExtensions = ['pdf', 'PDF'];
    //   var validExtensions = ['jpg','png','jpeg','JPG','JPEG','PNG']; //array of valid extensions
    var fileName = input.files[0].name;
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    if ($.inArray(fileNameExt, validExtensions) == -1) {
        input.type = ''
        input.type = 'file'
        $('#pdf').attr('src', "");
        alert("Only these file types are accepted : " + validExtensions.join(', '));
    } else {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function(e) {
                $('#pdf').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(input.files[0]);
        }
    }
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('select[name="category_id"]').on('change', function() {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                url: '<?php echo base_url(); ?>myformAjax/' + stateID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(
                            '<option value="">Select Sub Category</option>');
                        $('select[name="subcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subcategory + '</option>');
                    });
                }
            });
        } else {
            $('select[name="subcategory_id"]').empty();
        }
    });
});
</script>