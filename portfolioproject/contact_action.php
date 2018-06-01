<?php
/*Action page for the contact form; places the contents into the mySQL database.*/
$servername = "localhost";
$username = "holdenbl_01";
$password = "Reversefold1";
$dbname = "holdenbl_portfolio";

print_r($name);

include 'header.php';

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("
    <p class='formresponse'>Oops! Your connection didn't hit the ground running. Try resubmitting?</p>
    ");
}

/*Retrieve the POST data*/
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$message = mysqli_real_escape_string($conn, $message);

$sql = "INSERT INTO ContactForm (name, email, message)
        VALUES ('$name', '$email', '$message')";

$email_from = 'holdenbleyle.webhostingforstudents.com';
 
$email_subject = "New Form submission";
 
$email_body = "You have received a new message from the user $name.\n".
                        "Here is the message:\n $message".
    
$to = "holdenbleyle@gmail.com";

$headers = "From: $email_from \r\n";
 
$headers .= "Reply-To: $visitor_email \r\n";
 
mail($to,$email_subject,$email_body,$headers);

if ($conn->query($sql) === TRUE) {
    echo "<p class='formresponse'>Your form was submitted successfully! Click <a href='contact.php'>here</a> to go back.</p>";
    echo "<p class='formresponse'>Here was the data you entered:<br>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Message: $message </p>";
} else {
    echo "<p class='formresponse'>Error: " . $sql . "</p><br>" . $conn->error;
}

$conn->close();
?>