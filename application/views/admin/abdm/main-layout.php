
<style>
.m0
{
  margin:0px !important;  
}

.ml-30
{
    margin-left:30px!important;
}

.mt-15
{
    margin-top:15px!important;
}

.mb-15
{
    margin-bottom:15px!important;
}

.pl-0
{
    padding-left:0px !important;
}

.font-bold
{
    font-weight:bold!important;
}

.validation-form-box
{
    background:#eee;
    padding:5%;
    border-radius:5px;
}

.sidebar-profile
{
    background:#eee;
    padding:0px;
    border-radius:5px;  
}

.profile-img img
{
    width:100%;
}

.profile-work
{
    padding:15px 10px;
}

.profile-work ul
{
    padding-left: 4px;
    list-style: none;
}

.profile-work ul li
{
    padding: 10px 0;
    border-bottom:1px solid #ddd;
}

.profile-work ul li a
{
    text-decoration:none;
    color:#000;
}
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="row">

        <div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#registration" data-toggle="tab">Registration</a>
        </li>
        <li>
            <a href="#verification" data-toggle="tab">Verification</a>
        </li>
        <li>
            <a href="#createabha" data-toggle="tab">Create ABHA</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <!-- Registration Tab -->
    <div class="tab-pane fade in active" id="registration">
        <?php $this->load->view('admin/register/abha-register-with-adhar'); ?>
    </div>

    <!-- Verification Tab -->
    <div class="tab-pane fade" id="verification">
        <?php $this->load->view('admin/abdm/abha-number-validation'); ?>
    </div>

    <!-- Create ABHA Tab -->
    <div class="tab-pane fade" id="createabha">
        <?php $this->load->view('admin/register/abha-register-with-adhar'); ?>
    </div>
</div>
           
            
                   
        </div><!--./row-->
       
     
    </section>
</div>
  
 
<script>
 function selectVerificationMethod(vl)
 {
     switch(vl)
     {
         case "abha_no":
             document.getElementById("abha_data").placeholder = "Enter your ABHA number";
             document.getElementById("noteMsg").style.display = "none";
             //document.getElementById("methodText").innerHTML = "ABHA Number";
         break;
         
         case "mobile_no":
             document.getElementById("abha_data").placeholder = "Enter your registered mobile number";
             document.getElementById("noteMsg").style.display = "block";
            // document.getElementById("methodText").innerHTML = "Mobile Number";
         break;
         
         case "aadhar_no":
             document.getElementById("abha_data").placeholder = "Enter your Aadhar number";
             document.getElementById("noteMsg").style.display = "none";
             //document.getElementById("methodText").innerHTML = "Aadhar Number";
         break;
         
         case "biometric":
             document.getElementById("abha_data").placeholder = "Enter your ABHA number";
             document.getElementById("noteMsg").style.display = "none";
             //document.getElementById("methodText").innerHTML = "ABHA Number";
         break;
     }
 }
</script>