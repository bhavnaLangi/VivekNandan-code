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
                <h5 class="card-header p-0">Project List</h5>
            </div>       
         <!-- <div class="d-flex justify-content-between align-items-center mb-4">
                <form method="POST" action="<?php echo base_url();?>importpro" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <input type="submit" name="importSubmit" value="importSubmit" id="importSubmit">

                </form>
             </div> -->
         <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        <div class="form_error">
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                <?php } ?> 
             <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                            <div class="form_error">
                                <?php echo validation_errors(); ?>
                            </div>
                        </div>
                    <?php } ?>
            <div class="table-responsive tbl-padding">
                <form id="plist" method="post" >
                    <table class="table table-striped" id="example">
    
                        <thead>
                            <tr>
                                <th colspan="9" class="px-0">
                                    <button type="submit" id="delete_all" name="delete_all" value= "Delete" class="btn p-0" style="display:none;">
                                        <!--Delete-->
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <!--<button type="submit" id="sta" class="btn btn-label-secondary btn-xs">Change Status</button>     -->
                                    
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;">Change Status</button>
                                </th>
                            </tr>
                            <tr>
                                <th> 
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>
                                <th >
                                    Sr No
                                </th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Featured Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($product_list as $value) : ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox_value[]" value="<?php echo $value['id']; ?>"></td> 
    
                                    <td>   <?php echo $count++; ?>
                                    </td>
                                    <td><?php echo $this->common->cat_name($value['category_id'],'subcategory','tbl_subcategory') ?></td>
                                <td><?php echo $this->common->cat_name($value['subcategory_id'],'subcategory','tbl_subcategory') ?></td> 
                                   
    
    
                                    <td><?php echo $value['name']; ?></td>
    
                                    <td>     <label class="switch switch-success">
                                            <?php if ($value['status'] == 1) { ?>
                                                <input type="checkbox" checked  data-id="<?php echo $value['id']; ?>"    data-status= "0"   class="switch-input status-product"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                </span>
                                                <!-- <span class="switch-label">Active</span> -->
                                                <?php
                                            } elseif ($value['status'] == 0) {
                                                ?>
                                                <input type="checkbox"  data-id="<?php echo $value['id']; ?>"    data-status=' 1 ' class="switch-input status-product"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-off">
                                                        <i class="bx bx-x" style="color:red;"></i>
                                                    </span>
                                                </span>
                                                <!-- <span class="switch-label">Deactivated</span>-->
                                            <?php } ?>
                                        </label> 
                                    </td>
    
    
                                    <td>  <?php if ($value['featured'] == 1) { ?>
                                            <button type="button"  data-status='0'   class="btn btn-success btn-xs featured-product"  data-id="<?php echo $value['id']; ?>"><i id="thmbsup" class="fa fa-thumbs-up "></i></button>
                                             <?php } else { ?>
                                            <button type="button"  data-status='1'   class="btn btn-danger btn-xs featured-product"  data-id="<?php echo $value['id']; ?>"><i id="thmbsdm" class="fa fa-thumbs-down"></i></button>
                                        <?php } ?>
    
                                        </label> 
                                       
                                    </td>
                                     <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-xs fetch-sequence" data-bs-toggle="modal" data-bs-target="#smallModal" data-id="<?php echo $value['id']; ?>"> Edit Sequence </button>
                                             <?php             
                                     $rrr = $this->common->subside($this->session->userdata('user_id'));
                                     if($rrr->num_rows() > 0){
                                     $res= $this->common->eachcheckpri('editp',$this->session->userdata('brw_logged_type'));
                                      if($res->num_rows() > 0){
                                      ?>
                                            <a class="btn btn-info btn-actions btn-sm"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit" href="<?php echo base_url(); ?>edit-project/<?php echo $value["id"]; ?>"><i class="far fa-edit font-14"></i></a>
                                         <?php }else{
                                      } 
                                     }else{ ?>
                                         <a class="btn btn-info btn-actions btn-sm"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit" href="<?php echo base_url(); ?>edit-project/<?php echo $value["id"]; ?>"><i class="far fa-edit font-14"></i></a>
                                   <?php }
                                           $del = $this->common->subside($this->session->userdata('user_id'));
                                     if($del->num_rows() > 0){
                                     $delres = $this->common->eachcheckpri('delp',$this->session->userdata('brw_logged_type'));
                                      if($delres->num_rows() > 0){
                                      ?>
                                            <button type="button" class="btn btn-info btn-actions btn-sm delete-product"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14" title="Delete Blog"></i></button>
                                           <?php }else{
                                      } 
                                     }else{ ?>
                                            <button type="button" class="btn btn-info btn-actions btn-sm delete-product"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14" title="Delete Blog"></i></button>
                                          <?php }  ?>
                                            <a class="btn btn-info btn-actions btn-sm"  data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="SEO" href="<?php echo base_url(); ?>editproductseo/<?php echo $value["id"]; ?>">SEO</a>
    
                                           
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

<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-sequence" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Sequence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <input type="hidden" name="id" id="id">
                            <label class="form-label" for="modalEditUserFirstName">Edit Sequence</label>

                            <input type="text" class="form-control" placeholder="Enter Sequence No"     id="sequence" name="sequence">
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

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
// $(document).ready(function () {
//     $('#example').DataTable({
//         "language": {
//       "emptyTable": "No data available in table"
//     },
//         stateSave: true,
//         "columnDefs": [
//        { "orderable": false, "targets": 0 }
//            ]
           
//     });
  
    

// });
 </script>