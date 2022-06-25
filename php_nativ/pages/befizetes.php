<?php
if(filter_input(INPUT_POST, "adat", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    //-- a kapott adatok ellenőrzése ---
    $tagid = filter_input(INPUT_POST, "tagid", FILTER_VALIDATE_INT);
    $osszeg = filter_input(INPUT_POST, "osszeg", FILTER_VALIDATE_INT);
    $db->insert_befizetes($tagid,$osszeg);
    if($db->errors){
        echo '<p class="error"> A rögzítés sikertelen! </p>';
    } else {
        echo '<p class="submit"> A rögzítés sikeres! </p>';
    }
}
?>
<form method="POST">
    <fieldset>
        <legend>&nbsp; Tag befizetése &nbsp;</legend>
        <select name="tagid" required>
            <option value="-1">válassz nevet ...</option>
            <?php
            foreach ($db->tagok_Lista() as $value) {
                echo '<option value="'.$value['azon'].'"'.($user->azon==$value['azon']?' selected ':'').'>'.$value['nev'].'</option>';
            }
            ?>
        </select>
        <input type="number" min="100" max="1000000" required name="osszeg" value="1000" step="100"  />
        <button type="submit" name="adat" value="true">Rögzít</button>
        <input type="reset">
    </fieldset>
</form>


