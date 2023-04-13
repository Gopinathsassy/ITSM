"use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {

		var datatable = $('#kt_datatable').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
            theme: 'bordered',

			search: {
				input: $('#kt_datatable_search_query'),
				key: 'generalSearch'
			},
			columns: [
				{
					field: 'ID',
					type: 'number',
                    textAlign: 'center',
				},
                {
                    field: 'Type',
                    type: 'Type',
                    textAlign: 'center',
                },
                {
                    field: 'Summary',
                    type: 'Summary',
                    textAlign: 'center',
                },
				{
					field: 'Date',
					type: 'date',
					format: 'YYYY-MM-DD',
                    textAlign: 'center',
				},
                {
                    field: 'Severity',
                    type: 'Severity',
                    textAlign: 'center',
                },
                {
                    field: 'Responsible',
                    type: 'Responsible',
                    textAlign: 'center',
                },
                {
					field: 'Status',
					title: 'Status',
                    textAlign: 'center',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {
                                'title': 'Open',
                                'class': ' label-light-success'
                            },
							2: {
                                'title': 'Assigned',
                                'class': ' label-light-primary'
                            },
							3: {
                                'title': 'WIP',
                                'class': ' label-light-warning'
                            },
							4: {
                                'title': 'Solution',
                                'class': ' label-light-dark'
                            },
                            5: {
                                'title': 'Closed',
                                'class': ' label-light-danger'
                            }
						};
						return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
					},
				}, {
					field: 'Level',
					title: 'Level',
                    textAlign: 'center',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {
                                'title': 'Level-1',
                                'state': 'danger'
                            },
							2: {
                                'title': 'Level-2',
                                'state': 'warning'
                            },
							3: {
                                'title': 'Level-3',
                                'state': 'primary'
                            },
                            4: {
                                'title': 'Level-4',
                                'state': 'success'
                            },
						};
						return '<span class="label label-' + status[row.Level].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' +status[row.Level].state + '">' +	status[row.Level].title + '</span>';
					},
				},
			],
		});



        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Level');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

    };

    return {
        // Public functionsb
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableDemo.init();
});
