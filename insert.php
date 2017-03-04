
<?php
if (isset($_POST['insert'])) {
	require "simplexml.class.php";
	 $users = simplexml_load_file('data.xml');
	 $user = $users->addChild('user');
	 $user->addAttribute('id' ,$_POST['id']);
	 $user->addChild('name' , $_POST['name']);
	 $user->addChild('gender' , $_POST['gender']);
	 $user->addChild('phone' , $_POST['phone']);
	 $user->addChild('email' , $_POST['email']);
	 file_put_contents('data.xml', $users->asXML());

	 header('location: index.php');
}



?>
<form  method="POST">

   ID:<br>
   <?php 
   require 'simplexml.class.php';
	$users = simplexml_load_file('data.xml');
?>
<!-- <?php echo  count($users)+1 ; ?>  -->
  <input type="text" name="id" value="<?php echo uniqid();?>" readonly>

  <br>
  Name:<br>
  <input type="text" name="name" placeholder="Enter your name !" required>
  <br>
  Gender:<br>
  <input type="text" name="gender" placeholder="Enter your gender !" required>
  <br>
  Phone:<br>
  <input type="text" name="phone" placeholder="Enter your phone !" required>
  <br>
   Email:<br>
  <input type="text" name="email" placeholder="Enter your email !" required>
  <br><br>
  <input type="submit" name="insert" value="Insert">
</form> 
