<?php
//var_dump($user);
$url="https://restcountries.com/v3.1/alpha/".$user->orsz;
// create & initialize a curl session
$curl = curl_init();

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, $url);

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_URL,$url);
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HEADER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);
$orszag = (array) json_decode($output);
$cca3 = strtolower($orszag[0]->cca3);
//$orszagnev = $orszag[0]->name->nativeName->$cca3->official;
$orszagnev = $orszag[0]->translations->hun->official;
$currencies = $orszag[0]->currencies;
$zaszlo = $orszag[0]->flags->svg;
$cimer = $orszag[0]->coatOfArms->svg;
echo '<pre>';
//var_dump($orszag[0], $orszagnev);
echo '</pre>';
?>
<h1>Felhasználói adatok</h1>
<img src="<?php echo ".".DIRECTORY_SEPARATOR."userImages".DIRECTORY_SEPARATOR.$user->kep; ?>" class="userImage">
<form id="adatlap">
    <div class="sor"><label>Felasználó neve:</label><input type="text" value="<?php echo $user->nev; ?>" readonly/></div>
    <div class="sor"><label>Kódja:</label><input type="text" value="<?php echo $user->azon; ?>" readonly /></div>
    <div class="sor"><label>Születési éve:</label><input type="text" value="<?php echo $user->szulev; ?>"  readonly /></div>
    <div class="sor"><label>Ország:</label><input type="text" value="<?php echo $orszagnev; ?>"  readonly/></div>
    <div class="sor"><label>Ország címer:</label> <img src="<?php echo $cimer; ?>" class="cimer"> </div>
    <div class="sor"><label>Orzság zászló:</label> <img src="<?php echo $zaszlo; ?>" class="flag"> </div>
    <div class="sor"><label>Irányítószám:</label><input type="text" value="<?php echo $user->irszam; ?>" readonly /></div>
    <div class="sor"><label>Helység:</label><input type="text" value="<?php echo $user->helyseg; ?>" readonly /></div>
    </form>
    





