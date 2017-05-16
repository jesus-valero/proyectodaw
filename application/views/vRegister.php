<!DOCTYPE html>
<html>
<head>
    <title>Tour Register</title>
</head>
<body>
<form method="post" action="<?php echo base_url('Register/check');?>">
    <label>Email:</label>
    <input type="text" name="email">
    <br/>
    <label>Password</label>
    <input type="password" name="password">
    <br/>
    <label>Repite la contraseña</label>
    <input type="password" name="repassword"/>
    <br/>
    <input type="submit" value="Registrarse">



</form>
</body>
</html>
