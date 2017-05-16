<form method="post" action="<?php echo base_url('Login/doLogin');?>">
    <label>Email:</label>
    <input type="text" name="email">
    <br/>
    <label>Password</label>
    <input type="password" name="password">
    <br/>
    <a href="#">Olvidaste la contraseña?</a>
    <br/>
    <a href="<?php echo base_url('Register');?>">Eres nuevo?</a>
    <br/>
    <input type="submit" value="Acceder">
</form>
