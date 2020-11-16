<?php

class blog extends CI_controller
{
    public function index()
    {
        $this->load->model('blog_model');
        $blogs = $this->blog_model->getAllBlogs();
        $data = array();
        $data['blogs'] = $blogs;
        $this->load->view('admin/blogg/list',$data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->model('blog_model');
        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('description','Description','trim|required');
        $this->form_validation->set_rules('author','Author','trim|required');
        if($this->form_validation->run()==true)
        {
            $form_array = array();
            $form_array['title']= $this->input->post('title');
            $form_array['description']= $this->input->post('description');
            $form_array['author']= $this->input->post('author');
            $form_array['created_at']= date('Y-m-d');
            $form_array['special']= $this->input->post('special');
            $this->blog_model->create($form_array);
            $this->session->set_flashdata('success','blog created successfully');
            redirect(base_url(). 'blog/index');
        }
        else
        {
            $this->load->view('admin/blogg/add');
        }    
    }
    function edit($id) {
        $data = array();
        $this->load->library('form_validation');
        $this->load->model('blog_model');
        $blog = $this->blog_model->getBlog($id);
        if(empty($blog)){
            $this->session->set_flashdata('success','blog not found');
            redirect(base_url(). '/blog/index');
        }
        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('description','Description','trim|required');
        $this->form_validation->set_rules('author','Author','trim|required');
        if($this->form_validation->run()==true)
        {
            $form_array = array();
            $form_array['title']= $this->input->post('title');
            $form_array['description']= $this->input->post('description');
             $form_array['author']= $this->input->post('author');
            $form_array['special']= $this->input->post('special');
            $this->blog_model->updateBlog($id,$form_array);
            $this->session->set_flashdata('success','blog updated successfully');
            redirect(base_url(). 'blog/index');
        }
        else
        {
            $data['blog'] = $blog;
            $this->load->view('admin/blogg/edit',$data);
        }    
    }
    function delete($id)
    {
        $this->load->model('blog_model');
        $blog = $this->blog_model->getBlog($id);
        if(empty($blog)){
            $this->session->set_flashdata('success','blog not found');
            redirect(base_url(). '/blog/index');
        }
        $this->blog_model->deleteBlog($id);
        $this->session->set_flashdata('success','blog deleted successfully');
        redirect(base_url(). 'blog/index');
    }
}
?>