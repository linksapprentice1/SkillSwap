<?php

Class User extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function dataWithSkills($user_id) {
    $user_result= $this->db->query("SELECT username, description, image, age, gender, zip, group_concat(Skill.name separator ', ') as skills FROM User LEFT JOIN UserSkill ON User.id = UserSkill.user_id LEFT JOIN Skill ON UserSkill.skill_id = Skill.id group by User.id HAVING User.id = ?", array($user_id)); 
   if ($user_result->row()!=null){
         $desired_skills=$this->db->query("SELECT group_concat(Skill.name separator ', ') as skills FROM User LEFT JOIN UserDesiredSkill ON User.id = UserDesiredSkill.user_id LEFT JOIN Skill ON UserDesiredSkill.skill_id = Skill.id group by User.id HAVING User.id = ?", array($user_id)); 
       if($desired_skills->row()!=null){
             $desired_skills = $desired_skills->row()->skills;
       }
       else
             $desired_skills="";
       $user_result = $user_result->row();
       $data= array("user_name" => $user_result->username, "user_img" => $user_result->image,"description" => $user_result->description,"skills"=> $user_result->skills, "age"=>$user_result->age, "gender"=>$user_result->gender, "zip"=>$user_result->zip, "desired_skills"=>$desired_skills);
       return $data;
    }
    return null;
  } 
  public function dataWithoutSkills($user_id){
    $user_result= $this->db->query("SELECT username, description, image, age, gender, zip FROM User WHERE User.id = ?", array($user_id));
   if ($user_result->row()!=null){
       $user_result = $user_result->row();
       $data= array("user_name" => $user_result->username, "user_img" => $user_result->image,"description" => $user_result->description, "age" =>$user_result->age, "gender"=>$user_result->gender, "zip"=>$user_result->zip);
       return $data;
    }
    return null;
  }
  public function editWithoutSkills($user_id, $data){
    $this->db->where('id', $user_id);
    $this->db->update("User", $data);
  }
  public function exists($username){
    $user_result = $this->db->query("SELECT username FROM User where username=?", array($username));
    return $user_result->row() != null;
  }
  public function skills($user_id){
      $query= $this->db->query("SELECT group_concat( concat( ' <span skill_id=\"', Skill.id, '\">', Skill.name, ' <span class=\"remove_skill glyphicon glyphicon-remove\"></span><br></span>') SEPARATOR '' ) as skills FROM `UserSkill` JOIN `Skill` ON UserSkill.skill_id = Skill.id group by UserSkill.user_id having UserSkill.user_id = ?", array($user_id));
    if ($query->num_rows()==0)
       return "";
    return $query->row()->skills; 
  }
  public function skillsDesired($user_id){
     $query= $this->db->query("SELECT group_concat( concat( ' <span skill_id=\"', Skill.id, '\">', Skill.name, ' <span class=\"remove_skill glyphicon glyphicon-remove\"></span><br></span>') SEPARATOR '' ) as skills FROM `UserDesiredSkill` JOIN `Skill` ON UserDesiredSkill.skill_id = Skill.id group by UserDesiredSkill.user_id having UserDesiredSkill.user_id = ?", array($user_id));
    if ($query->num_rows()==0)
       return "";
    return $query->row()->skills; 
  }
  public function addSkill($user_id, $skill_name){
      $this->db->where('name', $skill_name);
      $query = $this->db->get("Skill");
      if ($query->num_rows() == 0){
        $this->db->insert('Skill', array("name"=>$skill_name));
        $skill_id = $this->db->insert_id();
      }
      else
        $skill_id = $query->row()->id;
      $this->db->insert('UserSkill', array("user_id"=>$user_id, "skill_id"=>$skill_id));   
     return $skill_id;
 }

  public function addDesiredSkill($user_id, $skill_name){
      $this->db->where('name', $skill_name);
      $query = $this->db->get("Skill");
      if ($query->num_rows() == 0){
        $this->db->insert('Skill', array("name"=>$skill_name));
        $skill_id = $this->db->insert_id();
      }
      else
        $skill_id = $query->row()->id;
      $this->db->insert('UserDesiredSkill', array("user_id"=>$user_id, "skill_id"=>$skill_id));   
       return $skill_id;
 }

  public function deleteSkill($user_id, $skill_id){
      $this->db->delete("UserSkill", array("user_id"=>$user_id, "skill_id"=>$skill_id));
/*      $this->db->where("skill_id", $skill_id);
      $query= $this->db->get("UserSkill");
      if ($query->num_rows()==0){
         $this->db->delete("Skill", array("skill_id"=$skill_id));
      }
*/
  }
  public function deleteDesiredSkill($user_id, $skill_id){
     $this->db->delete("UserDesiredSkill", array("user_id"=> $user_id, "skill_id"=>$skill_id));
  }
  
}


?>
