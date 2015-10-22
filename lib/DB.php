<?hh

class DB {
  private static ?object $mysqli = null;

  public static function initialize() {
		$fileContents = file_get_contents('credentials.txt');
		if ($fileContents === false) {
			return;
		}
		$json = json_decode($fileContents, true);
    self::$mysqli = mysqli_connect(
      "localhost", 
      $json['user'], 
      $json['password'], 
      "CoREtex",
    );
  }

  public static function query(string $queryString) {
    $query = mysqli_query(self::$mysqli, $queryString);
    $results = array();
    while ($row = $query->fetch_assoc()) {
      $results[] = $row;
    }
    $query->free();
    return $results;
  }

  public static function deinitialize() {
		if (self::$mysqli !== null) {
			self::$mysqli->close();
		}
  }

}
