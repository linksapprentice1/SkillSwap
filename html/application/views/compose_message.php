<div class="compose_message">
  <div class="col-md-4"></div>
  <div class="col-md-4">
        <h2> Compose Message</h2>
<?php 
      
         echo "<p class='error'>". (isset($error_message) ? $error_message : ""). "<p>";
      
?>

        <form action="/index.php/composeMessage/sendMessage" method="post">
           <input name="username" placeholder="Username" data-validate="required,min(5),max(20)">
           <textarea name="message" placeholder="Message" data-validate="min(3),max(255)"></textarea>
           <button type="submit">Send</button>
        </form>
  </div>
   <div class="col-md-4"></div>
</script>
