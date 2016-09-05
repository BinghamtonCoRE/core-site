<?hh

class :ui:navbar extends :x:element {
  attribute
    array<string, string> content @required, // The pages <page name => link>
    string page-title @required; // The title of the current page

  const string TITLE = 'CoRE';

	protected function render(): :nav {
    $navItems = array();
		$requestUri = $_SERVER["REQUEST_URI"];
    foreach ($this->:content as $itemTitle => $link) {
			$link = preg_replace("/(\/[^\/]*)$/", $link, $requestUri);
      $navItems[] =
        <li class={!strcasecmp($this->:page-title, $itemTitle)
          ? 'true' 
          : 'false'}>
          <a href={$link}>{$itemTitle}</a>
        </li>;
    }
		return
			<nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button 
              type="button"
              class="navbar-toggle collapsed"
              data-toggle="collapse"
              data-target="#navbar"
              aria-expanded="false"
              aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">{self::TITLE}</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            {$navItems}
	          </ul>
	        </div>
	      </div>
	    </nav>;
	}
}
