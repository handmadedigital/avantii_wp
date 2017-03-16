;'use strict';

var Thim_Getting_Started = (function ($) {
	var current_step = 1;
	var current_key_step = '';
	var max_step = 1;
	const BASE_URL_AJAX = thim_gs.url_ajax;

	return {
		init: init,
		onEvent: onEvent
	};

	function init() {
		max_step = $('.thim-getting-started .tc-controls').attr('data-max');
		current_step = _get_step_by_url();
		current_key_step = _get_key_step_by_index(current_step);

		_go_to_step(current_step);
	}

	function onEvent() {
		var $root = $(document);

		$root.on('click', '.tc-controls .step', function (event) {
			event.preventDefault();
			return;//Disable

			var self = $(this);
			var position = self.attr('data-position');

			_go_to_step(position);
		});

		$('.tc-run-step').on('click', function () {
			var $self = $(this);

			var request = $self.attr('data-request') ? true : false;
			_next_step(request);

			if (request) {
				$self.addClass('updating-message');
				$self.attr('disabled', true);
			}
		});

		$root.on('click', '#skip-step', function (e) {
			e.preventDefault();
			_next_step();
		});
	}

	function _request(step, data) {
		var url_request = BASE_URL_AJAX + step;

		return $.ajax({
			url: url_request,
			method: 'POST',
			data: data,
			dataType: 'json'
		}).complete(function () {
			var $run_step = $('.tc-run-step');
			$run_step.removeClass('updating-message');
			$run_step.attr('disabled', false);
		});
	}

	function _next_step(request) {
		request = (undefined != request) ? request : false;

		if (current_step == max_step) {
			return;
		}

		if (!request) {
			current_step++;
			current_key_step = _get_key_step_by_index(current_step);
			_go_to_step(current_step);
		} else {
			_run_step(current_key_step);
		}
	}

	function _run_step(key_step) {
		switch (key_step) {
			case 'quick-setup':
				_request_quick_setup();
				break;

			case 'install-plugins':
				_request_install_plugins();
				break;

			case 'import-demo':
				_request_import_demo();
				break;

			default:
				_increase_step();
				_go_to_step(current_step);
		}
	}

	function _request_quick_setup() {
		var $form = $('.tc-step.quick-setup form');
		var data = $form.serialize();

		_request(current_key_step, data)
			.success(function (response) {
				_increase_step();
				_go_to_step(current_step);
			})
			.error(function (error) {
				console.error(error);
			});
	}

	function _request_install_plugins() {
		_request(current_key_step, {})
			.success(function (response) {
				_increase_step();
				_go_to_step(current_step);
			})
			.error(function (error) {
				console.error(error);
			});
	}

	function _request_import_demo() {
		_request(current_key_step, {})
			.success(function (response) {
				_increase_step();
				_go_to_step(current_step);
			})
			.error(function (error) {
				console.error(error);
			});
	}


	function _increase_step() {
		current_step++;
		current_key_step = _get_key_step_by_index(current_step);
	}

	function _get_key_step_by_index(index) {
		var $step = $('.tc-controls .step[data-position="' + index + '"]');

		if (!$step.length) {
			return false;
		}

		return $step.attr('data-step');
	}

	function _get_step_by_url() {
		var current_url = window.location.href;

		var regex = /#step-(\d+)$/gi;
		var arr = regex.exec(current_url);

		if (!arr || arr.length !== 2) {
			return 1;
		}

		var index = parseInt(arr[1]);
		if (index > max_step) {
			return max_step;
		}

		if (index < 1) {
			return 1;
		}

		return index;
	}

	function _update_current_url(index) {
		document.location.hash = '#step-' + index;
	}

	function _go_to_step(index) {
		current_step = index;

		if (current_step > max_step) {
			current_step = max_step;
		}

		current_key_step = _get_key_step_by_index(current_step);

		if (current_step == max_step) {
			$('#skip-step').hide();
			$('#next-step').hide();
			$('#finish-step').show();
		} else {
			$('#finish-step').hide();
			$('#next-step').show();
			$('#skip-step').show();
		}

		$('.tc-step').removeClass('active');

		var $steps = $('.tc-controls .step');
		$steps.removeClass('active current');
		$steps.each(function () {
			var $st = $(this);
			var p = $st.attr('data-position');

			if (p <= current_step) {
				$st.addClass('active');
			}

			if (p == current_step) {
				$st.addClass('current');
				var key_step = $st.attr('data-step');
				$('.tc-step.' + key_step).addClass('active');
			}
		});

		_update_current_url(current_step);
	}
})(jQuery);

(function ($, thim) {
	$(document).ready(function () {
		thim.init();
		thim.onEvent();
	});
})(jQuery, Thim_Getting_Started);