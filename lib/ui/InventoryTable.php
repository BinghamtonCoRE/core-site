<?hh

final class :ui:inventory-table extends :ui:base {
	use XHPHelpers;
	use XHPReact;

	attribute :div;

	protected function compose(): XHPRoot {
		$results = DB::query("SELECT id,name,quantity FROM inventory ORDER BY name");
		$this->constructReactInstance(
			'InventoryTable',
			Map{'data' => $results}
		);
		return <div />;
	}	

}
