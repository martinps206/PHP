<?php
require_once __DIR__ . '/lib/DataSource.php';
$database = new DataSource();
$sql = "SELECT * FROM users ORDER BY userId DESC";
$result = $database->select($sql);
?>
<html>
<head>
<title>Users List</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
	<div class="phppot-container">
		<h1>Users List</h1>
		<form method="post" action="">
			<div id="message"><?php if(isset($message)) { echo $message; } ?></div>
			<p>
				<a href="add_user.php" class="font-bold">Add User</a>
			</p>
			<table class="striped">
				<thead>
					<tr>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Actions</th>
					</tr>
				</thead>
<?php
if (is_array($result) || is_object($result)) {
    foreach ($result as $key => $value) {
        ?>
	<tr>
					<td><?php echo $result[$key]["userName"];?></td>
					<td><?php echo $result[$key]["firstName"];?></td>
					<td><?php echo $result[$key]["lastName"];?></td>
					<td><a href="edit_user.php?userId=<?php echo $result[$key]["userId"]; ?>"class="mr-20">Edit</a> 
						<a href="delete_user.php?userId=<?php echo $result[$key]["userId"]; ?>">Delete</a></td>
				</tr>
 <?php
    }
}
?>
			</table>
		</form>
	</div>
</body>
</html>