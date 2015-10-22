<?hh

require_once('../../vendor/autoload.php');

class ListItems extends BaseResponse {

	protected static function getResponseData() {
		return(DB::query('SELECT name, quantity, id FROM inventory ORDER BY name;'));
	}

}

$apiCall = new ListItems();
print $apiCall->processRequest();
