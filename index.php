<?hh

require_once('vendor/autoload.php');

class HomePage extends BasePage {
  public function getPageTitle(): string {
    return 'Home';
  }

  public function getPageContent(): :xhp {
    return
      <ui:root>
        <ui:row>
          <ui:col class="centering">
            <img
              src="/images/logo01_transparent.png"
              class="headLogo" />
          </ui:col>
          <ui:col class="centering">
            <span class="welcomeText">
              Welcome to CoRE!
            </span>
          </ui:col>
        </ui:row>
      </ui:root>;
  }
}

$page = new HomePage();
echo $page->getPage();
