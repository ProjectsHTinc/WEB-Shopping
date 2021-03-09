<?php
Class Promomodel extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
  }

   function create_promo($promo_title,$promo_code,$offer_percentage,$promo_description,$offer_status,$user_id){
    if(empty($promo_code)){

    }else{
      $select="SELECT * FROM promo_code WHERE promo_code='$promo_code'";
      $res=$this->db->query($select);
     if($res->num_rows()>0){
       $data = array("status" => "already");
       return $data;
     }else{

       $insert_query="INSERT INTO promo_code (promo_title,promo_code,promo_percentage,promo_description,status,created_at,created_by) VALUES('$promo_title','$promo_code','$offer_percentage','$promo_description','$offer_status',NOW(),'$user_id')";
       $res=$this->db->query($insert_query);
       $insert_id = $this->db->insert_id();
       if($res){
                $data = array("status" => "success");
                return $data;
            }else{
                $data = array("status" => "failed");
                return $data;
            }
     }

    }
   }
   function check_promo_code($promo_code,$user_id){
     $select="SELECT * FROM promo_code WHERE promo_code='$promo_code'";
     $res=$this->db->query($select);
    if($res->num_rows()>0){
      echo "false";
    }else{
      echo "true";
    }
   }

  function check_promo_code_exist($promo_id,$promo_code,$user_id){
     $id=base64_decode($promo_id)/9876;
     $select="SELECT * FROM promo_code WHERE promo_code='$promo_code' AND id!='$id'";
     $res=$this->db->query($select);
    if($res->num_rows()>0){
      echo "false";
    }else{
      echo "true";
    }
   }

   function get_all_promocodes(){
     $select="SELECT * FROM promo_code ORDER BY id DESC";
     $res=$this->db->query($select);
      return $res->result();
   }

   function get_promocode($promo_id){
       $id=base64_decode($promo_id)/9876;
       $select="SELECT * FROM promo_code WHERE id ='$id'";
       $res=$this->db->query($select);
       return $res->result();
   }

   function update_promo($promo_id,$promo_title,$promo_code,$offer_percentage,$promo_description,$offer_status,$user_id){
		
		$update = "UPDATE promo_code SET promo_title='$promo_title',promo_code='$promo_code',promo_percentage='$offer_percentage',promo_description='$promo_description',status='$offer_status',updated_at=NOW(),updated_by='$user_id' WHERE id='$promo_id'";
		$res=$this->db->query($update);
		
		if($res){
			$data = array("status" => "success");
			return $data;
		}else{
			$data = array("status" => "failed");
			return $data;
		}
  }

}
