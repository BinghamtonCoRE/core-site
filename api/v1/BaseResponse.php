<?hh

abstract class BaseResponse {

	public function __construct() {
		DB::initialize();
	}

	public function __destruct() {
		DB::deinitialize();
	}

	abstract protected static function getResponseData();

	public function processRequest(): string {
		$data = static::getResponseData();
		$response = Map{
			'title' => 'CoREtex Inventory API V1',
			'data' => $data
		};
		return json_encode($response);
	}

}
