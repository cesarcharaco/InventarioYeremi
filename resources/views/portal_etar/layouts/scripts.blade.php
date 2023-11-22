<script>var exports = {};
     

</script>

<!-- Modernizer for Portfolio -->
    <script src="{{ asset('etar/js/modernizer.js') }}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ALL JS FILES -->
    <script src="{{ asset('etar/js/all.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('etar/js/custom.js') }}"></script>
	<script src="{{ asset('etar/js/timeline.min.js') }}"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>