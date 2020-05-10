<?php
    include 'includes/db.php';
    $query = 'SELECT slug from posts';
    $result = mysqli_query($connection, $query);
    
    $base_url = "http://blogtimes.thedexk.com/";
    header("Content-Type: application/xml; charset=utf-8");
    echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

    echo '<url><loc>'.$base_url.'</loc><changefreq>daily</changefreq><priority>1</priority></url>';

while($row = mysqli_fetch_array($result))
{
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url. $row['slug'] .'/</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}


echo '</urlset>' . PHP_EOL;
    
?>
