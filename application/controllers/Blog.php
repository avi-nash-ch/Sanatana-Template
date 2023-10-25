<?php


class Blog extends CI_Controller{
    public function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

        if($this->form_validation->run()== false){
            $this->load->view('blog/add');
        }else{
            $this->load->model('Blog_model');
            $formArray = array();
            $formArray['title'] = $this->input->post('title');
            $formArray['description'] = $this->input->post('description');
            $formArray['author'] = $this->input->post('author');
            $formArray['created_at'] = date('Y-m-d');
            $formArray['special'] = $this->input->post('special');

            $this->Blog_model->create($formArray);

            $this->session->set_flashdata('msg','Blog created successfully');
            redirect(base_url('blog/index'));

        }
    }

    public function index(){

        $this->load->model('Blog_model');

        $blogs = $this->Blog_model->getAllBlogs();

        $data = [];
        $data ['blogs'] = $blogs;

        $this->load->view('blog/list', $data);
    }


    public function edit($id){

        $data =[];
        $this->load->library('form_validation');
        $this->load->model('Blog_model');

        $blog = $this->Blog_model->getBlog($id);
        if(empty($blog)){
            $this->session->set_flashdata('msg','Blog not found!');
            redirect(base_url('blog/index'));
        }

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

        if($this->form_validation->run()== false){
            $data['blog'] = $blog;
            $this->load->view('blog/edit', $data);
        }else{
            $this->load->model('Blog_model');
            $formArray = array();
            $formArray['title'] = $this->input->post('title');
            $formArray['description'] = $this->input->post('description');
            $formArray['author'] = $this->input->post('author');
            $formArray['special'] = $this->input->post('special');
            

            $this->Blog_model->updateBlog($id,$formArray);

            $this->session->set_flashdata('msg','Blog updated successfully');
            redirect(base_url('blog/index'));

        }
        
    }

    public function delete($id){

        $this->load->model('Blog_model');
        //This os use for when the id not present then we want to delete that id, then it shows Blog not found
        $blog = $this->Blog_model->getBlog($id);
        if(empty($blog)){
            $this->session->set_flashdata('msg','Blog not found!');
            redirect(base_url('blog/index'));
        }
        
        // this is for delete 
        $this->Blog_model->deleteBlog($id);
        $this->session->set_flashdata('msg','Blog deleted successfully');
        redirect(base_url('blog/index'));

    }
    
}


?>