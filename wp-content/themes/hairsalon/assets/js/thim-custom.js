/**
 * Script custom for theme
 *
 * TABLE OF CONTENT
 *
 * Header: Main menu
 * Header: Sticky menu
 * 
 * Blog: Grid layout
 * Blog: Masonry layout
 * Blog: Post gallery
 * 
 * Features: Back to top
 * Features: Preload
 * Features: RTL
 * 
 * WooCommerce: Quick view
 * WooCommerce: Switcher layout
 * WooCommerce: Shopping cart
 * WooCommerce: Product slider
 * WooCommerce: Product share
 * WooCommerce: Cart widget
 * 
 * Footer: Sticky footer
 * 
 * Sidebar: Sticky sidebar
 * Contact form: Loading
 * Datetime for book
 * Parallax
 * Change value input Mailchimp plugin
 * Custom select use Dropkickjs.
 * Search box
 * Language plugin
 */
(function ($) {
	"use strict";

	var isInIFrame = (window.location != window.parent.location);

	$(document).ready(function () {
		thim_hairsalon.ready();
	});

	$(window).load(function () {
		thim_hairsalon.load();
	});

	var thim_hairsalon = {

		/**
		 * Call functions when document ready
		 */
		ready: function () {
			this.back_to_top();
			this.feature_preloading();
			this.sticky_sidebar();
			this.header_menu();
			if ($("body.woocommerce").length) {
				this.thim_list_switcher();
			}
			this.minicart_hover();
			this.contactform7();
			this.thim_book_online();
		},
		
		/**
		 * Call functions when window load.
		 */
		load: function () {
			this.header_menu();
			this.header_menu_mobile();
			this.parallax();
			this.thim_post_gallery();
			this.thim_quick_view();
			this.thim_blog_layout_grid();
			this.thim_blog_layout_masonry();
			this.thim_change_value_input_mailchimp();
			if (isInIFrame != true) {
				this.custom_select();
			}
			if ($("body.woocommerce").length) {
				this.thim_product_slider();
				this.thim_product_share_click();
			}
			this.thim_rtl_support();
			this.footer_sticky_bar();
			this.thim_search_box();
			this.thim_language();
            this.thim_book_button();
			this.thim_google_map();
		},

		// CUSTOM FUNCTION IN BELOW
		header_menu_mobile: function () {
			$(document).on('click', '.menu-mobile-effect', function (e) {
				e.stopPropagation();
				$('.responsive').toggleClass('mobile-menu-open');
			});

			$(document).on('click', '.mobile-menu-open #main-content', function () {
				$('.responsive').removeClass('mobile-menu-open');
			});

			$('header li.menu-item-has-children >a, header li.menu-item-has-children >span').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');

			$('.responsive .mobile-menu-container .navbar-nav>li.menu-item-has-children >a, .responsive .mobile-menu-container .mega-menu>li.menu-item-has-children >a').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');

			$('.responsive .mobile-menu-container .navbar-nav>li.menu-item-has-children .icon-toggle, .responsive .mobile-menu-container .mega-menu>li.menu-item-has-children .icon-toggle').on('click', function () {

				if ($(this).next('ul.sub-menu').is(':hidden')) {
					$(this).next('ul.sub-menu').slideDown(200, 'linear');
					$(this).html('<i class="fa fa-angle-up"></i>');
				}
				else {
					$(this).next('ul.sub-menu').slideUp(200, 'linear');
					$(this).html('<i class="fa fa-angle-down"></i>');
				}
			});
		},

		header_menu: function () {
			var $header = $('#masthead.sticky-header'),
				off_Top = ( $('.content-pusher').length > 0 ) ? $('.content-pusher').offset().top : 0,
				$topbar = $('#thim-header-topbar'),
				menuH = $header.outerHeight(),
				latestScroll = 0,
				target = 2;

			if ($(window).width() <= 600) {
				$('html').addClass('thim');
			}

			$(window).scroll(function () {
				var current = $(this).scrollTop();
				if (current >= target) {
					$header.removeClass('affix-top').addClass('affix');
				} else {
					$header.removeClass('affix').addClass('affix-top');
				}
				
				if (current > latestScroll && current > off_Top) {
					if (!$header.hasClass('menu-hidden')) {
						$header.addClass('menu-hidden');
					}
				} else {
					if ($header.hasClass('menu-hidden')) {
						$header.removeClass('menu-hidden');
					}
				}

				latestScroll = current;
			});

			$('#masthead .navbar > .menu-item-has-children, .navbar > li ul li').on({
				mouseenter: function () {
					$(this).children('.sub-menu').stop(true, false).slideDown(250);
				},
				mouseleave: function () {
					$(this).children('.sub-menu').stop(true, false).slideUp(250);
				}
			});
			
			// Magic line for header v2
			if ($(window).width() > 768) {
				var menu_active = $('#masthead.header_v2 .navbar>li.menu-item.current-menu-item,#masthead.header_v2 .navbar>li.menu-item.current-menu-parent');
				if (menu_active.length > 0) {
					menu_active.before('<span id="magic-line"></span>');
					var menu_active_child = menu_active.find('>a,>span.disable_link'),
						menu_left = menu_active.position().left,
						menu_child_left = parseInt(menu_active_child.css('padding-left')),
						magic = $('#magic-line');
					magic.width(menu_active_child.width()).css("left", Math.round(menu_child_left + menu_left)).data('magic-width', magic.width()).data('magic-left', magic.position().left);
				} else {
					var first_menu = $('#masthead.header_v2 .navbar>li.menu-item:first-child');
					first_menu.after('<span id="magic-line"></span>');
					var magic = $('#magic-line');
					magic.data('magic-width', 0);
				}

				var nav_H = parseInt($('.site-header .navigation').outerHeight());
				magic.css('bottom', nav_H - (nav_H - 90) / 2 - 64);

				$('#masthead .navbar>li.menu-item').on({
					'mouseenter': function () {
						var elem = $(this).find('>a,>span.disable_link'),
							new_width = elem.width(),
							parent_left = elem.parent().position().left,
							left = parseInt(elem.css('padding-left'));
						if (!magic.data('magic-left')) {
							magic.css('left', Math.round(parent_left + left));
							magic.data('magic-left', 'auto');
						}
						magic.stop().animate({
							left : Math.round(parent_left + left),
							width: new_width
						});
					},
					'mouseleave': function () {
						magic.stop().animate({
							left : magic.data('magic-left'),
							width: magic.data('magic-width')
						});
					}
				});
			}
		},

		back_to_top: function () {
			var $element = $('#back-to-top');
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$element.addClass('scrolldown').removeClass('scrollup');
				} else {
					$element.addClass('scrollup').removeClass('scrolldown');
				}
			});

			$element.on('click', function () {
				$('html,body').animate({scrollTop: '0px'}, 800);
				return false;
			});
		},

		sticky_sidebar: function () {
			var offsetTop = 20;

			if ($("#wpadminbar").length) {
				offsetTop += $("#wpadminbar").outerHeight();
			}
			if ($("#masthead.affix").length) {
				offsetTop += $("#masthead.affix").outerHeight();
			}

			$("aside.sticky-sidebar").theiaStickySidebar({
				"containerSelector"     : "",
				"additionalMarginTop"   : offsetTop,
				"additionalMarginBottom": "0",
				"updateSidebarHeight"   : false,
				"minWidth"              : "768",
				"sidebarBehavior"       : "modern"
			});
		},

		/**
		 * Effect parallax.
		 */
		parallax: function () {
			$(window).stellar({
				horizontalOffset: 0,
				verticalOffset  : 0
			});
		},

		/**
		 * Feature: Preloading
		 */
		feature_preloading: function () {
			var $preload = $('#thim-preloading');
			if ($preload.length > 0) {
				$preload.fadeOut(1000, function () {
					$preload.remove();
				});
			}
		},


		/**
		 * Custom select use Dropkickjs
		 */
		custom_select: function () {
			$('select').dropkick({
				mobile: true,
				change: function () {
					var selectedIndex = this.selectedIndex;
					$(this.data.select).find('option').each(function (index, ele) {
						if (index === selectedIndex) {
							$(ele).attr('selected', 'selected');
						} else {
							$(ele).removeAttr('selected');
						}
					});
				}
			});
			this.support_plugin_google_language();
		},

		/**
		 * Support plugin google language
		 */
		support_plugin_google_language: function () {
			$('#google_language_translator .skiptranslate').contents().filter(function () {
				return this.nodeType == Node.TEXT_NODE;
			}).remove();
		},

		/**
		 * Sticky footer
		 */
		footer_sticky_bar: function () {
			var $element = $('#thim-sticky-sidebar');
			if ($element.length > 0) {
				$element.height($element.find('.inner-bar').outerHeight());
			}
		},

		/**
		 * Product Grid, List switch
		 */
		thim_list_switcher: function () {

			var activeClass = 'switcher-active';
			var gridClass = 'product-grid';
			var listClass = 'product-list';
			$('.switchToList').on ('click',function () {
				if (!$.cookie('products_page') || $.cookie('products_page') == 'grid') {
					switchToList();
				}
			});
			$('.switchToGrid').on ('click',function () {
				if (!$.cookie('products_page') || $.cookie('products_page') == 'list') {
					switchToGrid();
				}
			});

			function switchToList() {
				$('.switchToList').addClass(activeClass);
				$('.switchToGrid').removeClass(activeClass);
				$('.archive_switch').fadeOut(300, function () {
					$(this).removeClass(gridClass).addClass(listClass).fadeIn(300);
					$.cookie('products_page', 'list', {expires: 3, path: '/'});
				});
			}

			function switchToGrid() {
				$('.switchToGrid').addClass(activeClass);
				$('.switchToList').removeClass(activeClass);
				$('.archive_switch').fadeOut(300, function () {
					$(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
					$.cookie('products_page', 'grid', {expires: 3, path: '/'});
				});
			}

			if ($.cookie('products_page') == 'grid') {
				$('.archive_switch').removeClass('product-list').addClass('product-grid');
				$('.switchToGrid').addClass(activeClass);
			} else if ($.cookie('products_page') == 'list') {
				$('.archive_switch').removeClass('product-grid').addClass('product-list');
				$('.switchToList').addClass(activeClass);
			}
			else {
				$('.switchToGrid').addClass(activeClass);
				$('.archive_switch').removeClass('product-list').addClass('product-grid');
			}
		},

		/**
		 * Post gallery
		 */
		thim_post_gallery: function () {
			$('article.format-gallery .flexslider').imagesLoaded(function () {
				$('.flexslider').flexslider({
					slideshow     : true,
					animation     : 'fade',
					pauseOnHover  : true,
					animationSpeed: 400,
					smoothHeight  : true,
					directionNav  : true,
					controlNav    : false
				});
			});
		},

		/**
		 * Quickview product
		 */
		thim_quick_view: function () {
			$('.quick-view').on('click', function (e) {
				/* add loader  */
				$('.quick-view span').css('display', 'none');
				$(this).append('<span class="loading dark"></span>');
				var product_id = $(this).attr('data-prod');
				var data = {action: 'jck_quickview', product: product_id};
				$.post(ajaxurl, data, function (response) {
					$.magnificPopup.open({
						mainClass: 'my-mfp-zoom-in',
						items    : {
							src : response,
							type: 'inline'
						}
					});
					$('.quick-view span').css('display', 'inline-block');
					$('.loading').remove();
					$('.product-card .wrapper').removeClass('animate');
					setTimeout(function () {
						$('.product-lightbox form').wc_variation_form();
					}, 600);
				});
				e.preventDefault();
			});
		},

		/**
		 * Custom effect and UX for contact form.
		 */
		contactform7: function () {
			$(".wpcf7-submit").on('click', function () {
				$(this).css({ 'opacity' : '0.2', 'font-size' : 0});
				$(this).parents('.wpcf7-form').addClass('processing');
				$('input:not([type=submit]), textarea').attr('style', '');
			});

			$(document).on('spam.wpcf7', function () {
				$(".wpcf7-submit").css({ 'opacity' : '1', 'font-size' : '13px'});
				$('.wpcf7-form').removeClass('processing');
			});

			$(document).on('invalid.wpcf7', function () {
				$(".wpcf7-submit").css({ 'opacity' : '1', 'font-size' : '13px'});
				$('.wpcf7-form').removeClass('processing');
			});

			$(document).on('mailsent.wpcf7', function () {
				$(".wpcf7-submit").css({ 'opacity' : '1', 'font-size' : '13px'});
				$('.wpcf7-form').removeClass('processing');
			});

			$(document).on('mailfailed.wpcf7', function () {
				$(".wpcf7-submit").css("opacity", 1);
				$('.wpcf7-form').removeClass('processing');
			});

			$('body').on('click', 'input:not([type=submit]).wpcf7-not-valid, textarea.wpcf7-not-valid', function () {
				$(this).removeClass('wpcf7-not-valid');
			});
		},

		/**
		 * Effect when hover on mini cart.
		 */
		minicart_hover: function () {
			$("body").on("mouseenter mouseleave", ".widget_shopping_cart", function (e) {
				var cart = $('.widget_shopping_cart');
				var cart_content = cart.find('.widget_shopping_cart_content');
				if (e.type == "mouseenter") {
					cart_content.stop().slideDown(200);
				} else {
					cart_content.stop().slideUp(200);
				}
			});
		},

		/**
		 * Product single slider
		 */
		thim_product_slider: function () {
			$('#carousel').flexslider({
				animation    : "slide",
				direction    : "vertical",
				controlNav   : false,
				animationLoop: false,
				slideshow    : false,
				itemWidth    : 101,
				itemMargin   : 5,
				maxItems     : 3,
				directionNav : false,
				asNavFor     : '#slider'
			});

			$('#slider').flexslider({
				animation    : "slide",
				controlNav   : false,
				animationLoop: false,
				directionNav : false,
				slideshow    : false,
				sync         : "#carousel"
			});
		},


		/**
		 * Show share
		 */
		thim_product_share_click: function () {
			$(".woocommerce .share-click").on ('click',function () {
				$('.thim-social-share').slideToggle();
			});
		},


		/**
		 * Blog layout grid
		 */
		thim_blog_layout_grid: function () {
			var $blog = $('.thim-sc-posts article, .blog .grid-layout article, .archive .grid-layout article'),
				maxHeight = 0;
            
			// Get max height of all items.
			$blog.each(function () {
				if (maxHeight < $(this).find('.content-inner').height()) {
					maxHeight = $(this).find('.content-inner').height();
				}
			});
            
			// Set height for all items.
			if (maxHeight > 0) {
				$blog.each(function () {
					$(this).find('.content-inner').css('height', maxHeight);
				});
			}
		},

		/**
		 * Blog layout masonry
		 */
		thim_blog_layout_masonry: function () {
			$(".blog .masonry-layout, .archive .masonry-layout").isotope({
				itemSelector   : '.type-post',
				percentPosition: true,
				masonry        : {
					columnWidth: '.type-post',
					fitWidth   : true
				}
			});
		},

		/**
		 * Change default value button submit in mailchimp
		 */
		thim_change_value_input_mailchimp: function () {
			$('.newsletter-content input[type="submit"]').val("Subscribe");
		},

		/**
		 * RTL
		 */
		thim_rtl_support: function () {
			$(document).ready(function () {

				setTimeout(function () {
					$(window).trigger('resize');
				}, 150);

				$(window).resize(function () {
					var $rtl = $('body.class-rtl #wrapper-container ');
					var get_padding1 = $rtl.find('.vc_row-has-fill').css('left');
					var get_padding2 = $rtl.find('.vc_row-no-padding').css('left');

					if (get_padding1 != null) {
						var right = 0 - parseInt(get_padding1.replace('px', '')) + 15;
						$rtl.find('.vc_row-has-fill').css('right', get_padding1);
					}
					if (get_padding2 != null) {
						$rtl.find('.vc_row-no-padding').css('right', get_padding2);
					}

				});
			});
		},

		/**
		 * Book online
		 */
		thim_book_online : function () {
			var $dateinput = $("input.date-booktable");
			var $timeinput = $("input.time-booktable");

			var height_book_v1 = $('.btn-book.style-1'),
				height_book_v2 = $('.btn-book.style-2'),
				height_header_v1 = $('.header_v1'),
				height_header_v2 = $('.header_v2 .navigation'), 
				height_v1 = 0,
				height_v2 = 0,
				tb = 3;
			

			// Get height from header v1, v2
			height_header_v1.each(function () {
				if ( height_v1 < $(this).height()) {
					height_v1 = $(this).height();
				}
			});
			height_header_v2.each(function () {
				if ( height_v2 < $(this).height()) {
					height_v2 = $(this).height();
				}
			});
			// Set height for button book.
			if ( height_v1 > 0) {
				height_book_v1.each(function () {
					$(this).css('height', height_v1);
				});
			}
			if ( height_v2 > 0) {
				height_book_v2.each(function () {
					$(this).css('height', height_v2 + tb);
				});
			}
			
			$dateinput.datepicker({
				// Show the 'close' and 'today' buttons
				showButtonPanel: false,
				dateFormat: 'mm/dd/yy',
				minDate: new Date()
			});

			var lang_timepicker = {
				controlType: 'select',
				timeFormat: 'hh:mm tt'
			};

			$timeinput.timepicker(lang_timepicker);
		},

		/**
		 * Search widget
		 */
		thim_search_box :function () {
			$('.thim-search-box').on('click', '.toggle-form', function (e) {
				e.preventDefault();
				$('body').toggleClass('thim-active-search');
				var $search = $(this).parent();
				setTimeout(function () {
					$search.find('.search-field').focus();
				}, 400);
			});

			$('.thim-search-box .background-toggle').on('click', function (e) {
				e.preventDefault();
				$('body').removeClass('thim-active-search');
			});

			$(window).scroll(function() {
				$('body').removeClass('thim-active-search');
			});
			
		},
		
		/**
		 * Change text language translate
		 */
		thim_language : function () {
			$(".goog-te-combo .dk-selected, .goog-te-combo .dk-select-options .dk-option:first").text("Language");
		},
        
        thim_book_button : function () {
            $('header#masthead .menu-right .btn-book').on('click', function (e) {
                var hrefs = $(this).find('a').attr('href');
                window.location.href = hrefs;
            });
        },
		thim_google_map: function () {
			$('.thim-sc-googlemap .map-cover').on('hover', function(){
				$(this).remove();
			});
		}
	};
})(jQuery);


