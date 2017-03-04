
<?php
require "simplexml.class.php";
   $users = simplexml_load_file('data.xml');
if (isset($_POST['edit'])) {
  foreach ($users->user as $user) {
    if ($user['id']== $_POST['id']) {

  $user->name= $_POST['name'];
   $user->gender = $_POST['gender'];
   $user->phone= $_POST['phone'];
   $user->email = $_POST['email'];
   break;
    }
}
  
 
   file_put_contents('data.xml', $users->asXML());

   header('location: index.php');
}

foreach ($users->user as $user) {
if ($user['id'] == $_GET['id']) {
  $id=$user['id'];
  $name=$user->name ;
  $gender=$user->gender ;
  $phone=$user->phone ;
  $email=$user->email ;
  break;
}
}
?>
<form  method="POST">

   ID:<br>
    <input type="text" name="id" value="<?php echo $id ; ?>" readonly>

  <br>
  Name:<br>
  <input type="text" name="name" value="<?php echo $name;?>"  required >
  <br>
  Gender:<br>
  <input type="text" name="gender" value="<?php echo $gender;?>" required>
  <br>
  Phone:<br>
  <input type="text" name="phone" value="<?php echo $phone;?>"  required>
  <br>
   Email:<br>
  <input type="text" name="email" value="<?php echo $email;?>" required>
  <br><br>
  <input type="submit" name="edit" value="EDIT">
</form> 
