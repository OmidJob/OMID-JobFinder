<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
* 	@author : Milad Ranaei & Azam Feyznia
* 	12th July, 2017
* 	Omid Team
* 	www.Omid.com
*/

class Login extends CI_Controller {
      function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->database();
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2017 05:00:00 GMT");
      }

      //show index page 
      public function index() {
        if($this->session->userdata('LoggedIn'))
        {
          $SessionData = $this->session->userdata('LoggedIn');
          $AccountType = $SessionData['PersonTypeId'];
          redirect(ucfirst($AccountType).'/Dashboard', 'refresh');
        }
        $this->load->view('omid/Login');
      }

      //Function for resive data username && password 
      public function CheckInfo() {
         $this->form_validation->set_rules('Email', 'ایمیل', 'trim|required|valid_email',
           array(
               'required' => 'وارد کردن %s الزامی است.',
               'valid_email' => '%s  وارد شده صحیح نیست.'
           )
         );
         $this->form_validation->set_rules('Password', 'کلمه عبور', 'trim|required',
             array('required' => 'وارد کردن %s الزامی است.'));

         $this->form_validation->set_rules('AccountType', 'ورود به عنوان', 'callback_LoginInfoCheck');

         if ($this->form_validation->run() == FALSE) {
            $this->load->view('omid/login');
         }
         else
         { 
             redirect('Login', 'refresh');
         }
      }
      // check if username && password is correct
      public function LoginInfoCheck()
      {
        //insert LoginModel
       $this->load->model('LoginModel');
       //End

       $data = array(
           'Email' => $this->input->post('Email'),
           'PSWD1' => $this->input->post('Password'),
           'PersonTypeId' => $this->input->post('AccountType')
       );
       $user =$this->LoginModel->CheckInfo($data);
       if($user)
         {

         // set cookie for every user
         $AccountType = $this->input->post('AccountType');
         $login_text = $AccountType .'_IsLogin';
         $cookie_value = $this->encryption->encrypt($login_text);
         $remember = $this->input->post('remember_me');
         if ($remember == 'accept') {
            $date_cookie = array(
              'name' => 'omidportal',
              'value' => $cookie_value,
              'expire' => time()+60*60*24*365
            );
            $this->input->set_cookie($date_cookie);
          }
          $SessionArray = array();
          foreach($user as $row)
          {
           $SessionArray = array(
               'UserId' => $row->UserId,
               'Email' => $row->Email,
               'PersonTypeId' => $row->PersonTypeId
           );
           $this->session->set_userdata('LoggedIn', $SessionArray);
          }
          return TRUE;
         }
         else{
            $this->form_validation->set_message('LoginInfoCheck', 'ایمیل یا کلمه عبور وارد شده معتبر نیست.');
            return false;
         }
      }

    // forgot password
      public function Forgot(){
          $this->load->library('form_validation');
          $this->load->helper('form');
          $data['success'] = false;
          $data['error'] = '';
          $error = '';
          $data['error1'] = '';
          $error1 = '';

          // config email for send
          $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => 'ranaei.milad72@gmail.com',
              'smtp_pass' => '00951198',
              'charset'   => 'iso-8859-1',
              'mailtype' => 'html',
              'charset'  => 'utf-8',
              'priority' => '1'
          );
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          // End config email

          $this->form_validation->set_rules('Emailrecovery', 'ایمیل', 'trim|required|valid_email|callback_email_exists');
          if($this->form_validation->run()){
            $email = $this->input->post('Emailrecovery');

            //Random code
            //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
            $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
            $QuantidadeCaracteres = strlen($Caracteres);
            $QuantidadeCaracteres--;
            $Hash=NULL;
            for($x=1;$x<=100;$x++){
                $Posicao = rand(0,$QuantidadeCaracteres);
                $Hash .= substr($Caracteres,$Posicao,1);
            }
            $slug = $Hash;
            $insert_slug = array(
                'Reset_Email' => $email,
                'Token' => $slug
            );
            $this->db->insert('reset_password', $insert_slug);

            // send email
            $this->email->from('owncloud1372@gmail.com', 'Omid Portal'); // Change these details
            $this->email->to($email);
            $this->email->subject('بازیابی رمز عبور سیستم امید');
            $data['message_body'] = site_url('login/reset/'. $slug);
            $message = $this->load->view('omid/emailcover', $data, TRUE);
            $this->email->message($message);
            if (!$this->email->send()){
              $error = 'خطایی در ارسال ایمیل به وجود امده . لطفا دوباره تلاش فرمایید';
            }
            else
              $error1 = 'ایمیل با موفقیت ارسال گردید';
            $data = array('success'=> true , 'error' => $error, 'error1' => $error1);
          };
          $this->load->view('omid/forgot', $data);
      }

    /**
     * CI Form Validation callback that checks a given email exists in the db
     *
     * @param string $email the submitted email
     * @return boolean returns false on error
     */

      public function email_exists($email)
      {
        $this->load->model('LoginModel');
        if($this->LoginModel->get_user_by_email($email)){
            return true;
        } else {
            $this->form_validation->set_message('email_exists', 'اکانتی با این ایمیل یافت نشد . لطفا ایمیل درست را وارد نمایید');
            return false;
        }
      }

    /**
     * Reset password page
     */
    public function reset()
    {
        $data['error'] = '';
        $error = '';
        $data['success'] = false;

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]',
            array(
            'required' => 'وارد کردن رمزعبور الزامی است.',
            'min_length' => 'رمز عبور باید بیشتر از ۳ کاراکتر باشد'
        ));
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required|matches[password]',
            array(
            'matches' => 'رمزعبور جدید با تکرار آن همخوانی ندارد',
        ));

        if($this->form_validation->run()){
          // این قسمت چک میکند که اگر کد هش شده پاک گردید خطا را نمایش دهد
          $hash = $this->uri->segment(3);
          if(!$hash) {$error = 'لینک نامعتبر هست';}

          $this->load->model('LoginModel');
          $random_link = $this->LoginModel->get_user($hash);
          if(!$random_link) $error = 'لینک نامعتبر میباشد';


          $token = $this->uri->segment(3);
          $UpPass = array(
              'PSWD1' => SHA1(MD5($this->input->post('password'))),
          );

          $this->db->where('Token',$token);
          $query =$this->db->get('reset_password');
          $user=$query->result();
          if($user){
              $this->db->trans_start();
              $this->db->set($UpPass);
              $this->db->where("Email", $user[0]->Reset_Email);
              $this->db->update("accounts", $UpPass);
              $this->db->trans_complete();
              if ($this->db->trans_status() === FALSE)
              {
                  $error = 'خطا در به روز رسانی رمز عبور . لطفا مجددا تلاش فرمایید';
              }
              else {
                  // delete Email from table "reset_passwork"
                  $delete_account_reset_table = array('Token' => $token);
                  $res = $this->db->delete('reset_password', $delete_account_reset_table);
                  if ($res) redirect('Login', 'refresh');
              }

          }
      };

      $data = array('success'=> true , 'error' => $error);
      $this->load->view('omid/reset_password', $data);
    }
      // logout
    function Logout()
    {
        $this->session->unset_userdata('LoggedIn');
        $this->session->sess_destroy();
        $this->session->set_flashdata('LogoutNotification', 'LoggedOut');
        redirect(base_url().'index.php/Login' , 'refresh');
    }




   }
?>
