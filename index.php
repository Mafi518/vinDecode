<?php

$apiPrefix = "https://api.vindecoder.eu/3.1";
$apikey = "652dbbbced43";   // Your API key
$secretkey = "a50ce28f9d";  // Your secret key
$id = "info";
// $vin = mb_strtoupper("XXXDEF1GH23456789");
$vin = $_GET['vin'];

$controlsum = substr(sha1("{$vin}|{$id}|{$apikey}|{$secretkey}"), 0, 10);

$data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);
// $result = json_decode($data, true);

// WAUZZZ4BZWN049087

// XXXDEF1GH23456789

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="shortcut icon" href="img/favicon.png" type="image/png" />
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>
</head>

<style>
input {
  width: 400px;
}
</style>

<body>
  <header>
    <div class="container">
      <div class="logo"><a href="index.html"></a></div>
      <div class="menu-icon"><span></span></div>
      <nav class="menu">
        <ul class="menu__list">
          <li class="menu__item"><a class="menu__link" href="#"></a></li>
          <li class="menu__item"><a class="menu__link" href="#"></a></li>
          <li class="menu__item"><a class="menu__link" href="#"></a></li>
          <li class="menu__item"><a class="menu__link" href="#"></a></li>
          <li class="menu__item"><a class="menu__link" href="#"></a></li>
        </ul>
      </nav>
    </div>
  </header>
  <footer>
    <div class="test">
      <form id="test" action="decode.php" method="GET">
        <input type="text" maxlength="17" minlength="17" id="vin" name="vin">
        <button id="submit" type="submit">Submit</button>
      </form>
    </div>
  </footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

  <script>

  let data = <?=$data ?>

  let dataArr = Object.values(data)

  console.log(dataArr);

  document.querySelector('#submit').addEventListener('click', e => {
    
    let vin = document.querySelector('#vin').value.toUpperCase()

    console.log(vin);
  })

  // console.log(dataArr[2].map(el => {
  //   document.body.insertAdjacentHTML('afterbegin' ,`<div> ${el} </div>`)
  // }));

  </script>
</body>

</html>