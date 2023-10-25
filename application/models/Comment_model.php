<?php

class Comment_model extends CI_Model{

    function create($formArray){
        $this->db->insert('comments', $formArray);
    }

    function getAllComments(){
        $this->db->order_by('comment_id', 'DESC');
        $comments = $this->db->get('comments')->result_array();
        return $comments;
    }
    function getCommentsOfABlog($blog_id){
        $this->db->order_by('comment_id', 'DESC');
        $this->db->where('blog_id', $blog_id);
        $this->db->where('status','Active');

        $comments = $this->db->get('comments')->result_array();
        return $comments;
    }

}


?>