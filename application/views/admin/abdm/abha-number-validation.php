<div class="col-md-8 col-md-offset-2">
                
                 <?php if($this->session->flashdata('success')!='') { ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('error')!='')
				{
				?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php } ?>
				
                <div class="box box-primary">
                    
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"> Abha Number Verification</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url(); ?>admin/abhavalidation/searchabha" class="btn btn-primary btn-sm"> Search ABHA</a> 
                            <a href="<?php echo base_url(); ?>admin/abhavalidation/reactivateAccount" class="btn btn-primary btn-sm"> Reactivate ABHA</a> 
                        </div>    
                    </div>
                    
                    <div class="box-body">
                        <form action="<?php echo base_url(); ?>admin/abhavalidation/abhanumberverification" method="POST">
        					<div class="form-check mb-15 mt-15">
        					    <label class="radio-inline">
                                  <input type="radio" onclick="selectVerificationMethod(this.value)" name="verify_by" value="abha_no" checked> Using ABHA Number
                                </label>
                                
                                <label class="radio-inline">
                                  <input type="radio"  type="radio" onclick="selectVerificationMethod(this.value)" name="verify_by" value="mobile_no"> Using Mobile Number
                                </label>
                                
                                <label class="radio-inline">
                                  <input type="radio" type="radio" onclick="selectVerificationMethod(this.value)" name="verify_by" value="aadhar_no"> Using Aadhar Number
                                </label>
                                
        					</div>
        					<div class="mb-15 mt-15">
        					  <!--label for="abha_data" id="methodText">ABHA Number:</label-->
        					  <input type="text" class="form-control" id="abha_data" placeholder="Enter ABHA Number" name="abha_data" required>
        					  <p id="noteMsg" style="display:none"><small>Use your communication mobile number registered with ABDM</small></p>
        					</div>
        					<div class="mb-15 mt-15 text-center">
        				    	<button type="submit" name="submit" class="btn btn-primary">Send OTP</button>
        					</div>
        			    </form>
                    </div>

                </div>
                
            </div>