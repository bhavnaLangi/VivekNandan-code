<style>
    .tbl-padding div#example_wrapper {
            padding: 0;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Complex Headers -->
    <div class="card">
        <h5 class="card-header">Career Enquiry List </h5>
        <div class="card-body">
            <div class="table-responsive tbl-padding">
                <table class="table text-left table-striped" id="example">
                    <thead>
                        <tr>
                            <th >Sr No
                            </th>
                            <th>First Name</th>
                            <th>last Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Date & Time</th>
                            
                            <th>Resume</th>
                        </tr>
                    </thead>
                    <?php $count = 1; ?>
                    <tbody>
                        <?php foreach ($list as $value) : ?>
                        <tr>
                            <td><?php echo $count++;  ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['exp']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['number']; ?></td>
                            <td><?php echo date("d-m-Y H:i:sa",strtotime($value['date'])); ?></td>
                           
                            <td><a href="<?php echo base_url();?>uploads/job/<?php echo $value['file'] ?>" target="_blank" >View</a></td>
                        </tr>
                        <?php  endforeach ?>     
                    </tbody>
                </table>
            </div>    
        </div>
    </div>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>View Message</b></h5>
                <button type="button" id="cat_name" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <hr>
            <div class="modal-body">
               <span  id="cmsg"></span>
             </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>