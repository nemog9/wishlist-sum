<?php

  require_once("./phpQuery-onefile.php");
  $html = file_get_contents("https://www.amazon.co.jp/hz/wishlist/ls/1M85DJQPN0BL8/ref=nav_wishlist_lists_1?_encoding=UTF8&type=wishlist");
  $doc = phpQuery::newDocument($html);

  //$prices = strip_tags($doc[".a-price-whole"]);
  /*
  foreach($doc[".a-price-whole"] as $price){
    echo strip_tags($price);

  }
  */

  $prices = $doc[".a-price-whole"];

  $total_price = 0;

  foreach($prices as $price) {
  // pq()メソッドでオブジェクトとして再設定しつつさらに下ってhrefを取得
  $price = pq($price)->text();

  $price = str_replace(',','',$price);
  $price_int = intval($price);

  $total_price += $price_int;
  }
  
  echo $total_price;
  /*
  $prices = str_replace(array("\r\n", "\r", "\n"), "\n", $prices);

  $price_array = explode("¥n", $prices);

  print_r($price_array);

  //echo $prices;
  */
?>
