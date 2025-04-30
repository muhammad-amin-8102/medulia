<div class="col-md-12">

    <?php if ($this->session->flashdata('success') != '') { ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error') != '') {
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
                        <input type="radio" type="radio" onclick="selectVerificationMethod(this.value)" name="verify_by" value="mobile_no"> Using Mobile Number
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

    <!-- Form Section -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo base_url(); ?>admin/abhavalidation/registerWithAadhar" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="abha_number">ABHA Number:</label>
                                <input type="text" class="form-control" id="abha_number" name="abha_number" placeholder="12-1234-1234" readonly>
                            </div>
                            <div class="form-group">
                                <label for="patient_name">Patient Name:</label>
                                <select class="form-control" id="patient_name" name="patient_name" required>
                                    <option value="">-- Select --</option>
                                    <option value="John Doe">John Doe</option>
                                    <option value="Jane Doe">Jane Doe</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <input type="text" class="form-control" id="gender" name="gender" placeholder="Gen" readonly>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group:</label>
                                <select class="form-control" id="blood_group" name="blood_group">
                                    <option value="NA">NA</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mother_tongue">Mother Tongue:</label>
                                <select class="form-control" id="mother_tongue" name="mother_tongue">
                                    <option value="">-- Select --</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                </select>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="abha_address">ABHA Address:</label>
                                <input type="email" class="form-control" id="abha_address" name="abha_address" placeholder="john@abdm">
                            </div>
                            <div class="form-group">
                                <label for="dob">DOB/Age:</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile_no">Mobile No.:</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Street/Village" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="patient_image">Patient Image:</label>
                                <input type="file" class="form-control" id="patient_image" name="patient_image">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>