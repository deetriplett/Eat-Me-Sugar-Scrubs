<?php
//Retrieveing user input from order form; filters the input as we're applying it to our variable
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
  $address = trim(filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS));

  if ($name == "" || $email == "" || $address == "" || $cart == ""){
    $error_message = "Please fill in the required fields!";

  }
//Fake Form Input to catch Spammers/Bots
  if (!isset($error_message) && $_POST["phone"] != "") {
    $error_message =  "Bad Form Input!";
  }
// if email addy not valid display error and stop execution & (nb. => related to arrays and their keys; -> objects and their properties)
  require("inc/phpmailer/class.phpmailer.php");
  $mail = new PHPMailer;

  if(!isset($error_message) && !$mail->ValidateAddress($email)) {
    $error_message = "Error. Invalid Email Address.";
  }
  //Conditional, Email only executes when there are no errors
  if (!isset($error_message)) {
  //PHP FORM EMAIL TO BE RECIEVED FROM USER INPUT/ORDER
    $email_body = "";
    $email_body .= "Name: " . $name . "\n"; //Line Breaks
    $email_body .= "Email: " . $email. "\n";
    $email_body .= "Address: " . $address. "\n";
    $email_body .= "Order Details:\n";
    $email_body .= $cart;
  // .= tells code to keep everything in the variable and add the following info to the end of that value

    $mail->setFrom($email, $name);
    $mail->addAddress('eatmesugar@gmail.com', 'Dawn Monroe');// Add a recipient
    $mail->isHTML(false);// Set email format to HTML
    $mail->Subject = 'Order' . $name;
    $mail->Body    = $email_body;

    if($mail->send()) {
      header("Location:order.php?status=thanks"); //redirect to another php file
      exit;
    }
        $error_message = 'Message could not be sent.';
        $error_message .= 'Mailer Error: ' . $mail->ErrorInfo;
    }//End Conditional


$pageTitle = "Order";
$section = "order";

include("inc/header.php");
?>

<div class="section page">
  <div class="wrapper">
    <h1>Order</h1>
    <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
      echo "<p>Thanks for the order: I &rsquo;ll check out your order. You will receive an email shortly!</p>";
  }
       else {
  if (isset($error_message)) {
    echo "<p class='message'>".$error_message . "</p>";
  } else {
    echo "<p>Indulge Your Sweet Tooth!</p>";
  }
?>

<!--ORDER FORM-->
    <form method="post" action="order.php">
      <table>
        <tr>
          <th><label for="name">Name</label></th>
          <td> <input type="text" id="name" name="name"/></td>
        </tr>
        <tr>
          <th><label for="email">Email</label></th>
          <td> <input type="text" id="email" name="email"/></td>
        </tr>
        <tr>
          <th><label for="address">Address</label></th>
          <td><textarea name="address" id="address">Street City State Zip</textarea></td>
        </tr>
         <tr>
          <th><label for="flavors">Choose a Flavor</label></th>
          <td> <select id="flavors" name="flavors"></select></td>
          <option value="rosemarry">Rosemarried With Children</option>
          <option value="lemon">Lemon Bomb</option>
          <option value="orange">Orange is the New Vailla</option>
          <option value="chocolate">Chocolate Mint</option>
          <option value="lavendar">Lavenduh! I want some Basil!</option>
        </tr>
          <button>Add to Order</button><!--wHEN BUTTON CLICKED ADD ITEM IN DROPDOWN TO Cart-->
        <tr>
          <th><label for="cart">Your Cart</label></th>
          <td><textarea name="cart" id="cart">Items go here</textarea></td>
        </tr>

        <tr>
          <th><label for="phone">Phone</label></th>
          <td><input type="text" id="phone" name="phone" /></td>
          <p>Please Leave this Blank</p><!--Hidden field to thwart spammers-->
        </tr>
      </table>
      <input type="submit" value="Send"><!--Redirect to a totals/checkout page-->
    </form>
    <?php } ?>
    </div>

</div>

<?php include("inc/footer.php"); ?>
