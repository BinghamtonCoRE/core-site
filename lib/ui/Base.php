<?hh

abstract class :ui:base extends :x:element {

	abstract protected function compose();

	public function addClass(string $class): this {
		$this->setAttribute(
      'class',
      trim($this->getAttribute('class').' '.$class),
    );

    return $this;
	}

  final public function render() {
    $root = $this->compose();
    if ($root === null) {
      return <div />;
    }

    $attributes = $this->getAttributes();
    $declared = $root->__xhpAttributeDeclaration();

    if (array_key_exists('class', $attributes)) {
      $attributes['class'] && $root->addClass($attributes['class']);
      unset($attributes['class']);
    }

   $html5Attributes = array('data-' => true, 'aria-' => true);

    foreach ($attributes as $attribute => $value) {
      if (isset($declared[$attribute]) ||
          isset($html5Attributes[substr($attribute, 0, 5)])) {
        $root->setAttribute($attribute, $value);
      }
    }

    return $root;
  }

}
