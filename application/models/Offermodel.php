<?php
Class Offermodel extends CI_Model
{

  public function __construct()
  {
		parent::__construct();
		$this->load->model('notificationmodel');
  }



   function create_offer($prod_id,$offer_name,$offer_percentage,$prod_actucal_price,$offer_price,$ad_img,$offer_status,$notiication_status,$user_id){
    if(empty($prod_id)){

    }else{
      $select="SELECT * FROM product_offer WHERE product_id='$prod_id'";
      $res=$this->db->query($select);
     if($res->num_rows()>0){
       $data = array("status" => "already");
       return $data;
     }else{

       //---Update to Product table----//
       $update="UPDATE products SET offer_status='1',offer_percentage='$offer_percentage' WHERE id='$prod_id'";
       $res_up=$this->db->query($update);

       $insert_query="INSERT INTO product_offer (product_id,offer_name,offer_price,prod_actual_price,offer_percentage,offer_image,status,created_at,created_by) VALUES('$prod_id','$offer_name','$offer_price','$prod_actucal_price','$offer_percentage','$ad_img','$offer_status',NOW(),'$user_id')";
       $res=$this->db->query($insert_query);
       $insert_id = $this->db->insert_id();

	     $select="SELECT * FROM product_offer WHERE product_id='$insert_id'";
		$res=$this->db->query($select);
		if($res->num_rows()>0){
				foreach ($res->result() as $rows)
				{
					$product_id = $rows->id;
					$offer_image = $rows->offer_image;
					$offer_name = $rows->offer_name;
					$offer_picture = base_url().'assets/offers/'.$offer_image;
				}
		}
		
		if ($notiication_status == 'Y'){
			 $select="SELECT A.cus_id, B.first_name, A.mob_key, A.mobile_type, B.notification_status FROM cus_notification_master A, customer_details B WHERE A.cus_id = B.customer_id AND B.notification_status ='Y'";
			$res=$this->db->query($select);
			if($res->num_rows()>0){
				foreach ($res->result() as $rows)
				{
					echo $cus_id = $rows->cus_id;
					echo $first_name = $rows->first_name;
					echo $gcm_key = $rows->mob_key;
					echo $mobile_type = $rows->mobile_type;
				    $this->notificationmodel->sendOfferNotification($offer_name,$gcm_key,$mobile_type,$product_id,$offer_picture);
				}
			}
		}
		
		$insert_query_history="INSERT INTO product_offer_history (product_id,offer_prod_id,offer_name,offer_price,prod_actual_price,offer_percentage,status,created_at,created_by) VALUES('$prod_id','$insert_id','$offer_name','$offer_price','$prod_actucal_price','$offer_percentage','$offer_status',NOW(),'$user_id')";
       $res=$this->db->query($insert_query_history);
	   
	   
	   
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
   function check_offer_product($prod_id,$user_id){
     $select="SELECT * FROM product_offer WHERE product_id='$prod_id'";
     $res=$this->db->query($select);
    if($res->num_rows()>0){
      echo "false";
    }else{
      echo "true";
    }
   }

  function check_offer_product_exist($offer_id,$prod_id,$user_id){
     $id=base64_decode($offer_id)/9876;
     $select="SELECT * FROM product_offer WHERE product_id='$prod_id' AND id!='$id'";
     $res=$this->db->query($select);
    if($res->num_rows()>0){
      echo "false";
    }else{
      echo "true";
    }
   }

   function get_all_offer_product(){
     $select="SELECT p.product_name,p.prod_actual_price,po.* FROM product_offer  AS po LEFT JOIN products AS p ON p.id=po.product_id ORDER BY po.id DESC";
     $res=$this->db->query($select);
      return $res->result();
   }

   function get_offer_product($offer_id){
       $id=base64_decode($offer_id)/9876;
       $select="SELECT p.product_name,p.prod_actual_price,po.* FROM product_offer  AS po LEFT JOIN products AS p ON p.id=po.product_id WHERE po.id='$id'";
       $res=$this->db->query($select);
       return $res->result();
   }

   function update_offer($prod_id,$offer_name,$offer_percentage,$prod_actucal_price,$offer_price,$ad_img,$offer_status,$user_id,$prod_offer_token){
		$id=base64_decode($prod_offer_token)/9876;
		$update="UPDATE product_offer SET product_id='$prod_id',offer_name='$offer_name',offer_price='$offer_price',offer_percentage='$offer_percentage',offer_image='$ad_img',status='$offer_status',updated_at=NOW(),updated_by='$user_id' WHERE id='$id'";
		$res=$this->db->query($update);

		$insert_query_history="INSERT INTO product_offer_history (product_id,offer_prod_id,offer_name,offer_price,offer_percentage,prod_actual_price,status,created_at,created_by) VALUES('$prod_id','$id','$offer_name','$offer_price','$offer_percentage','$prod_actucal_price','$offer_status',NOW(),'$user_id')";
		$res=$this->db->query($insert_query_history);

		if($offer_status=='Active'){
			
			$check_status ="SELECT * FROM products WHERE offer_status = '1'";
			$o_status = $this->db->query($check_status);
			if($o_status->num_rows()>0){
				foreach ($o_status->result() as $rows)
				{
				  $product_id = $rows->id;
				}
					if ($product_id != $prod_id)
					{
					  $update="UPDATE products SET offer_status='0',offer_percentage='0'";
					  $res_up=$this->db->query($update); 
					  
					  $update="UPDATE products SET offer_status='1',offer_percentage='$offer_percentage' WHERE id='$prod_id'";
					  $res_up=$this->db->query($update); 
					}
			 }	 else {

					$update="UPDATE products SET offer_status='1',offer_percentage='$offer_percentage' WHERE id='$prod_id'";
					$res_up=$this->db->query($update);
			 }
		}
 			 
		if($offer_status=='Inactive'){
			  $update="UPDATE products SET offer_status='0',offer_percentage='0' WHERE id='$prod_id'";
			  $res_up=$this->db->query($update);
		}
		if($res){
			$data = array("status" => "success");
			return $data;
		}else{
			$data = array("status" => "failed");
			return $data;
		}
  }

}
