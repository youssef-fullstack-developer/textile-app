"use strict";
var KTDatatablesDataSourceHtml = function () {

	var initTable1 = function () {
		var table = $('#table_invoice_settings');

		// begin first table
		table.DataTable({
			scrollX: true,
			columnDefs: [
				{
					width: '75px',
					// targets: 3,
					// render: function (data, type, full, meta) {
					// 	var status = {
					// 		0: { 'title': 'Inactive', 'class': ' label-light-danger' },
					// 		1: { 'title': 'Active', 'class': ' label-light-success' },
					// 	};
                    //
                    //     console.log('--------------------');
                    //     console.log(data);
                    //     console.log('--------------------');
					// 	if (typeof status[data] === 'undefined') {
					// 		return data;
					// 	}
					// 	return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					// },
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
