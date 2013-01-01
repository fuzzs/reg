<?php


require_once APPPATH.'/controllers/Controls/LoginControl.php';
/**
 * Description of LoginAjaxController
 *
 * @author fuzzes
 */
class LoginAjaxController extends Controls\LoginControl 
{
    function LoginAjaxController()
    {
        parent::__construct();
    }
    
    public function login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        
        $ret = $this->loginBase($email, $password);
        
        if ($ret->HasError)
        {
            $this->load->view('ajax/Error', $ret->Data);
        }
        else
        {
            $this->load->view('ajax/UserConnect.php', $ret->Data);
        }
        
    }
    
    public function logoff()
    {
        $this->logoffBase();
    }
}

?>
