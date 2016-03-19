<style>
 .register{
    margin-top:60px;
  }
  .register h2{
    padding-bottom:7px;
  }
  .register, .register input, .register textarea{
    text-align:center;
     width: 100%;
  }
  .error{
    color:red;
  }
</style>
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="/">SkillSwap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Home</a>
                    </li>

                    <li>
                        <a href="/index.php/login">Login</a>
                    </li>
                    <li>
                        <a href="/index.php/register">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


<div class="register">
  <div class="col-md-5"></div>
  <div class="col-md-2">
        <h2> Register </h2>
<?php 
      
         echo "<p class='error'>". (isset($error_message) ? $error_message : ""). "<p>";
      
?>

        <form action="/index.php/register/signup" method="post">
           <input name="username" placeholder="Username" data-validate="required,min(5),max(20)">
           <input name="password" placeholder="Password" type="password" data-validate="required,min(12)">
           <input name="confirm_password" placeholder="Confirm password" type="password" data-validate="required,equalsPassword">
           <input name="age" placeholder="Age" data-validate='required,number,minVal(16)'>
           <br>Gender 
           <select name="gender">
               <option value="male">male</option>
               <option value="female">female</option>
               <option value="other">other</option>
           </select>
           <input name="zip" placeholder="Zipcode" data-validate="required,number,min(5),max(5)">
           <textarea name="description" placeholder="About Me" data-validate="min(5),max(255)"></textarea>
           <button class="btn-block btn-primary" type="submit">Create account</button>
        </form>
  </div>
  <div class="col-md-5"></div>
</div>
<script>
  $("[name='username']").on("change", function(){
      var username = $(this).val();
      $.ajax({type:"POST", url: "<?=base_url()?>/index.php/register/usernameExists", data: { "username": username}, success: function( data ) {
           if (data["exists"] === "true"){
              $(".error").text("Username already in use.");
           } 
           else
              $(".error").text("");
        }, dataType:"json"}); 
  });
</script>
