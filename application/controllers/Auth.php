<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function register()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Enter Username', 'required');
        $this->form_validation->set_rules('email', 'Enter Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Enter Password', 'required');
        
        $this->form_validation->set_error_delimiters('<P class="invalid-feedback">', '</p>');
        
        if($this->form_validation->run()== false){
            $this->load->view('signup');
        }else{
            $this->load->model('Auth_model');
            $formArray = array ();
            $formArray['username'] = $this->input->post('username');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = sha1($this->input->post('password'));
            $formArray['status'] = ' 1';
            $this->Auth_model->create($formArray);

            $this->session->set_flashdata ('msg', 'Register Successfully');
            redirect(base_url('auth/register'));
        }
	}

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('signin'); // Load the login form
            } else {
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));
            $this->load->model('Auth_model');
            $status = $this->Auth_model->checkPassword($email, $password);
        
            if ($status != false) {
                $username = $status->username;
                $session_data = array(
                'username' => $username,
                'email' => $email,
                );
                $this->session->set_userdata('UserLoginSession', $session_data);
                redirect(base_url('auth/dashboard')); // Redirect to the dashboard
            } else {
                $this->session->set_flashdata('msg', 'Email or Password is Wrong');
                redirect(base_url('auth/login')); // Redirect back to the login page with an error message
            }
        }
    
    }
    public function dashboard(){
        $this->load->view('dashboard');
    }

    public function logout(){
        session_destroy();
        redirect(base_url('auth/register')); 
    }
    
}
?>