<div class="col-md-4"></div>
<div class="col-md-4">
<h3>Your Skills</h3>
<p style="color:red" class="error"></p>
<?php
echo "<p id='skills'>$skills</p>";
?>
<input id="new_skill"></input><button id="add_skill">Add Skill</button>
</div>
<div class="col-md-4"></div>
<script>
$("#add_skill").on("click", function(){ 
      $.ajax({type:"POST", url: "<?=base_url()?>/index.php/addSkills/addSkill", data: { "skill_name": $("#new_skill").val()},success: function(data){
          $("#skills").append("<span skill_id='" + data.id + "'>" + data.name + " <span class='remove_skill glyphicon glyphicon-remove'></span><br></span>");
      }, dataType:"json"});   
  });
$("body").on("click", ".remove_skill", function(){
      var element = this;
      $.ajax({type:"POST", url: "<?=base_url()?>/index.php/addSkills/deleteSkill", data: {"skill_id": $(element).parent().attr("skill_id")}}); 
      $(element).parent().remove();
});
</script>
