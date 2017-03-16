(function ($, Thim_Importer) {
	$(document).ready(document_ready);

	function document_ready() {
		Thim_Importer.onEvent();

		$('.action-import').on('click', function () {
			var $thim_demo = $(this).closest('.thim-demo');
			var demo_key = $thim_demo.data('thim-demo');
			Thim_Importer.chooseDemo(demo_key);
		});

		$('.thim-screenshot').on('click', function () {
			var $thim_demo = $(this).closest('.thim-demo');
			var demo_key = $thim_demo.data('thim-demo');
			Thim_Importer.chooseDemo(demo_key);
		});
	}
})(jQuery, Thim_Importer);