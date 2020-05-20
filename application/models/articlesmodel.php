<?php

class Articlesmodel extends CI_Model{
	
	
public function articles_list()
	{
	   $user_id= $this->session->userdata('user_id');
	   $sql = "SELECT
					title, id
				FROM
					articles
				WHERE
					user_id=$user_id";
	   return $this->db->query($sql)->result();
	
	}
 public function add_article($array){
    return $this->db->insert('articles',$array);
 }
 public function find_article($article_id){
    $query = "SELECT
					id,title,body
				FROM
					articles
				WHERE
					id=$article_id";
	 return $this->db->query($query)->row();
	
 }
 public function update_article($article_id, Array $article){
    return $this->db
		    ->where('id',$article_id)
		    ->update('articles',$article);
	
 }
 public function delete_article($article_id){
    return $this->db->delete('articles',['id'=>$article_id]);
 }
	
}  