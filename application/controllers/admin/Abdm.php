<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Abdm extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Enc_lib');
        $this->load->library('datatables');
        $this->config->load("payroll");
        $this->config->load("image_valid");
        $this->config->load("mailsms");
        $this->load->model('transaction_model');
        $marital_status = $this->config->item('marital_status');
        $bloodgroup     = $this->config->item('bloodgroup');
        $this->load->library('Customlib');
        $this->load->helper('customfield_helper');
        $this->load->helper('custom_helper');
    }

    public function index()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST')
		{
		   
            $verify_by=$this->input->post('verify_by');
		    $abha_data=$this->input->post('abha_data');

            $encryptedOutput=getRsaEncryptedOutput($abha_data);
          
            $url=ABHA_BASE_URL."/v3/profile/login/request/otp";
            
            switch($verify_by)
            {
                case "abha_no":
                    $data=array("scope" => array("abha-login","aadhaar-verify"),"loginHint" => "abha-number","loginId" => $encryptedOutput,"otpSystem" => "aadhaar");
                break;
                    
                case "mobile_no":
                    $data=array("scope" => array("abha-login","mobile-verify"),"loginHint" => "mobile","loginId" => $encryptedOutput,"otpSystem" => "abdm");
                break;
                
                case "aadhar_no":
                    $data=array("scope" => array("abha-login","aadhaar-verify"),"loginHint" => "aadhaar","loginId" => $encryptedOutput,"otpSystem" => "aadhaar");
                break;
                
                case "biometric":
                    $data=array("scope" => array("abha-login","aadhaar-bio-verify"),"loginHint" => "abha-number","loginId" => $encryptedOutput,"otpSystem" => "aadhaar");
                break;
            }
               
            $random_request_id=generateRequestId();
               
            //date_default_timezone_set('Asia/Kolkata');
			$timestamp = time();  // Unix timestamp (seconds)
            $microseconds = microtime(true) - $timestamp;
            $utc_date = gmdate('Y-m-d\TH:i:s', $timestamp);
            $milliseconds = round($microseconds * 1000);  // Convert to milliseconds
            $timestamp =  $utc_date . '.' . sprintf('%03d', $milliseconds).'Z';
    
            $accessToken=getAccessToken();
            
            
            $headerSet=array("Content-Type:application/json","REQUEST-ID:$random_request_id","TIMESTAMP:$timestamp","Authorization:Bearer $accessToken");
        	$response=callAbhaAPI('POST',$url,$headerSet,$data);

        	$response_code=$response['response_code'];
            $response_body=$response['response_body'];
            $data = json_decode($response_body, true);
            
            if($response_code=="200")
            {
                $transactionId=$data['txnId'];
                $message=$data['message'];
                $this->session->set_userdata('abha_verification_method',$verify_by);
                $this->session->set_userdata('abhaTransactionId',$transactionId);
                $this->session->set_flashdata('success',$message);

                redirect(base_url().'admin/abhavalidation/abhaOtpVerification');
            }
            else if($response_code=="401")
            {
                $message=$data['description'];
                $this->session->set_flashdata('error',$message);
                redirect(base_url().'admin/abhavalidation/abhanumberverification');
            }
            else
            {
                $message="Invalid LoginId";
                $this->session->set_flashdata('error',$message);
                redirect(base_url().'admin/abhavalidation/abhanumberverification'); 
            }
   
            exit;
		}
		
		
        $this->session->set_userdata('top_menu', 'abdm');
        $this->session->set_userdata('sub_menu', '');
        $role                        = $this->customlib->getStaffRole();
        $role_id                     = json_decode($role)->id;
        $staffid                     = $this->customlib->getStaffID();
        $notifications               = $this->notification_model->getUnreadStaffNotification($staffid, $role_id);
        $data['notifications']       = $notifications;
        $systemnotifications         = $this->notification_model->getUnreadNotification();
        $data['systemnotifications'] = $systemnotifications;

        //$data['mysqlVersion'] = $this->setting_model->getMysqlVersion();
        //$data['sqlMode']      = $this->setting_model->getSqlMode();
        //$data['jsonarr']      = $jsonarr;
    
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('admin/abdm/main-layout', $data);
        $this->load->view('layout/footer', $data);
    }

}
