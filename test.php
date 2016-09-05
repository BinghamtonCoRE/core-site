<?hh

require_once('vendor/autoload.php');

class TestPage extends BasePage {

	public function getPageTitle(): string {
		return "Test";
	}

	public function getPageContent(): :xhp {
		return 
			<ui:root>
				<ui:row>
					<ui:col>
						<ui:magic-button />
					</ui:col>
				</ui:row>
			</ui:root>;
	}

}

$page = new TestPage();
print $page->getPage();
