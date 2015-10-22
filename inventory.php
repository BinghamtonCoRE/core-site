<?hh

require_once('vendor/autoload.php');

class Inventory extends BasePage {

	public function getPageTitle(): string {
		return 'Inventory';
	}

	public function getPageContent(): :xhp {
		return
			<ui:root>
				<ui:row>
					<ui:col class="centering">
						<h1>CoREtex Inventory</h1>
						<x:js-scope>
							<ui:inventory-table />
						</x:js-scope>
					</ui:col>
				</ui:row>
			</ui:root>;
	}

}

//$page = new Inventory();
//print $page->getPage();
