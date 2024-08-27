"use strict";
var KTDatatablesDataSourceHtml = function () {

	var initTable1 = function () {
		var table = $('#table_invoice_settings');

		// begin first table
		table.DataTable({
			responsive: true,
			columnDefs: [
				{
					width: '75px',
					targets: 4,
					render: function (data, type, full, meta) {
						var status = {
							0: { 'title': 'In Active', 'class': ' label-light-danger' },
							1: { 'title': 'Active', 'class': ' label-light-success' },
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	return {

		//main function to initiate the module
		init: function () {
			initTable1();
		},

	};

}();

jQuery(document).ready(function () {
	KTDatatablesDataSourceHtml.init();
});
