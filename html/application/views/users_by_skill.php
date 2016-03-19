<style>
 .profile{
    margin:0 auto;
  }
  .profile h4, .profile h1, .profile{
    text-align:center;
  }
</style>
<?php
if (sizeof($users)== 0)
   echo "<p style='text-align:center'>No matching users found.</p>";
foreach ($users as $user){
?>
<div class="profile">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3">
           <?php if (isset($user->image) && $user->image==1){
              echo "<a href='/index.php/profile/index/$user->id'><img height='100' width='100' src='/uploads/$user->username.jpg'></a>";
           }?>
</div> 
<div class="col-md-3">
  <h3><?php echo "<a href='/index.php/profile/index/$user->id'>" . htmlspecialchars($user->username) . "</a>"; ?></h3>
    <div>
        <?php
        if ($skills_desired == false && isset($user->skills) && strlen($user->skills)>0){
           echo "<h4>I can help you with</h4>";
           echo htmlspecialchars($user->skills);
        }
        if ($skills_desired == true && isset($user->skills) && strlen($user->skills)>0){
           echo "<h4>Looking for people with</h4>";
           echo htmlspecialchars($user->skills);
        }
        ?>
        
        </ul>
    </div>

  </div>
<div class="col-md-3"></div>
</div>
</div>
<br>
<?php 
}
?>
