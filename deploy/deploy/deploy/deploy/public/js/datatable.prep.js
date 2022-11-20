//var jQuery = jQuery;

jQuery(document).ready(function () {
	// body...
	jQuery('#myTable').DataTable({
	        "columnDefs": [ {
	          "targets": '.no-sort',
	          "orderable": false,
	          "sortable": false,
	    } ]
	});

	jQuery(".select_all").click(function() {
		if(jQuery('.select_all').is(':checked')){
			jQuery('.product_checkbox').each(function (){
				jQuery(this).prop('checked', "checked")
			})
		}else{
			jQuery('.product_checkbox').each(function (){
				jQuery(this).removeAttr('checked')
			})
		}
		
	})
})