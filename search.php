<!DOCTYPE html>
<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
<style type="text/css">


input[type="radio"]:checked ~ .name   {
  opacity: 1;
  max-height: 100px; 
  overflow: visible;
}

.name  {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;

  input[type="radio"]:checked ~ & {
    opacity: 1;
    max-height: 100px;
    overflow: visible;
    padding: 10px 20px;
    transform: scale(1);
  }
}


input[type="radio"]:checked ~ .phone   {
  opacity: 1;
  max-height: 100px; 
  overflow: visible;
}

.phone  {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;

  input[type="radio"]:checked ~ & {
    opacity: 1;
    max-height: 100px;
    overflow: visible;
    padding: 10px 20px;
    transform: scale(1);
  }
}


input[type="radio"]:checked ~ .email   {
  opacity: 1;
  max-height: 100px; 
  overflow: visible;
}

.email  {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transform: scale(0.8);
  transition: 0.5s;

  input[type="radio"]:checked ~ & {
    opacity: 1;
    max-height: 100px;
    overflow: visible;
    padding: 10px 20px;
    transform: scale(1);
  }
}



</style>

</head>
<body> 

<?php
require "simplexml.class.php";
   $users = simplexml_load_file('data.xml');

foreach ($users->user as $user) {
if ($user->name == $_GET['name']) {
  $id=$user['id'];
  $name=$user->name ;
  $gender=$user->gender ;
  $phone=$user->phone ;
  $email=$user->email ;
echo "ID : " . $id ."<br> NAME :". $name  ."<br> GENDER : ". $gender ."<br> PHONE :". $phone ."<br> EMAIL :". $email ."<br>";
  echo "<hr>";
}
if ($user->phone == $_GET['phone']) {
  $id=$user['id'];
  $name=$user->name ;
  $gender=$user->gender ;
  $phone=$user->phone ;
  $email=$user->email ;
echo "ID : " . $id ."<br> NAME :". $name  ."<br> GENDER : ". $gender ."<br> PHONE :". $phone ."<br> EMAIL :". $email ."<br>";
echo "<hr>";
}

if ($user->email == $_GET['email']) {
  $id=$user['id'];
  $name=$user->name ;
  $gender=$user->gender ;
  $phone=$user->phone ;
  $email=$user->email ;
echo "ID : " . $id ."<br> NAME :". $name  ."<br> GENDER : ". $gender ."<br> PHONE :". $phone ."<br> EMAIL :". $email ."<br>";
echo "<hr>";
}

}


?>



<form>
  <input type="radio">
<label for="choice">Name:<br> </label>
  <input class="name" type="text" id="search" name="name" value="" >
  <br>
   
  
  
</form>
<form>
  <input type="radio" >
<label for="choice">  Phone:<br> </label>

  <input class="phone"  type="text" id="search" name="phone" value="" >
  <br>

 </form>
 <form>

  <input type="radio" >
<label for="choice"> Email:<br></label>
  
  <input class="email" id="search"  type="text" name="email" value="">
  <br><br> 

 <!--  <input id="search"  autocomplete="off" class="email"  type="submit" name="search-email" value="SEARCH">
 -->
 </form>


<p id="output"></p>

<script type="text/javascript">

$(document).ready(function(){
    $('#search').on('keyup', function(){
        $.ajax({
            type: "GET",
            url: "data.xml",
            dataType: "xml",
            success: parseXML
        });
    });
});


function parseXML(xml){
    var searchFor = $('#search').val();
    var reg = new RegExp(searchFor, "i");

    $(xml).find('user').each(function(){

        var name= $(this).find('name').html();
        var namesearch = name.search(reg);
        var gender = $(this).find('gender').html();
        var gendersearch = gender.search(reg);
        var phone = $(this).find('phone').html();
        var phonesearch = phone.search(reg);
        var email = $(this).find('email').html();
        var emailsearch = email.search(reg);
       
        $('#output').empty();


        if(namesearch > -1){

            $('#output').append('Found <i>'+searchFor+'<\/i> as name  in  <br\/> name: '+name.replace(reg, '<b>'+searchFor+'</b>')+'<br \/>gender: '+gender.replace(reg, '<b>'+searchFor+'</b>')+'<br \/> phone: '+phone.replace(reg, '<b>'+searchFor+'</b>')+'<br \/> email: '+email.replace(reg, '<b>'+searchFor+'</b>')+'<br \/>');


        }

      /*  
         if(phonesearch > -1){

            $('#output').append('Found <i>'+searchFor+'<\/i> as phone in  <br\/> name: '+name.replace(reg, '<b>'+searchFor+'</b>')+'<br \/>gender: '+gender.replace(reg, '<b>'+searchFor+'</b>')+'<br \/> phone: '+phone.replace(reg, '<b>'+searchFor+'</b>')+'<br \/> email: '+email.replace(reg, '<b>'+searchFor+'</b>')+'<br \/>');

        }
        if(emailsearch > -1){

            $('#output').append('Found <i>'+searchFor+'<\/i> as phone in  <br\/> name: '+name.replace(reg, '<b>'+searchFor+'</b>')+'<br \/>gender: '+gender.replace(reg, '<b>'+searchFor+'</b>')+'<br \/> phone: '+phone.replace(reg, '<b>'+searchFor+'</b>')+'<br \/> email: '+email.replace(reg, '<b>'+searchFor+'</b>')+'<br \/>');

        }*/

    });    
}
</script>