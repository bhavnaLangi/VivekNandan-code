
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mb-4">

        <!-- Browser Default -->

        <div class="col-md mb-4 mb-md-0">

            <div class="card">
                <h5 class="card-header"><?php echo $page_name; ?></h5>
                <div class="card-body">

                    <form class="add-team" method="post" enctype="multipart/form-data" >
                        <div class="mb-3">

                            <label class="form-label" for="bs-validation-name">Name</label>

                            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name">

                            <div class="invalid-feedback" id="name_error"> </div>

                        </div>

                        
                        <div class="mb-3">

                            <label class="form-label" for="bs-validation-upload-file">Image</label>
                            <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension Size 1050*1050 px</span>

                            <input type="file" id="file1" onchange="preview1()" class="form-control" name="featured_image">

                            <div class="invalid-feedback" id="featured_image_error"> </div>
                        </div>

                        <div class="mb-3">                            
                            <img id="thumb1" style="width: 100px" src="">

                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Upload Pdf</label>
                                <span style="color:red;font-size:12px">(Extension: .pdf)</span>
                                <input type="file" id="file" class="form-control" accept="application/pdf" name="pdf">
                            <div class="invalid-feedback" id="pdf_error"> </div>
                       </div> 





                        <div class="row">

                            <div class="col-12">
                                <div class="text-end">

                                    
                                    <a href="media_list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="addteam-btn"  class="btn btn-primary">Add</button>

                                </div>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

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
            thumb1.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>


