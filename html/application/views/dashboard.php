<style>
 .profile{
    margin:0 auto;
  }
  .profile h4, .profile h1, .profile{
    text-align:center;
  }
  tr{
      cursor:pointer; cursor:hand;
  }
</style>
<div class="col-md-4"></div>
<div class="col-md-4">
<h3>Top Skills</h3>
<div class="table-responsive">
  <table class="table table-hover skills">
<?php
foreach ($top_skills as $index=>$skill){
 echo "<tr><td>" . ($index + 1) . "</td><td class='skill'>$skill->skill<td><tr>";
}
?>
  </table>
</div>
<h3>Top Desired Skills</h3>
<div class="table-responsive">
  <table class="table table-hover desired_skills">
<?php
foreach ($top_desired_skills as $index=>$skill){
  echo "<tr><td>" . ($index + 1) . "</td><td class='skill'>$skill->skill<td><tr>";
}
?>
  </table>
</div>
</div>
<div class="col-md-4"></div>
<script>
$(".skills td").on("click", function(){
var skill_name = $(this).parent().find(".skill").text(); 
$(".search_by_skill").find("[name=skill_name]").val(skill_name);
$(".search_by_skill").submit();
});
$(".desired_skills td").on("click", function(){
var skill_name = $(this).parent().find(".skill").text();
$(".search_by_desired_skill").find("[name=skill_name]").val(skill_name);
$(".search_by_desired_skill").submit();
});
</script>
