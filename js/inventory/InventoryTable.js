var React = require('react');
var InventoryTableRow = require('InventoryTableRow');

var InventoryTable = React.createClass({
  propTypes: {
    data: React.PropTypes.array.isRequired
  },

	render: function() {
		return (
			<table className="inventoryTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					{
						this.props.data.map(function(elem) {
							return <InventoryTableRow
							name={elem.name}
							quantity={elem.quantity}
							id={elem.id}
							key={elem.id}/>;
						})
					}
				</tbody>
			</table>
		);
	}
});

module.exports = InventoryTable;
