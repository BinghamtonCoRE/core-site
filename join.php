<?hh

require_once('vendor/autoload.php');

class JoinPage extends BasePage {

	public function getPageTitle(): string {
		return 'Join';
	}

	public function getPageContent(): :ui:root {
		return
			<ui:root>
				<ui:row>
					<ui:col class="centering">
						<p>THIS PAGE HAS JOIN STUFF ON IT</p>
					</ui:col>
				</ui:row>
			</ui:root>;
	}

}

$page = new JoinPage();
echo $page->getPage();
