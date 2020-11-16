<?php 
class home extends CI_controller{
   public function index(){
        $this->load->model('blog_model');
        $this->load->helper('text');
        $data = array();
        $allBlogs = $this->blog_model->getAllBlogs();
        $featuredBlogs = $this->blog_model->getFeaturedBlogs();
        $promoBlog = $this->blog_model->getPromoBlogs();
        $data['allBlogs'] = $allBlogs;
        $data['featuredBlogs'] = $featuredBlogs;
        $data['promoBlog'] = $promoBlog;
         $this->load->view('home',$data);

}
    function blogDetails($blogId){
        $this->load->model('blog_model');
        $this->load->model('comment_model');
        $blog = $this->blog_model->getBlog($blogId);
        if (empty($blog)){
            redirect(base_url());
        }
        $data = array();
        $data['blog'] = $blog;
        $comments = $this->comment_model->getCommentsOfAblog($blogId);
        $data['comments']=$comments;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('comment','Comment','required');
        if($this->form_validation->run()== true){
            $formArray= array();
            $formArray['name']= $this->input->post('name');
            $formArray['blog_id']= $blogId;
            $formArray['comment']= $this->input->post('comment');
            $formArray['created_at']= date('Y-m-d');
        $this->comment_model->create( $formArray);
        $this->session->set_flashdata('msg','comment saved successfully');
        redirect(base_url(). 'home/blogDetails/'. $blog['blog_id']);
        }else {
            $this->load->view('detail',$data);
        }
    }
}

