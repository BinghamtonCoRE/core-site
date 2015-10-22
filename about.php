<?hh

require_once('vendor/autoload.php');

class AboutPage extends BasePage {
  public function getPageTitle(): string {
    return 'About';
  }

  public function getPageContent(): :xhp {
    return
      <ui:root>
        <ui:row>
          <ui:col class="col-md-6">
            <img src="http://placehold.it/350x250"/>
          </ui:col>
          <ui:col class="col-md-6">
            <p>We do things with stuff.</p>
          </ui:col>
        </ui:row>
        <ui:row>
          <ui:col class="col-md-6">
            <p>Look at all the things we do.</p>
          </ui:col>
          <ui:col class="col-md-6">
            <img src="http://placehold.it/350x250"/>
          </ui:col>
        </ui:row>
      </ui:root>;
  }
}

$page = new AboutPage();
echo $page->getPage();
