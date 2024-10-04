


<div class="container-xxl flex-grow-1 container-p-y">

<div class="row mb-4">
    <!-- Browser Default -->
    <div class="col-md mb-4 mb-md-0">
        <div class="card">
            <h5 class="card-header">  Edit Home Page Slider
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
                <?php } elseif($this->session->flashdata('warning')) { ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <?php echo $this->session->flashdata('warning'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        <div class="form_error">
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                <?php } ?>  
                <form id="myform2"  action="<?php echo base_url(); ?>editsliderupdate" method="post"  enctype="multipart/form-data" onsubmit="return save()">
                 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Project 1:</label>
                                <select class="form-control"  name="project[]"  required>
                                    <option value="">Select Project</option>
                                    <?php foreach ($project as $value3) : ?>
                                        <option value="<?php echo $value3['id']; ?>" <?php echo $value3['slider_status'] == '1' ? 'selected' : ''; ?>> <?php echo $value3['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Project 2:</label>
                                <select class="form-control"  name="project[]" required>
                                    <option value="">Select Project</option>
                                    <?php foreach ($project as $value2) : ?>
                                        <option value="<?php echo $value2['id']; ?>" <?php echo $value2['slider_status'] == '2' ? 'selected' : ''; ?>> <?php echo $value2['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Project 3:</label>
                                <select class="form-control"  name="project[]" required>
                                    <option value="">Select Project</option>
                                    <?php foreach ($project as $value1) : ?>
                                        <option value="<?php echo $value1['id']; ?>" <?php echo $value1['slider_status'] == '3' ? 'selected' : ''; ?>> <?php echo $value1['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Project 4:</label>
                                <select class="form-control"  name="project[]" required>
                                    <option value="">Select Project</option>
                                    <?php foreach ($project as $value4) : ?>
                                        <option value="<?php echo $value4['id']; ?>" <?php echo $value4['slider_status'] == '4' ? 'selected' : ''; ?>> <?php echo $value4['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>  
                       
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Project 5:</label>
                                <select class="form-control"  name="project[]" required>
                                    <option value="">Select Project</option>
                                    <?php foreach ($project as $value5) : ?>
                                        <option value="<?php echo $value5['id']; ?>" <?php echo $value5['slider_status'] == '5' ? 'selected' : ''; ?>> <?php echo $value5['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-12">
                            <div class="text-end">
                                
                                
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





<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>




<!--<script src="<?php echo base_url(); ?>template/custom/js/blog.js?v=5"></script>-->


<script>




$("#myform2").validate({


rules: {

    'project[]': {
        required: true,

    },
    

   


},
});




</script>

<script>
function save() {
var selects = document.getElementsByTagName('select');
var values = [];
for (i = 0; i < selects.length; i++) {
    var select = selects[i];
    if (values.indexOf(select.value) > -1) {
        alert('duplicate exists' + select.value);
        return false;

    } else
        values.push(select.value);
}
}

</script>


