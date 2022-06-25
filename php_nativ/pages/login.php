<?php
if(filter_input(INPUT_POST, "login", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE )){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $db->login($username, $password);
}
?>
<form method="POST">
    <fieldset id="login">
        <div class="form-input">
            <input type="text" name="username" placeholder="felhasználónév"/>	
        </div>
        <div class="form-input">
            <input type="password" name="password" placeholder="Jelszó"/>
        </div>
        <button type="submit" name="login" value="true" class="btn-login">Belépés</button>
        <a href="index.php?menu=regisztracio">Regisztráció...</a>
    </fieldset>
</form>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

