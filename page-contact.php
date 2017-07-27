<?php
 
  //response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div class='alert alert-success'>{$message}</div>";
    else $response = "<div class='alert alert-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;{$message}</div>";
 
  }
  
  //response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";
$message_name = "Please provide a name.";

//user posted variables
$name = $_POST['msg-name'];
$email = $_POST['msg-email'];
$message = $_POST['msg-message'];
$telephone = $_POST['msg-telephone'];
$date = $_POST['msg-date'];
$guests = $_POST['msg-guests'];
$submit = $_POST['msg-submit'];
 
//php mailer variables
if ($submit === 'Submit') {
   if (strlen(trim($name))) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $to = get_option('admin_email');
         $subject = "Someone sent a message from ".get_bloginfo('name');
         $headers = 'From: '.$name.' <'. $email . ">\r\n" .
           'Reply-To: ' . $email . "\r\n";
         
         $parts = array('Name'=>$name, 'Email'=>$email, 'Telephone'=>$telephone, 'Date'=>$date, 'Guests'=>$guests);
         $part_string = '';
         foreach($parts as $field=>$part) {
            $part_string .= $field.': '.$part."\r\n";
         }
         $message = $part_string."\r\n".$message;
         $sent = wp_mail($to, $subject, strip_tags($message), $headers);
         if($sent) { my_contact_form_generate_response("success", $message_sent); //message sent!
            foreach($parts as $field=>$part) {
               $$field = '';
            }
            $message = '';
         }
         else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
      } else {
         my_contact_form_generate_response("error", $message_invalid);
      }
   } else {
         my_contact_form_generate_response("error", $message_name);
   }
}


?>

<?php get_header() ?>
<!--
<div class="row">
     
          <div class="col-md-12">
         
              
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/header-contact-1.jpg' class='img-responsive'/>
          </div> 
</div>
   -->

      <div class="row">
     
          <div class="col-md-8">
              <h1>Contact Us</h1>
              <p>Fill in the form below and we'll get back to you shortly&hellip;</p>
              <?php print $response; ?>
               <form action="<?php the_permalink(); ?>" method="post">
                   <div class="form-group">
                       <label for="email">Name: <span class="text-muted">*</span></label>
    <input type="text" class="form-control" name="msg-name" id="form-name" value="<?php print $name; ?>" required>
  </div>
  <div class="form-group">
    <label for="email">Email address: <span class="text-muted">*</span></label>
    <input type="email" class="form-control" name="msg-email" id="form-email" value="<?php print $email; ?>" required>
  </div>
  <div class="form-group">
    <label for="pwd">Telephone number:</label>
    <input type="text" class="form-control" name="msg-telephone" id="form-telephone" value="<?php print $telephone; ?>">
  </div>
                   <div class="form-group">
    <label for="pwd">Date:</label>
    <input type="date" class="form-control" name="msg-date" id="form-date" value="<?php print $date; ?>">
  </div>
                   <div class="form-group">
    <label for="pwd">Number of Guests:</label>
    <input type="text" class="form-control" name="msg-guests" id="form-guests" value="<?php print $guests; ?>">
  </div>
                   
  <div class="form-group">
    <label for="pwd">Packages:</label>
     <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Candy floss machine hire</label>
  </div>
    <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Popcorn machine hire</label>
  </div>
    <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Slush machine hire</label>
  </div>
    <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Chocolate fountain hire</label>
  </div>
    <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Hot dog machine hire & services</label>
  </div>
    <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Bespoke packages</label>
  </div>
    <div class="checkbox">
    <label><input type="checkbox" name="msg-packages"> Flavours/Gifts</label>
  </div>
  </div>
                   
 
                    <div class="form-group">
    <label for="message">Message:</label>
    <textarea class="form-control" name="msg-message" id="form-message"><?php print $message; ?></textarea>
  </div>
  <input type="submit"  name="msg-submit" value="Submit" class="btn btn-default"/>
</form>
              <p>&nbsp;</p>
          </div>
          <?php get_sidebar() ?>
             </div>
          <?php get_footer(); ?>;