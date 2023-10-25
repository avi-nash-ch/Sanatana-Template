<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
        $this->load->model('Blog_model');
        $this->load->helper('text');
        $this->load->library('pagination');
    
        // Pagination Configuration
        $config['base_url'] = base_url('home/index');
        $config['total_rows'] = $this->Blog_model->countAllBlogs(); // Replace with your model method to count total blogs
        $config['per_page'] = 3; // Number of blogs per page

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = "<ul class = 'pagination' >";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li class= "page-item">';
        $config['num_tag_close'] = '</li >';
        $config['cur_tag_open'] = "<li class = 'disabled page-item' ><li class = 'active page-item' ><a href= '#' class = \"page-link\">";
        $config['cur_tag_close'] = "<span class= 'sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li class= \"page-item\">";
        $config['next_tag1_close'] = "</li>";
        $config['prev_tag_open'] = "<li class= \"page-item\">";
        $config['prev_tag1_close'] = "</li>";
        $config['first_tag_open'] = "<li class= \"page-item\">";
        $config['first_tag1_close'] = "</li>";
        $config['last_tag_open'] = "<li class= \"page-item\">";
        $config['last_tag1_close'] = "</li>";
        $config['attributes'] = array ('class' => 'page-link');

        $this->pagination->initialize($config);
    
        // Get the current page number from the URL segment
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
        // Retrieve blogs for the current page
        $data['allBlogs'] = $this->Blog_model->getBlogs($config['per_page'], $page);
    
        $data['featuredBlogs'] = $this->Blog_model->getFeaturedBlogs();
        $data['promoBlogs'] = $this->Blog_model->getPromoBlogs();
    
        $this->load->view('home', $data);
    }
    

    public function blogDetail($blogId){
        $this->load->model('Blog_model');
        $this->load->model('Comment_model');
        
        $blog = $this->Blog_model->getBlog($blogId);
        if(empty($blog)) {
            redirect(base_url());
        }
        $data = [];
        $data['blog'] = $blog;

        $comments = $this->Comment_model->getCommentsOfABlog($blogId);
        $data ['comments'] = $comments;
        

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

        if( $this->form_validation->run()== false){
            $this->load->view('detail', $data);
        }else{
            // save comment to database
            $formArray = [];
            $formArray ['name'] = $this->input->post('name');
            $formArray ['blog_id'] = $blogId;
            $formArray ['comment'] = $this->input->post('comment');
            $formArray['created_at'] = date('Y-m-d');
            
            $this->Comment_model->create($formArray);

            $this->session->set_flashdata('msg','Comment saved successfully');
            redirect(base_url('home/blogDetail/'.$blog['blog_id']));
        }

    }
    

}

?>
