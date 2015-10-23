<?hh

$requestUri = $_SERVER['REQUEST_URI'];
$link = "/join.php";
$link = preg_replace("/(\/[^\/]*)$/", $link, $requestUri);
echo $link;
