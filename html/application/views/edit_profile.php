<style>
 .register{
    margin:0 auto;
  }
  .register, .register input, .register textarea, button{
    text-align:center;
    margin: 0 auto;
  }
  .error{
    color:red;
  }
</style>
<div class="register">
  <div class="col-md-4"></div>
  <div class="col-md-4">
        <h2> Edit Profile</h2>
<?php 
      if(isset($error_message)){
         echo "<p class='error'>$error_message<p>";
      }
?>

        <form action="/index.php/editProfile/edit" method="post" enctype="multipart/form-data">
           <?php if (isset($user_img) && $user_img==1){
              echo "<img height='300' width='300' src='/uploads/$user_name.jpg'>";
           }?>
           <input type="file" name="userfile" size="20" />
           <input value="<?=$age?>" name="age" placeholder="Age" data-validate='required,number,minVal(16)'>
           <br>Gender 
           <select name="gender">
               <?php 
                 $genders = array("male", "female", "other");
                 foreach ($genders as $gen){
               ?>
                 <option value="<?=$gen?>"<?= $gen==$gender ? "selected" : ""?>><?=$gen?></option>
               <?php
                 }
                ?>
           </select>
           <input value="<?=str_pad($zip, 5, "0", STR_PAD_LEFT);?>" name="zip" placeholder="Zipcode" data-validate="required,number,min(5),max(5)">
           <textarea name="description" placeholder="About Me" data-validate="min(5),max(255)"><?=$description?></textarea><br>
           <button type="submit">Save</button>
        </form>
  </div>
  <div class="col-md-4"></div>
</div>
