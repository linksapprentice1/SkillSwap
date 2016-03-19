<?php

Class Skills extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function usersBySkill($skill_name, $limit, $offset){
    $user_result = $this->db->query("SELECT User.id, username, description, image, age, gender, zip, group_concat(Skill.name separator ', ') as skills FROM User LEFT JOIN UserSkill ON User.id = UserSkill.user_id LEFT JOIN Skill ON UserSkill.skill_id = Skill.id  WHERE Skill.name LIKE ? group by User.id LIMIT ?,?;", array("%".$skill_name."%", $offset, $limit));
    return array("users"=> $user_result->result());
  }
  public function usersByDesiredSkill($skill_name, $limit, $offset){
    $user_result = $this->db->query("SELECT User.id, username, description, image, age, gender, zip, group_concat(Skill.name separator ', ') as skills FROM User LEFT JOIN UserDesiredSkill ON User.id = UserDesiredSkill.user_id LEFT JOIN Skill ON UserDesiredSkill.skill_id = Skill.id  WHERE Skill.name LIKE ? group by User.id LIMIT ?,?;", array("%".$skill_name."%", $offset, $limit));
    return array("users"=> $user_result->result());
  }
  public function topSkills(){
    $top_skills= $this->db->query("SELECT Skill.name as skill FROM `UserSkill` JOIN `Skill` on UserSkill.skill_id = Skill.id group by Skill.id order by count(Skill.id) desc limit 5");
   return $top_skills->result();
  }
  public function topDesiredSkills(){
    $top_skills= $this->db->query("SELECT Skill.name as skill FROM `UserDesiredSkill` JOIN `Skill` on UserDesiredSkill.skill_id = Skill.id group by Skill.id order by count(Skill.id) desc limit 5"); 
    return $top_skills->result();
  }
  public function topSkillsAndDesiredSkills(){
    return array("top_skills"=>$this->topSkills(), "top_desired_skills"=> $this->topDesiredSkills());
  }
}


?>
