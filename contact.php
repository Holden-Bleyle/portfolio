<?php include 'header.php'; ?>
 
<section id="contact">
<h2 id="contactheader">Contact Us Here!</h2>
    
<form id="contact" action="contact_action.php" method="post" class="form">
    Name: <br>
    <input class="singlelineinput" type="text" name="name"><br>
    Email: <br>
    <input class="singlelineinput" type="email" name="email"><br>
    Message: <br>
    <textarea class="textarea" class="formcontrol" name="message" form="contact">Enter text here...</textarea><br>
    <input type="submit" name="submit" value="Click here to submit your completed form.">
</form>
</section>

<?php include 'footer.php'; ?>