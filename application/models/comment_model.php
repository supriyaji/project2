<?php 

class comment_model extends CI_model
{
    function create($formArray){
        $this->db->insert('comments',$formArray);
    }
    function getAllComments(){
        $this->db->order_by('comment_id', 'DESC');
        $comments = $this->db->get('comments')->result_array();
        return $comments;
    }
    function getCommentsOfAblog($blog_id){
        $this->db->order_by('comment_id', 'DESC');
        $this->db->where('blog_id',$blog_id);
        $this->db->where('status','Active');
        $comments = $this->db->get('comments')->result_array();
        return $comments;
    }
    function updateComment($id,$array){
        $this->db->where('comment_id',$id);
        $this->db->update('comments',$array);

    }
    function getComment($id){
        $this->db->where('comment_id',$id);
        $comment = $this->db->get('comments')->row_array();
        return $comment;
    }
    function deleteComment($id){
        $this->db->where('comment_id',$id);
        $this->db->delete('comments');
    }
}
?>