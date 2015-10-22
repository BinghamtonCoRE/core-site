var React = require('react');

var InventoryTableRow = React.createClass({
  propTypes: {
    name: React.PropTypes.string.isRequired,
    quantity: React.PropTypes.string.isRequired,
    id: React.PropTypes.string.isRequired
  },

  getInitialState: function() {
    return {
      editable: false
    };
  },

	render: function() {
		return (
			<tr><td>{this.props.name}</td> <td>{this.props.quantity}</td></tr>
		);
	}
});

module.exports = InventoryTableRow;
