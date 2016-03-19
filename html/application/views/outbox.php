<div class="col-md-4">
</div>
<div class="col-md-4">
<h3>Sent Messages</h3>
<?php
foreach($outbox as $message){
  echo "<div class='row'>";
  echo "<div class='message' mailbox_id='$message->mailbox_id' from='$message->to'>";
  echo "<div class='col-md-9'>";
  $date = new DateTime($message->date_time);
  $date->setTimezone(new DateTimeZone('America/New_York'));
  echo "<p>[" . $date->format("Y-m-d H:i") . "]  ";
  echo "To <b>$message->to</b>:  ";
  echo htmlspecialchars($message->content) ."</p>";
  echo "</div>";
  echo "<div class='col-md-3'>";
  echo "<button type='button' class='delete btn btn-danger' data-toggle='modal' data-target='#deleteModal'>Delete</button>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
}
?>
<div class="col-md-4">
</div>
<script>
   $(".delete").on("click", function(){
      var mailbox_id = $(this).closest(".message").attr("mailbox_id");
      $("#deleteModal input[name='mailbox_id']").val(mailbox_id);
   });
</script>
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Message</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="/index.php/composeMessage/deleteMessage">
        <p>Are you sure you want to delete this message?</p>
        <input name="mailbox" type="hidden" value="outbox"></input>
        <input name="mailbox_id" type="hidden" value=""></input>
        <button type="submit">Delete Now</button>
       </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

