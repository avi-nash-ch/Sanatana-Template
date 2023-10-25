<?php


class Blog_model extends CI_Model{

    function create($formArray){
        $this->db->insert('blogs', $formArray);
    }

    function getAllBlogs(){
        $this->db->order_by('blog_id', 'DESC');
        $blogs = $this->db->get('blogs')->result_array();
        return $blogs;
    }
    function updateBlog($id,$array){
        $this->db->where('blog_id', $id);
        $this->db->update('blogs',$array);
    }

    function getBlog($id){
        $this->db->where('blog_id', $id);
        $blog = $this->db->get('blogs')->row_array();
        return $blog;
    }

    function deleteBlog($id){
        $this->db->where('blog_id',$id);
        $this->db->delete('blogs');
    }

    function getFeaturedBlogs(){
        $this->db->where('special', 'featured');
        $this->db->order_by('blog_id', 'DESC');
        $blogs = $this->db->get('blogs')->result_array();
        return $blogs;
    }
    function getPromoBlogs(){
        $this->db->where('special', 'promo');
        $this->db->order_by('blog_id', 'DESC');
        $this->db->limit(1);
        $blogs = $this->db->get('blogs')->row_array();
        return $blogs;
    }

    function countAllBlogs() {
        // Replace with your database query to count total blogs
        return $this->db->count_all('blogs'); // Replace 'blogs' with your table name
    }
    
    function getBlogs($limit, $offset) {
        // Replace with your database query to retrieve blogs with LIMIT and OFFSET
        $this->db->limit($limit, $offset);
        $this->db->order_by('blog_id', 'DESC'); // Order blogs by date in descending order
        $query = $this->db->get('blogs'); // Replace 'blogs' with your table name
        return $query->result_array();
    }
    
    
}


?>