<style>
 .profile{
    margin:0 auto;
  }
  .profile h4, .profile h1, .profile{
    text-align:center;
  }
</style>
<div class="profile">
<div class="col-md-3"></div>
<div class="col-md-3">
    <div class="row">
           <?php if (isset($user_img) && $user_img==1){
              echo "<img height='300' width='300' src='/uploads/$user_name.jpg'>";
           }?>
    </div><br>
    <div class="row">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Message</button>

    </div>
</div> 
<div class="col-md-3">
  <h1><?php echo "Hi, I'm " . htmlspecialchars($user_name) . "."; ?></h1>
    <div>
        <h4>Age</h4> <?php echo htmlspecialchars($age); ?>
        <h4>Gender</h4> <?php echo htmlspecialchars($gender);?>
    </div>
    <div>
        <?php
             if(isset($description))
                 echo "<h4>Description</h4>" . htmlspecialchars($description); 
        ?>
    </div>
    <div>
        <?php
        if (isset($skills) && strlen($skills)>0){
           echo "<h4>I can help you with</h4>";
           echo htmlspecialchars($skills);
        }
        if (isset($desired_skills) && strlen($desired_skills)>0){
           echo "<h4>Looking for people with</h4>";
           echo htmlspecialchars($desired_skills);
        }
        ?>
        
        </ul>
    </div>

  </div>
</div>
<div class="col-md-3"></div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Compose Message</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="/index.php/composeMessage/sendMessage">
        <input name="username" type="hidden" value="<?=$user_name?>"></input>
        <textarea name="message"></textarea>
        <button type="submit">Send</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
