<?php
if (count($_POST) > 0) {
    require_once __DIR__ . '/lib/DataSource.php';
    $database = new DataSource();
    $sql = "INSERT INTO users (signup_name,userName,firstName, lastName) VALUES (?,?,?,?)";
    $paramType = 'ssss';
    $paramValue = array(
        $_POST["signup-name"],
        $_POST["userName"],
        $_POST["firstName"],
        $_POST["lastName"]
    );
    $database->insert($sql, $paramType, $paramValue);
}
?>
<html>
<head>
<title>Add New User</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
</head>
<body>
    <div class="phppot-container">
        <form name="frmUser" method="post" action="">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <p>
                <a href="index.php" class="font-bold">List User</a>
            </p>
            <h1>Add New User</h1>
            <div>
                <div class="row">
                    <label for="signup-name">Name <span
                        class="error-color" id="signup-name_error"></span>
                    </label><input type="text" name="signup-name"
                        id="signup-name" required>
                </div>
                <div class="row">
                    <label>Username</label><input type="text"
                        name="userName" class="txtField" required>
                </div>
                <div class="row">
                    <label>First Name</label><input type="text"
                        name="firstName" class="txtField">
                </div>
                <div class="row">
                    <label>Last Name</label><input type="text"
                        name="lastName" class="txtField">
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Add"
                        class="btnSubmit">
                </div>
            </div>
        </form>
    </div>
</body>
</html>