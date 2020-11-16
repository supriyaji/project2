<?php 
class AdminDashboard extends CI_controller{
    function index(){
        //echo "logged in";
        //if(empty($this->session->userdata['user'])) {
        //    redirect(base_url(). 'login');
        //}
        //echo "<a href= '".base_url().'adminDashboard/signout'."'>sign out</a>";
        $this->load->view('admin/dashboard');
    }
    function signout(){
        $this->session->unset_userdata('user');
        redirect(base_url(). 'login');
    }
}
?>