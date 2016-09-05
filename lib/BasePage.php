<?hh

/* This class serves as a base to implement when creating new pages. It will
  deal with creating the doctype and the appropriate meta tags and resources in
  the header.
*/
abstract class BasePage {

  public function __construct() {
    DB::initialize();
  }

  public function __destroy() {
    DB::deinitialize();
  }

  /*
    Implement this function to return the body content for a particular page.
    
    @return A :div containing the main page content
  */
  abstract public function getPageContent(): :xhp;

  /*
    @return The title of the page
  */
  abstract public function getPageTitle(): string;

  /*
    Builds the page head

    @return The page head
  */
  final public function getHeadContent(): :head {
    $pageTitle =
      <title>
        CoRE :: {$this->getPageTitle()}
      </title>;
    $charset =
      <meta 
        charset="utf-8"/>;
    $noIE = 
      <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"/>;
    $viewport =
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1"/>;
    $jsScripts = array();
    foreach($this->jsResources() as $x) {
      $jsScripts[] = <script src={$x} />;
    }
    $cssStyles = array();
    foreach($this->cssResources() as $x) {
      $cssStyles[] =
        <link
          rel="stylesheet"
          href={$x} />;
    }
	$favicon =
		<link
			rel="shortcut icon"
			href="/images/favicon.ico"
			type="image/x-icon" />;

    return
      <head>
        {$pageTitle}
        {$charset}
        {$noIE}
        {$viewport}
        {$jsScripts}
        {$cssStyles}
				{$favicon}
      </head>;
  }

  /*
    Builds the nav bar. Add items to the array to have them show up in the nav
    bar.

    @return The nav bar
  */
  final public function getNavBar(): :ui:navbar {
    $navContent = array(
      'Home' => '/',
      'About' => '/about.php',
			'Contact' => '/contact.php',
			'Join' => '/join.php',
			'Test' => '/test.php'
    );
    return
      <ui:navbar
        content={$navContent}
        page-title={$this->getPageTitle()} />;
  }

  /*
    Builds the full document to be returned and echo'ed to create the page. You
    must echo the output of this function below your class in order for it to
    appear when loaded.

    @return The fully built page
  */
  final public function getPage(): :x:doctype {
    $head = $this->getHeadContent();
    $body = <body />;
    $body->appendChild($this->getNavBar());
    $body->appendChild($this->getPageContent());
    return
      <x:doctype>
        <html lang="en">
          {$head}
          {$body}
        </html>
      </x:doctype>;
  }

  /*
    Array of necessary JS resources to be loaded

    @return Array of JS resources
  */
  private function jsResources(): array<string> {
    return array(
      '//code.jquery.com/jquery-1.11.0.min.js',
      'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
			'./build/bundle.js'
    );
  }

  /*
    Array of necessary CSS resources to be loaded

    @return Array of CSS resources
  */
  private function cssResources(): array<string> {
    return array(
      'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
      'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css',
      'css/style.css'
    );
  }
}
