<?hh

final class :ui:row extends :ui:base {
  attribute :div;

  protected function compose(): :div {
    $this->addClass('row');
    return <div>{$this->getChildren()}</div>;
  }
}