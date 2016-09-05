<?hh

final class :ui:magic-button extends :ui:base {
	attribute :div;

	protected function compose(): :button {
		return
			<button type="button">
				CLICK ME!
			</button>;
	}

}
