<?php 
class Auth_model extends CI_Model{
    public function create($formArray){
        $this->db->insert('users', $formArray);
    }
    public function checkPassword($email, $password) {
        // Check if the email and password match in the 'users' table
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        // for debugging echo $this->db->last_query();

        if ($query->num_rows() == 1) {
            // Return the user data
            return $query->row();
        } else {
            // Return false if no match is found
            return false;
        }
    }
}

?>