<?php
 set_time_limit(60);
 require_once 'crawler.php';

 $c = new Crawler("http://nickolay.info", 2, true);
 $results = $c->crawl();
 foreach ($results as $item) {
  $newstr = preg_replace('%[^A-Za-zА-Яа-я0-9]%', '', $item['url']);
  $text = iconv('CP1251','UTF-8',$item['content']);
  $handle = fopen("pages/{$newstr}.html", "w");
  fwrite($handle, strip_tags($text));
  fclose($handle);
 }
?>