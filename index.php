<?php

require 'simplexml.class.php';

if (isset($_GET['action']))
{
	$users = simplexml_load_file('data.xml');
	$id = $_GET['id'];
	$index=0;
	$i=0;
	foreach ($users->user as $user) {
		if ($user['id'] == $id )
		{
			$index=$i;
			break ;
		}
		$i++;
	}
	unset($users->user[$index]);

	 file_put_contents('data.xml', $users->asXML());

	   header('location: index.php');

}
$users = simplexml_load_file('data.xml');
echo "Number of users :" . count($users);


?>
<br>
<br>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Gender</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Options</th>
	</tr>
	<?php foreach ($users->user as $user){?>
	<tr>
		<td><?php echo $user['id'] ; ?></td>
		<td><?php echo $user->name ; ?></td>
		<td><?php echo $user->gender ; ?></td>
		<td><?php echo $user->phone ; ?></td>
		<td><?php echo $user->email ; ?></td>
		<td> <a href="edit.php?id=<?php echo $user['id'] ; ?>"> Edit </a>|<a href="index.php?action=delete&id=<?php echo $user['id'] ; ?>" onclick="return confirm('Are you really want to delete this user ?')"> Delete </td>
	</tr>
	<?php } ?> 

</table>
<br>
<a href="insert.php">Insert</a> |

<a href="search.php">Search</a> 
