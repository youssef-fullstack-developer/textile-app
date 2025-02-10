"use strict";
// Class definition

var KTDatatableRemoteAjaxDemo = function () {
	// Private functions

	// basic demo
	var demo = function () {

		var datatable = $('#dt_products').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'getAllProducts',
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						map: function (raw) {
							var dataSet = raw;
							if (typeof raw.data !== 'undefined') {
								dataSet = raw.data;
							}
							return dataSet;
						},
					},
				},
				pageSize: 10,
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				scroll: false,
				footer: false,
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#dt_products_search'),
				key: 'search'
			},

			// columns definition
			columns: [{
				field: 'id',
				title: '#',
				sortable: 'asc',
				width: 30,
				type: 'number',
				selector: false,
				textAlign: 'center',
			}, {
				field: 'image',
				title: 'Image',
				sortable: false,
				width: 75,
				template: (row) => {
					return `<a target='_blank' class='img' href='assets/images/products/${row.image}'><img width='75px' src='assets/images/products/${row.image}' /></a>`
				}
			}, {
				field: 'name',
				title: 'Name',
				width: 300,
				template: function (row) {
					return `<a href="/products/${row.id}/info">${row.name.substr(0, 50)}</a>`
				}
			}, {
				field: 'categories.name',
				title: 'Category',
				sortable: false,
			}, {
				field: 'cost',
				title: 'Cost',
				sortable: false,
				width: 50,
			}, {
				field: 'price',
				title: 'Price',
				sortable: false,
				width: 50,
			}, {
				field: 'quantity',
				title: 'Quantity',
				sortable: false,
				width: 70,
			}, {
				field: 'is_featured',
				title: 'Featured',
				sortable: false,
				width: 70,
				template: function (row) {
					var status = {
						0: {
							'title': 'No',
							'class': ' label-light-danger'
						},
						1: {
							'title': 'Yes',
							'class': ' label-light-success'
						},
					};
					return '<span class="label font-weight-bold label-lg ' + status[row.is_featured].class + ' label-inline">' + status[row.is_featured].title + '</span>';
				},
			}, {
				field: 'is_active',
				title: 'Status',
				sortable: false,
				width: 70,
				template: function (row) {
					var status = {
						0: {
							'title': 'Inactive',
							'class': ' label-light-danger'
						},
						1: {
							'title': 'Active',
							'class': ' label-light-success'
						},
					};
					return '<span class="label font-weight-bold label-lg ' + status[row.is_active].class + ' label-inline">' + status[row.is_active].title + '</span>';
				},
			}],

		});
	};

	return {
		// public functions
		init: function () {
			demo();
		},
	};
}();

jQuery(document).ready(function () {
	KTDatatableRemoteAjaxDemo.init();
});
