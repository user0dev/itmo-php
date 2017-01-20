<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<pre>
<?php
        var_dump($_GET);    
        var_dump($_POST);
?>
</pre>

<form action="lesson4.php" method="post">
    <input type="text" name="username"><br>
    <input type="password" name="password"><br>
    <input type="submit">
</form>

</body>
</html>
