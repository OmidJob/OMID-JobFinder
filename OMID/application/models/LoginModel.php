<?php
   class LoginModel extends CI_Model {

      function __construct() {
         parent::__construct();
      }

      public function CheckInfo($data) {
        $this->db->where("Email", $data['Email']);
        $this->db->where("PSWD1", SHA1(MD5($data['PSWD1'])));
        $this->db->where("PersonTypeId", $data['PersonTypeId']);

        $query = $this->db->get("accounts");
        if ($query->num_rows() == 1){
            $user =$query->result();
            foreach($user as $row)
            {
                if($row->Disabled=="NO")
                    return $user;
                $this->db->where("UserId", $row->UserId);
                $this->db->order_by("DeactiveId", "desc");
                $this->db->limit(1);
                $query = $this->db->get("deactiveinfo");
                $DeactiveInfo =$query->result();
                foreach($DeactiveInfo as $DeactiveRow)
                {
                    if($DeactiveRow->DeactiveReason=="TEMPORARY"){
                        $UserData = array(
                            'Disabled' => 'NO'
                        );
                        $this->db->set($UserData);
                        $this->db->where("omidframework.accounts.Email",  $data['Email']);
                        $this->db->update("omidframework.accounts", $UserData);
                        return $user;
                    }
                    return false;
                }
                return false;

            }


          }
          return false;
      }
       public function get_user_by_email($email)
       {
           $query = $this->db->get_where('accounts', array('Email' => $email));
           if($query->num_rows()) return $query->row();
           return false;
       }
       public function get_user($hash)
       {
           $query = $this->db->get_where('reset_password', array('Token' => $hash));
           if($query->num_rows()) return $query->row();
           return false;
       }




   }
?>
