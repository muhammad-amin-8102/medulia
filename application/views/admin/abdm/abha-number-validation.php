<style>
    .scheduler-border {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 4px;
        margin-top: 20px;
    }

    .scheduler-border legend {
        font-size: 14px;
        font-weight: bold;
        text-align: left;
        width: auto;
        padding: 0 10px;
        border-bottom: none;
        margin-bottom: 0;
    }
</style>
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
            <h3 class="box-title titlefix"> Abha Verification</h3>
            <div class="box-tools pull-right">
                <a href="<?php echo base_url(); ?>admin/abdm/hipInitiateLinking" class="btn btn-primary btn-sm"> HIP Initiating Linking</a>
                <a href="<?php echo base_url(); ?>admin/abhavalidation/searchabha" class="btn btn-primary btn-sm"> Search ABHA</a>
                <a href="<?php echo base_url(); ?>admin/abhavalidation/reactivateAccount" class="btn btn-primary btn-sm"> Reactivate ABHA</a>
            </div>
        </div>

        <div class="box-body">
            <!-- <form action="<?php //echo base_url(); 
                                ?>admin/abdm/abhanumberverification" method="POST"> -->
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
                <button type="button" name="submit" id="sendOtpButton" class="btn btn-primary">Send OTP</button>
            </div>

            <!-- Enter OTP Section -->
            <div id="enterOtpSection" style="display: none; margin-top: 20px;">
                <label for="otp">Enter OTP:</label>
                <input type="text" class="form-control" id="verifyOtpText" name="verifyOtpText" placeholder="Enter OTP">
                <button type="button" id="verifyOtpButton" class="btn btn-success" style="margin-top: 10px;">Verify OTP</button>
            </div>

            <!-- Success/Error Message -->
            <div id="responseMessage" style="margin-top: 20px;"></div>
            <!-- </form> -->
        </div>
    </div>

    <!-- Patient Registration Form Section -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo base_url(); ?>admin/abhavalidation/registerWithAadhar" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="abha_number">ABHA Number:</label>
                                <input type="text" class="form-control" id="profile_abha_number" name="abha_number" placeholder="12-1234-1234" readonly>
                            </div>
                            <div class="form-group">
                                <label for="patient_name">Patient Name:</label>
                                <div class="row">
                                    <!-- Prefix Dropdown -->
                                    <div class="col-md-4">
                                        <select class="form-control" id="profile_prefix" name="prefix" required>
                                            <option value="">-- Select Initial --</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="MASTER">MASTER</option>
                                            <option value="BABY">BABY</option>
                                            <option value="BABY(M)">BABY(M) Of</option>
                                            <option value="BABY(F)">BABY(F) Of</option>
                                            <option value="Transgender">Transgender</option>
                                        </select>
                                    </div>

                                    <!-- Patient Name Text Field -->
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profile_patient_name" name="patient_name" placeholder="Enter Patient Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- Gender Field -->
                                    <div class="col-md-6">
                                        <label for="gender">Gender:</label>
                                        <input type="text" class="form-control" id="profile_gender" name="gender" placeholder="Gen" readonly>
                                    </div>

                                    <!-- Marital Status Field -->
                                    <div class="col-md-6">
                                        <label for="marital_status">Marital Status:</label>
                                        <select class="form-control" id="profile_marital_status" name="marital_status" required>
                                            <option value="">-- Select --</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- Blood Group Field -->
                                    <div class="col-md-6">
                                        <label for="blood_group">Blood Group:</label>
                                        <select class="form-control" id="profile_blood_group" name="blood_group" required>
                                            <option value="NA">NA</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>

                                    <!-- Religion Field -->
                                    <div class="col-md-6">
                                        <label for="religion">Religion:</label>
                                        <select class="form-control" id="profile_religion" name="religion" required>
                                            <option value="">-- Religion --</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Sikh">Sikh</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Jain">Jain</option>
                                            <option value="Budh">Budh</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- Mother Tongue Field -->
                                    <div class="col-md-6">
                                        <label for="mother_tongue">Mother Tongue:</label>
                                        <select class="form-control" id="profile_mother_tongue" name="mother_tongue" required>
                                            <option value="">-- Select --</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="English">English</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <!-- Occupation Field -->
                                    <div class="col-md-6">
                                        <label for="occupation">Occupation:</label>
                                        <select class="form-control" id="profile_occupation" name="occupation" required>
                                            <option value="">-- Select --</option>
                                            <option value="Pvt Service">Pvt Service</option>
                                            <option value="Govt Service">Govt Service</option>
                                            <option value="Self Employed">Self Employed</option>
                                            <option value="Business">Business</option>
                                            <option value="Consultant">Consultant</option>
                                            <option value="Farmer">Farmer</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="abha_address">ABHA Address:</label>
                                <input type="email" class="form-control" id="profile_abha_address" name="abha_address" placeholder="john@abdm">
                            </div>
                            <div class="form-group">
                                <label for="sdwo">S/D/W o:</label>
                                <div class="row">
                                    <!-- Prefix Dropdown -->
                                    <div class="col-md-2">
                                        <select class="form-control" id="profile_sdw_prefix" name="prefix" required>
                                            <option value="">-- Select Initial --</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Late Shree</option>
                                        </select>
                                    </div>


                                    <!-- Text Input Field -->
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profile_relation_name" name="relation_name" placeholder="Enter Name" required>
                                    </div>

                                    <!-- Postfix Dropdown -->
                                    <div class="col-md-2">
                                        <select class="form-control" id="profile_relation_postfix" name="relation_postfix" required>
                                            <option value="">-- Select Relation --</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Wife">Wife</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile_dob">DOB/Age <span class="text-danger">*</span>:</label>
                                <div class="row">
                                    <!-- DOB Field -->
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" id="profile_dob" name="profile_dob" placeholder="dd/mm/yyyy" onchange="calculateAge()" required>
                                    </div>

                                    <!-- Age in Years -->
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="profile_age_years" name="age_years" placeholder="Age (Y)" oninput="calculateDOB()" required>
                                    </div>

                                    <!-- Age in Months -->
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="profile_age_months" name="age_months" placeholder="Age (M)" oninput="calculateDOB()" required>
                                    </div>

                                    <!-- Age in Days -->
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="profile_age_days" name="age_days" placeholder="Age (D)" oninput="calculateDOB()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="profile_email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- Mobile Number Field -->
                                    <div class="col-md-6">
                                        <label for="mobile_no">Mobile No. <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control" id="profile_mobile_no" name="mobile_no" placeholder="Mobile Number" required>
                                    </div>

                                    <!-- Attendant Mobile Number Field -->
                                    <div class="col-md-6">
                                        <label for="attendant_mobile_no">Attendant:</label>
                                        <input type="text" class="form-control" id="profile_attendant_mobile_no" name="attendant_mobile_no" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Resident Details</legend>
                                    <div class="row">
                                        <!-- State Field -->
                                        <div class="col-md-3">
                                            <label for="state">State:</label>
                                            <select class="form-control" id="profile_state" name="state" required>
                                                <option value="">-- Select State --</option>
                                                <option value="State1">State1</option>
                                                <option value="State2">State2</option>
                                                <option value="State3">State3</option>
                                            </select>
                                        </div>

                                        <!-- District Field -->
                                        <div class="col-md-3">
                                            <label for="district">District:</label>
                                            <select class="form-control" id="profile_district" name="district" required>
                                                <option value="">-- Select City --</option>
                                                <option value="City1">City1</option>
                                                <option value="City2">City2</option>
                                                <option value="City3">City3</option>
                                            </select>
                                        </div>

                                        <!-- Sub District Field -->
                                        <div class="col-md-3">
                                            <label for="sub_district">Sub District:</label>
                                            <select class="form-control" id="profile_sub_district" name="sub_district" required>
                                                <option value="">-- Select City --</option>
                                                <option value="SubCity1">SubCity1</option>
                                                <option value="SubCity2">SubCity2</option>
                                                <option value="SubCity3">SubCity3</option>
                                            </select>
                                        </div>

                                        <!-- Town/Village Field -->
                                        <div class="col-md-3">
                                            <label for="town_village">Town/Village:</label>
                                            <select class="form-control" id="profile_town_village" name="town_village" required>
                                                <option value="">-- Select City --</option>
                                                <option value="Village1">Village1</option>
                                                <option value="Village2">Village2</option>
                                                <option value="Village3">Village3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Pincode Field -->
                                        <div class="col-md-3">
                                            <label for="pincode">Pincode <span class="text-danger">*</span>:</label>
                                            <input type="text" class="form-control" id="profile_pincode" name="pincode" placeholder="Pincode" required>
                                        </div>

                                        <!-- Address Field -->
                                        <div class="col-md-9">
                                            <label for="address">Address <span class="text-danger">*</span>:</label>
                                            <textarea class="form-control" id="profile_address" name="address" placeholder="Street/Village" rows="2" required></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Visit Details</legend>
                                    <div class="row">
                                        <!-- Visit Type Field -->
                                        <div class="col-md-6">
                                            <label for="visit_type">Visit Type <span class="text-danger">*</span>:</label>
                                            <select class="form-control" id="profile_visit_type" name="visit_type" required>
                                                <option value="">-- Select Type --</option>
                                                <option value="OPD">OPD</option>
                                                <option value="IPD">IPD</option>
                                                <option value="Emergency">Emergency</option>
                                            </select>
                                        </div>

                                        <!-- Patient Image Field -->
                                        <div class="col-md-6">
                                            <label for="patient_image">Patient Image:</label>
                                            <div class="row">
                                                <!-- File Input -->
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" id="profile_patient_image" name="patient_image">
                                                </div>
                                                <!-- Image Placeholder -->
                                                <div class="col-md-4 text-center">
                                                    <img id="profile_patient_image_preview" src="https://placehold.co/100" alt="Patient Image" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <!-- Link Health Record Field -->
                                        <div class="col-md-12">
                                            <label>Do You Want To Link Your Health Record With Your ABHA Address/Number <span class="text-danger">*</span>:</label>
                                            <div class="form-check-inline">
                                                <label class="radio-inline">
                                                    <input type="radio" name="link_health_record" value="yes" required> YES
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="link_health_record" value="no" required> NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
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

<script>
    function calculateAge() {
        const dob = document.getElementById("profile_dob").value;
        if (!dob) return;

        const dobDate = new Date(dob);
        const today = new Date();

        let years = today.getFullYear() - dobDate.getFullYear();
        let months = today.getMonth() - dobDate.getMonth();
        let days = today.getDate() - dobDate.getDate();

        if (days < 0) {
            months--;
            days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
        }

        if (months < 0) {
            years--;
            months += 12;
        }

        document.getElementById("profile_age_years").value = years;
        document.getElementById("profile_age_months").value = months;
        document.getElementById("profile_age_days").value = days;
    }

    function calculateDOB() {
        const years = parseInt(document.getElementById("profile_age_years").value) || 0;
        const months = parseInt(document.getElementById("profile_age_months").value) || 0;
        const days = parseInt(document.getElementById("profile_age_days").value) || 0;

        const today = new Date();
        const dob = new Date(today);

        dob.setFullYear(today.getFullYear() - years);
        dob.setMonth(today.getMonth() - months);
        dob.setDate(today.getDate() - days);

        document.getElementById("profile_dob").value = dob.toISOString().split("T")[0];
    }

    document.addEventListener("DOMContentLoaded", function() {
        const sendOtpButton = document.getElementById("sendOtpButton");
        const enterOtpSection = document.getElementById("enterOtpSection");
        const responseMessage = document.getElementById("responseMessage");
        const verifyOtpButton = document.getElementById("verifyOtpButton");

        verifyOtpButton.addEventListener("click", function() {
            const verifyOtpText = document.getElementById("verifyOtpText").value;
            //console.log("OTP Value:", verifyOtpText); // Debugging statement

            if (!verifyOtpText) {
                responseMessage.innerHTML = `<div class="alert alert-danger">Please enter the OTP.</div>`;
                return;
            }

            // Make AJAX call to fetchAbhaProfile
            fetch("<?php echo base_url('admin/Abdm/fetchAbhaProfile'); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        abha_otp: verifyOtpText
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Display success message and profile data
                        responseMessage.innerHTML = `<div class="alert alert-success">Profile fetched successfully!</div>`;
                        // Populate the form with the profile data
                        populatePatientForm(data.profile);
                    } else {
                        // Display error message
                        responseMessage.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    responseMessage.innerHTML = `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
                });
        });

        sendOtpButton.addEventListener("click", function() {
            const verifyBy = document.querySelector('input[name="verify_by"]:checked').value;
            const abhaData = document.getElementById("abha_data").value;

            // console.log("Verify By:", verifyBy);
            // console.log("ABHA Data:", abhaData);

            if (!abhaData) {
                responseMessage.innerHTML = `<div class="alert alert-danger">Please enter the required data.</div>`;
                return;
            }

            // Make AJAX call to send OTP
            fetch("<?php echo base_url('admin/abdm'); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        verify_by: verifyBy,
                        abha_data: abhaData
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show Enter OTP section
                        enterOtpSection.style.display = "block";

                        // Display success message
                        responseMessage.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    } else {
                        // Hide Enter OTP section
                        enterOtpSection.style.display = "none";

                        // Display error message
                        responseMessage.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    responseMessage.innerHTML = `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
                });
        });

        function populatePatientForm(profile) {
            // Populate fields in the Patient Registration Form
            document.getElementById("profile_abha_number").value = profile.ABHANumber || "";
            document.getElementById("profile_abha_address").value = profile.preferredAbhaAddress || "";
            document.getElementById("profile_patient_name").value = profile.name || "";
            document.getElementById("profile_gender").value = profile.gender === "M" ? "Male" : profile.gender === "F" ? "Female" : "Other";
            // Set the date in the correct format for the date input
            const dobInput = document.getElementById("profile_dob");
            if (profile.yearOfBirth && profile.dayOfBirth) {
                const formattedDate = `${profile.yearOfBirth}-${String(profile.monthOfBirth).padStart(2, '0')}-${String(profile.dayOfBirth).padStart(2, '0')}`;
                // console.log("Formatted Date:", formattedDate); // Debugging statement
                dobInput.value = formattedDate;
            } else {
                dobInput.value = ""; // Clear the field if no date is available
            }
            document.getElementById("profile_mobile_no").value = profile.mobile || "";
            document.getElementById("profile_pincode").value = profile.pincode || "";
            document.getElementById("profile_address").value = profile.address || "";

            // Populate state, district, sub-district, and town fields
            document.getElementById("profile_state").value = profile.stateName || "";
            document.getElementById("profile_district").value = profile.districtName || "";
            document.getElementById("profile_sub_district").value = profile.subdistrictName || "";
            document.getElementById("profile_town_village").value = profile.townName || "";

            // Update the patient image preview if available
            const patientImagePreview = document.getElementById("profile_patient_image_preview");
            if (profile.profilePhoto) {
                patientImagePreview.src = `data:image/jpeg;base64,${profile.profilePhoto}`;
            }
        }
    });
</script>