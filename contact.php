<?hh

require_once('vendor/autoload.php');

class ContactPage extends BasePage {
	public function getPageTitle(): string {
		return 'Contact';
	}

	public function getPageContent(): :xhp {
		return
			<ui:root>
				<ui:row>
					<ui:col class="centering">
						<p>THIS PAGE HAS CONTACT INFO AND STUFF</p>
					</ui:col>
				</ui:row>
			</ui:root>;
	}
}

$page = new ContactPage();
echo $page->getPage();
