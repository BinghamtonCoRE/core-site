<?hh

final class :ui:col extends :ui:base {
	attribute
		:div,
    string size = "col-md-12";

  protected function compose(): :div {
    $this->addClass($this->:size);
    return
      <div>{$this->getChildren()}</div>;
  }
}
