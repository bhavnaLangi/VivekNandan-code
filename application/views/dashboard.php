<div class="container-xxl flex-grow-1 container-p-y">



    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Enquiries</span>
                            <div class="d-flex align-items-end mt-2">
                            <?php $this->db->select('*');
                                   $this->db->where('whereis','contact');
                                    $this->db->from('newsletter');
                                   $query2 = $this->db->get();
                                 ?>
                                <h4 class="mb-0 me-2"><?php echo $query2->num_rows(); ?></h4>

                            </div>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Enquiries This Month</span>
                            <div class="d-flex align-items-end mt-2">
                            <?php $this->db->select('*');
                                   $this->db->where('whereis','contact');
                                   $this->db->where('MONTH(date)', date('m'));
                                   $this->db->where('YEAR(date)', date('Y'));
                                   $this->db->from('newsletter');
                                   $query2 = $this->db->get();
                                 ?>
                                <h4 class="mb-0 me-2"><?php echo $query2->num_rows(); ?></h4>

                            </div>
      
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="bx bx-user-plus bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Projects</span>
                            <div class="d-flex align-items-end mt-2">
                            <?php $this->db->select('*');
                                  
                                  $this->db->from('product');
                                  $query4 = $this->db->get();
                                ?>
                               <h4 class="mb-0 me-2"><?php echo $query4->num_rows(); ?></h4>

                            </div>
     
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="bx bx-group bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Articles</span>
                            <div class="d-flex align-items-end mt-2">
                            <?php $this->db->select('*');
                                  
                                  $this->db->from('blog');
                                  $query3 = $this->db->get();
                                ?>
                               <h4 class="mb-0 me-2"><?php echo $query3->num_rows(); ?></h4>

                            </div>
                          
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                        <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>