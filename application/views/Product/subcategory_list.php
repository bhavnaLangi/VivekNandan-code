<style>
    .tbl-padding div#example_wrapper{
        padding: 0;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Project category List</h5>
                  <?php             
                                     $rrr = $this->common->subside($this->session->userdata('user_id'));
                                     if($rrr->num_rows() > 0){
                                     $res= $this->common->eachcheckpri('addscp',$this->session->userdata('brw_logged_type'));
                                      if($res->num_rows() > 0){
                                      ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add Category</button>
            <?php }else{
                                      } 
                                     }else{ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add Category</button>
                               <?php }
                                     ?>
            </div>

            <div class="table-responsive tbl-padding">
                <form id="pro_subcat" method="post" >
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th colspan="7" class="px-0">
                                    <!--<button type="submit"  name="delete_all" value= "Delete" class="btn btn-danger btn-xs">Delete</button>-->
                                    <!--<button type="submit" name="status" value="Status" class="btn btn-success btn-xs">Status</button>       -->
                                    <button type="submit" id="delete_all" name="delete_all" value= "Delete" class="btn p-0" style="display:none;">
                                        <!--Delete-->
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <!--<button type="submit" id="sta" class="btn btn-label-secondary btn-xs">Change Status</button> -->
                                    
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;">Change Status</button>
                                </th>
                            </tr>
                            <tr>
                                <th> 
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>
                                <th>
                                    Sr No
                                </th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Current Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($subcategory_list as $value) : ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox_value[]" value="<?php echo $value['id']; ?>"></td> 
    
                                    <td>
                                        <?php echo $count++; ?>
                                    </td>
    
                                    <td><?php if($value['category_id']=='0'){
                                    echo $value['subcategory'] ;
                                    }else{
                                     echo $this->common->selectivename($value['category_id'],'subcategory','tbl_subcategory') ;
                                    }
                                    ?>
                                    </td> 
    
                                    <td><?php 
                                    if($value['category_id']=='0'){
                                    echo '' ;
                                    }else{
                                      echo $value['subcategory'];  
                                    }
                                    ?></td>                                           
                                    <td>     <label class="switch switch-success">
                                            <?php if ($value['status'] == 1) { ?>
                                                <input type="checkbox" checked  data-id="<?php echo $value['id']; ?>"    data-status= "0"   class="switch-input status-subcategory"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                </span>
                                                <!-- <span class="switch-label">Active</span> -->
                                                <?php
                                            } elseif ($value['status'] == 0) {
                                                ?>
                                                <input type="checkbox"  data-id="<?php echo $value['id']; ?>"    data-status=' 1 ' class="switch-input status-subcategory"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-off">
                                                        <i class="bx bx-x" style="color:red;"></i>
                                                    </span>
                                                </span>
                                                <!-- <span class="switch-label">Deactivated</span>-->
                                            <?php } ?>
                                        </label> 
                                    </td>
                                     <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php if($this->session->userdata('user_id')==1){?>
                                        <button type="button" class="btn btn-primary btn-xs fetch-sequence1" data-bs-toggle="modal" data-bs-target="#smallModal1" data-id="<?php echo $value['id']; ?>"> Edit Sequence </button>
                                           <?php  }           
                                     $rrr = $this->common->subside($this->session->userdata('user_id'));
                                     if($rrr->num_rows() > 0){
                                     $res= $this->common->eachcheckpri('editscp',$this->session->userdata('brw_logged_type'));
                                      if($res->num_rows() > 0){
                                      ?>
                                            <button type="button" class="btn btn-info btn-actions btn-sm fetch-subcategory" data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>
                                            <?php }else{
                                      } 
                                     }else{ ?>
                                         <button type="button" class="btn btn-info btn-actions btn-sm fetch-subcategory" data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>
  <?php }
                                           $del = $this->common->subside($this->session->userdata('user_id'));
                                     if($del->num_rows() > 0){
                                     $delres = $this->common->eachcheckpri('delscp',$this->session->userdata('brw_logged_type'));
                                      if($delres->num_rows() > 0){
                                      ?>
                                            <button type="button"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-subcategory"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14"></i></button>
                                           <?php }else{
                                      } 
                                     }else{ ?>
                                            <button type="button"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-subcategory"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14"></i></button>
                                        <?php }  ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
                
        </div>                        
    </div>
</div>
<?php 
// $d='ALTER TABLE `product` CHANGE `pdf` `pdf` INT NOT NULL;';
// $this->db->query($d);
?>
<div class="modal fade" id="smallModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-sequence1" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Sequence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <input type="hidden" name="id" id="id1">
                            <label class="form-label" for="modalEditUserFirstName">Edit Sequence</label>

                            <input type="text" class="form-control" placeholder="Enter Sequence No"     id="sequence1" name="sequence">
                            <div class="invalid-feedback" id="sequence_error"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addblog-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="editauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-subcategory" method="post">                   
            <input type="hidden" class="form-control" id="id" name="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Project Category Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="modalEditUserFirstName">Select Category </label>
                            <select class="form-control"  name="category_id" id="e_category_id">
                               
                                 <option value="0">Select Parent</option>
                               <?php foreach ($category_list as $value) : ?>

                                    <option value="<?php echo $value['id']; ?>">  <?php echo $value['subcategory']; ?></option>

                                <?php endforeach; ?>


                            </select>
                            <div class="invalid-feedback" id="categoryproedit_error"></div>
                        </div>

                    </div>  
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Project Category Name</label>

                            <input type="text" class="form-control" placeholder="Enter Project Category Name" id="subcat_name" name="subcategory">

                            <div class="invalid-feedback" id="subcategorycat_error"></div>
                        </div>
                    </div>
                    <div class="row" id="subim1">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Project Sub Category Image</label>

                            <input type="file" class="form-control" name="image" >
                        </div>
                         <div class="mb-3 imagebank">
                        
                            <img style="width: 100px" src="" id="catser">
                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="updatsub-btn" class="btn btn-primary m-t-15 waves-effect">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-subcategory" method="post">                   


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Project Category Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="bs-validation-country">Select Project Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                               <option value="0">Select Parent</option>

                                <?php foreach ($category_list as $value) : ?>

                                    <option value="<?php echo $value['id']; ?>">  <?php echo $value['subcategory']; ?></option>

                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback" id="categorypro_error"> </div>
                        </div>

                    </div>  
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Project Category Name</label>

                            <input type="text" class="form-control" placeholder="Enter Project Category Name" id="subcat_name" name="subcategory">

                            <div class="invalid-feedback" id="subcategory_error"></div>
                        </div>
                    </div>
                    <div class="row" id="subim" style="display:none;">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Project Sub Category Image</label>

                            <input type="file" class="form-control" name="image" >
                        </div>
                         <div class="mb-3 imagebank">
                        
                            <img style="width: 100px" src="" id="catser">
                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addsubcat-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>

$("#subim").hide();
$("#subim1").hide();

    $('.fetch-subcategory').on('click', function(event) {
    event.preventDefault();
    var wrap_html = "";
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "retrive-subcategory",
        type: "POST",
        dataType: "json",
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#e_category_id').val(data.category_id);

            if(data.category_id != '0'){
                $("#subim1").show();
            }else{
                $("#subim1").hide(); 
            }

            $('#subcat_name').val(data.subcategory);
            $('#id').val(data.id);
            if(data.image !=''){
                $('#catser').show();
              $('#catser').attr('src','<?php echo base_url();?>uploads/product/'+data.image);
            }else{
                $('#catser').hide();
            }
        }
    });
});


$(document).on('change','#category_id', function (event) {

    var task_id= $(this).find(":selected").val();
    if(task_id !='0'){
        $("#subim").show();
    }else{
        $("#subim").hide(); 
    }
})

</script>




