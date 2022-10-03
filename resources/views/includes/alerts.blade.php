  @if (session('message'))
    <script>

		toastr.options = {
		  "closeButton": false,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-bottom-full-width",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}    	

        toastr["info"]("{{ session('message') }}")
    </script>

    <style>
	    .toast-bottom-full-width{
	    	margin-bottom:12px;
	    }
	</style>
  @endif
