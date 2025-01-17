
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">

        <h5 class="card-header">Service Enquiry List</h5>
        <div class="card-body">
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th >
                            Sr No
                        </th>
                        <th>Service Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>

                        <th>View Message</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach ($enq_list as $value) : ?>
                        <?php $count++; ?>
                        <tr>
                            <td> <?php echo $count; ?></td>
                            <td><?php echo $value['service_id']; ?></td> 

                            <td><?php echo $value['name']; ?></td> 

                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['contact']; ?></td>


                            <td>                              
                                <button type="button" class="btn btn-primary btn-xs fetch-enq" data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#basicModal">View</button>                           
                            </td> 

                            <td><?php echo $value['createdDate']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>

    </div>


</div>



<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">    
    <div class="modal-dialog" role="document">     
        <div class="modal-content">            <div class="modal-header">                
                <h5 class="modal-title" id="modalLongTitle">Message</h5>             
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       

            </div>         
            <div class="modal-body">            
                <p id="message" ></p>          
            </div>           
            <div class="modal-footer">            
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>           
            </div>       
        </div>  
    </div>
</div>          



