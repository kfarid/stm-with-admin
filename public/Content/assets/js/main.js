var circleTimeout;
var tablet;
var keyword = "";
var keywordText = "";
var pageSize = 5;
var currentPage =1;
var key ="";
var treeDom = '<div class="sitemapmenu cf">';
var langTr = false;

D = {
	bod : $('body'),
	stContainer : $('.st-container'),
	activeFilter : 'all',
	commonInit: function () {
		var fw;
		if($('.tablet-indicator').is(':visible') ) {
			tablet = true;
				fw = 100;
		}
		else {
			tablet = false;
				fw = 40.3;
		}
		if($('.mobile-indicator').is(':visible') ) mobile = true;
		else mobile = false;

		if($('html').attr('lang') == 'tr') langTr = true;

		D.editStructure();
		D.Navigation.init();
		D.setGridClass();
		D.initTabs();
		//D.positionTimeline();
		D.animateCountdown();
		D.logoMouseEvent();
		D.getIndexBoxes();
	 	D.filterItems();
	 	D.goBack();
		D.FormElements.init();
		if(D.bod.attr('id')!='indexPage' && D.bod.attr('class')!='kssPage' && D.bod.attr('id')!='searchPage' && D.bod.attr('class')!='contactPage' && D.bod.attr('class')!='static') {
			D.getTags(key,5,1);
			D.pushRelatedArticles();
		}
		D.appendTree();
		D.collapse();
		D.pageStart();
		D.scrollTimeline();
		//D.banner();

		//if ($.cookie('bannerGoster') == 0){
			//console.log("banner Çalışmadı")
			//TweenMax.to($('.banner-wrap'), 0.7, {height:0, ease:Quint.easeOut});
			//$('.banner .close').hide();

		//} else {

			//console.log("banner Çalıştı");
			D.banner();
//		}


		$('.boxWrapper .box-item').mouseenter(function(){
			D.clearCircle();
			D.drawCircle($(this));
		}).mouseleave(function(){
			D.clearCircle();
		});

		$('.boxGridWrapper .group').each(function(){
			$(this).text( $(this).text().replace(/\//g, " ") )
		})

		$('.editButton').insertBefore('.fixedColumn').css('left','80px');


		$('.sidenav li a, .filter-wrap li, .nav-daily .link-wrap').each(function(){
			$(this).find('span').clone().addClass('clone').appendTo($(this))
		})
		$('.sidenav li a, .filter-wrap li, .nav-daily .link-wrap').mouseover(function(){
			var i = $(this).parent().index();
			TweenMax.set($(this).find('.clone'), {x:-235, opacity:0});
			TweenMax.to($(this).find('.clone'), .7, {x:0, opacity:1, ease:Expo.easeOut})
		}).mouseleave(function(){
			TweenMax.to($(this).find('.clone'), .8, {x:235, opacity:0, ease:Expo.easeOut})
		});

		$('.journal-list .date, .article-date b').each(function(){
			var txt = $(this).text();
			$(this).text(txt.split(" ")[0])
		});

		//Set dimensions
		$('.image-list .bottom-info').width($('.sidecontent-inner h1').width()-1);

		$('.group-list .colon-3').on('click', function(){
			$('.bottom-info').removeClass('visible-col')
			$(this).find('.bottom-info').addClass('visible-col');
		});
		setTimeout(function(){
			var specH = $(window).height()-$('.related-section').height()-80;
			$('.sidecontent-inner').css({'min-height':specH})
		},200)

		$(window).resize(function(){
			var specH = $(window).height()-$('.related-section').height();
			$('.sidecontent-inner').css({'min-height':specH})

			if($('.tablet-indicator').is(':visible') ) tablet = true;
			else tablet = false;
			if($('.mobile-indicator').is(':visible') ) mobile = true;
			else mobile = false;
			$('.image-list .bottom-info').width($('.sidecontent-inner h1').width()-1);
			if(tablet) $('.fixedColumn').width('100%');
			else $('.fixedColumn').width('38%');
		});
	},
	editStructure:function(){
		$('.box-item a').each(function(){
			if($(this).data('video')) $(this).addClass('openVideo').attr('href', '');
		});
	},
	pageStart:function(){
		$('.bigslider').insertBefore($('.search-wrap'));
		setTimeout(function(){
			var specH = $(window).height()-$('.related-section').height()-80;
			$('.sidecontent-inner').css({'min-height':specH})
			$('.fixedColumn .inner').append('<div class="cover"></div>');
			TweenMax.to($('.fixedColumn .inner'), 0.9, {opacity:1, x:0, ease:Quint.easeOut});
			TweenMax.to($('.fixedColumn .inner .cover'), 0.9, {x:'100%', ease:Quint.easeOut, onComplete:function(){
				$('.fixedColumn').addClass('hover');
				$('[data-video]').filter(function(){
			        return ($(this).attr('data-video').length > 0);
			    }).attr('data-image', '');
			    D.Slider.init();
			}});
			if($('.boxMenuWrapper').length == 0) TweenMax.to($('.sideContent').not('.spec'), 0.9, {x:'0', opacity:1, ease:Quint.easeOut});
		},400);
	},
	banner:function(){
		if($('.banner').length == 1) $('.banner').show()
		$('.banner .close').on('click', function(){
			TweenMax.to($('.banner-wrap'), 0.7, {height:0, ease:Quint.easeOut});
			TweenMax.to($('.banner'), 0.7, {y:-40, ease:Quint.easeOut});

			//$.cookie('bannerGoster', 0, { expires: 3 });
		});
	},
	Slider:{
		slideIndex : 0,
		slideCount : $('.slider-content div').length,
		init:function(){
			if(D.bod.attr('id') == 'indexPage') D.Slider.slideCount = 1;
			else if( D.Slider.slideCount == 0 ) return;

			D.mouseMove();
			$('.mouse-frame, .openVideo').on('click', function(event){
				var i;
				event.preventDefault();
				if($(this).hasClass('openVideo')) {
					$('.slider-content > *').remove()
					var vidUrl = $(this).attr('data-video');
					$('.slider-content').append('<div data-video="'+vidUrl+'"></div>');
				}
				D.Slider.open();
			});
			$('.bigslider .controls div').on('click', function(){
				D.Slider.prevNext($(this));
			});
			$('.bigslider .close').on('click', function(){
				D.Slider.close();
			});
		},
		open:function(){
			$('.bigslider').addClass('reveal');
			TweenMax.to($('.bigslider'), 0, {zIndex:'500', opacity:1});
			TweenMax.to($('.sidecontent-inner, .related-section'),1.2, {x:200, ease:Expo.easeInOut});
			TweenMax.to($('.fixedColumn'),1.2, {x:200, ease:Expo.easeInOut});
			TweenMax.to($('.slide'),1.2, {width:'100%', ease:Expo.easeInOut});
			TweenMax.to($('.slider-content'),1.2, {width:'100%', opacity:1,ease:Expo.easeOut, onComplete:function(){
				$('.slider-content div').each(function(){
					if($(this).data('image')) $(this).append('<img src="' + $(this).data('image') + '" alt="">');
					//else if($(this).data('video')) $(this).append('<iframe width="420" height="315" src="' + $(this).data('video') + '" frameborder="0" allowfullscreen>');
				});

				if($('.slider-content div').eq(0).data('video')) $('.slider-content div').eq(0).append('<iframe width="420" height="315" src="' + $('.slider-content div').eq(0).data('video') + '?autoplay=1" frameborder="0" allowfullscreen>');

				$('.slider-content div:first-child').css({'z-index':'99'});
				TweenMax.to($('.slider-content div:first-child'),0.5, {opacity:1, ease:Quint.easeOut});
				TweenMax.to($('.bigslider .controls, .bigslider .close'),0.5, {opacity:1, delay:0.3,ease:Quint.easeOut});
			}});
		},
		prevNext:function(el){
			var slide = $('.slider-content div');

			TweenMax.to(slide.eq(D.Slider.slideIndex),0.5, {opacity:0, zIndex:'90', ease:Expo.easeOut, onComplete:function(){
				slide.eq(D.Slider.slideIndex).css({'z-index':'-1'})
			}});

			if(slide.eq(D.Slider.slideIndex).data('video')){
				slide.eq(D.Slider.slideIndex).find('iframe').animate({ opacity : 0}, 300, function() {
				    $(this).remove();
				});
			}

			if(el.hasClass('next')) D.Slider.slideIndex++;
			else D.Slider.slideIndex--;

			if(D.Slider.slideIndex < 0) D.Slider.slideIndex = D.Slider.slideCount - 1;
			else if(D.Slider.slideIndex == D.Slider.slideCount) D.Slider.slideIndex = 0;

			TweenMax.to(slide.eq(D.Slider.slideIndex),0.5, {opacity:1, zIndex:'99', ease:Expo.easeOut});

			if(slide.eq(D.Slider.slideIndex).data('video')){
				slide.eq(D.Slider.slideIndex).append('<iframe width="420" height="315" src="' + slide.eq(D.Slider.slideIndex).data('video') + '?autoplay=1" frameborder="0" allowfullscreen>');
			}
		},
		close:function(){
			D.Slider.slideIndex = 0;
			TweenMax.to($('.slider-content div'),0.2, {opacity:0, ease:Quint.easeOut, onComplete:function(){
				$('.slider-content div').find('iframe, img').remove();
			}});
			TweenMax.to($('.bigslider .controls, .bigslider .close'),0.5, {opacity:'0', ease:Quint.easeOut});
			TweenMax.to($('.slider-content'),1.2, {width:'0', delay:0.1, opacity:0,ease:Expo.easeOut});
			TweenMax.to($('.slide'),1.2, {width:'0', delay:0.1, ease:Expo.easeInOut});

			TweenMax.to($('.fixedColumn'),1.2, {x:0, delay:0.1, ease:Expo.easeInOut});
			TweenMax.to($('.sidecontent-inner, .related-section'),1.2, {x:0, delay:0.1, ease:Expo.easeInOut,onComplete:function(){
				TweenMax.to($('.bigslider'), 0, {zIndex:'-1', opacity:1});
			}});
		}
	},
	collapse:function(){
		$(".collapse").on('show.bs.collapse', function(){
			$('*[data-target="#'+$(this).attr('id')+'"]').addClass('active');
		}).on('hide.bs.collapse', function(){
		    $('*[data-target="#'+$(this).attr('id')+'"]').removeClass('active');
		});
	},
	goBack:function(){
		$('.back').on('click', function(){
			parent.history.back();
        	return false;
		});
	},
	mouseMove:function(){
		var target = $('.mouse-frame');
		var parentOffset;
		if( D.Slider.slideCount != 0 ) {
			target.addClass('visible')
			var backActive = false;
			target.mousemove(function(e) {
				parentOffset = $(this).parent().offset();
				console.log(e.pageX-parentOffset.left + 'xx')
				console.log(e.pageY-parentOffset.top+'yy')
				if(!backActive) TweenMax.to($('.mouse'), .8, {x:e.pageX-parentOffset.left, y:e.pageY-parentOffset.top, opacity:1, ease:Quint.easeOut});
			});
			target.mouseleave(function(e) {

				TweenMax.to($('.mouse'), .8, {opacity:0, ease:Quint.easeOut});
			});
			$('.fixedColumn .back').mousemove(function(e) {
				backActive = true;
				TweenMax.to($('.mouse'), .8, {opacity:0, ease:Quint.easeOut});
			}).mouseleave(function(e) {
				backActive = false;
			})
		}
	},
	filterItems:function(){
		var selectedL,
			boxCount = $('.boxGridWrapper').hasClass('indexContent') ? 13 : 9;

		$('.boxGridWrapper .box-item').addClass('all');

		$('.filter-wrap').mouseenter(function(){
			TweenMax.to($('.filter-wrap'), .8, {x:-240, ease:Quint.easeOut})
		}).mouseleave(function(){
			TweenMax.to($('.filter-wrap'), .8, {x:0, ease:Quint.easeOut});
		});

		$('.filter-action li').on('click', function(){
			if ( $(this).hasClass('active') ) return;
			D.activeFilter = $(this).attr('class');

			$(this).addClass('active').siblings().removeClass('active');
			$('.boxGridWrapper .box-item').removeClass('reveal');

			if($('body').attr('id')=='indexPage') D.Navigation.close($(this));

			selectedL = D.activeFilter == 'all' ? $('.boxGridWrapper .box-item').length : $('.boxGridWrapper .box-item.' + D.activeFilter).length;

			if(selectedL > boxCount) {
				for( i = 0; i < boxCount; i++ ) {
					var gf2 = $('.boxGridWrapper .box-item.' + D.activeFilter).eq(i).find('figure');
					if( !gf2.find('img').length > 0 ) {
						gf2.append('<img src="'+ gf2.attr('data-image') +'" alt="">').waitForImages(function() {
							$(this).parents('.box-item').addClass('reveal');
						});
					}
					else {
						$('.boxGridWrapper .box-item.' + D.activeFilter).eq(i).addClass('reveal');
					}
				}

				$('.boxGridWrapper').waitForImages().done(function() {
					setTimeout(function(){
						TweenMax.set($('.boxGridWrapper .box-item'), {x:-50, opacity:0});
						TweenMax.staggerTo($('.boxGridWrapper .reveal'), 0.8, {opacity:1, x:0, ease:Cubic.easeOut}, 0.04);
					},10);
					$('.load-more').removeClass('hidden');
				});
			}else {
				for( i=0; i < selectedL; i++ ) {
					var gf2 = $('.boxGridWrapper .box-item.' + D.activeFilter).eq(i).find('figure');
					if( !gf2.find('img').length > 0 ) {
						gf2.append('<img src="'+ gf2.attr('data-image') +'" alt="">').waitForImages(function() {
							$(this).parents('.box-item').addClass('reveal');
						});
					}
					else {
						$('.boxGridWrapper .box-item.' + D.activeFilter).eq(i).addClass('reveal');
					}
				}
				$('.boxGridWrapper').waitForImages().done(function() {
					setTimeout(function(){
						TweenMax.set($('.boxGridWrapper .box-item'), {x:-50, opacity:0});
						TweenMax.staggerTo($('.boxGridWrapper .reveal'), 0.8, {opacity:1, x:0, ease:Cubic.easeOut}, 0.04);
					},10);
					$('.load-more').addClass('hidden');
				});
			}
		})
	},
	getIndexBoxes:function(){
		var count;

		for(i=0; i < $('.boxGridWrapper.indexContent .box-item').length; i++) {
			if(i%8 < 2) $('.boxGridWrapper.indexContent .box-item').eq(i).addClass('col-2');
        	else $('.boxGridWrapper.indexContent .box-item').eq(i).addClass('col-3');
		}

		if($('.boxGridWrapper').hasClass('indexContent')) {
			count = 13;
			if( $('.boxGridWrapper .box-item').length < 13 )  $('.load-more').addClass('hidden');
		}
		else count = $('.boxGridWrapper .box-item').length;

		for( i = 0; i < count; i++ ) {
			var gf = $('.boxGridWrapper .box-item').eq(i).find('figure');
			gf.append('<img src="'+gf.attr('data-image')+'" alt="">').waitForImages(function() {
				$(this).parents('.box-item').addClass('reveal');
			});
		}

		$('.boxGridWrapper').waitForImages().done(function() {
			setTimeout(function(){
				$('.st-container').removeClass('loading');
				$('.load-wrap').addClass('hide');
				TweenMax.to($('.sideContent.spec'), 0.8, {x:'0', opacity:1, delay:0.4, ease:Quint.easeOut});
		    	TweenMax.staggerTo($('.boxGridWrapper .reveal'), 0.6, {opacity:1, x:0, delay:0.4, ease:Cubic.easeOut}, 0.04);
			},10)
		});

		$('.load-more').on('click', function(){
			var offsetB = $(".st-content-inner").height();
			var x = [];

			if( $('.boxGridWrapper .box-item.' + D.activeFilter).not('.reveal').length < count ) $('.load-more').addClass('hidden');


			for( i=0; i<count; i++ ) {
				var activeFilterBoxes = $('.boxGridWrapper .box-item.' + D.activeFilter).not('.reveal').eq(i);
				var gfx = activeFilterBoxes.find('figure');
				x.push(activeFilterBoxes);
				gfx.append('<img src="'+gfx.attr('data-image')+'" alt="">').waitForImages(function() {
					$(this).parents('.box-item').addClass('reveal');
				});
			}

			console.log(x[i])
			$('.boxGridWrapper').waitForImages().done(function() {
			    setTimeout(function(){
			    	var offsetA = $(".st-content-inner").height();
			    	console.log(offsetA)
			    	$(".st-content").animate({ scrollTop: offsetB -400 }, 600);
			    	for( i=0; i<count; i++ ) {
			    		TweenMax.staggerTo(x[i], 0.6, {opacity:1, x:0, ease:Cubic.easeInOut}, 0.04);
					}
				},10)
			});
		});
	},
	positionTimeline:function(){
		$('.timeline-list .item').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	        if (isInView ) {
	            var el = $(this);
	            el.addClass('inview');
	            TweenMax.to($('.timeline .line'), 0.8, {opacity:1, height:'100%', delay:0.3, ease:Quint.easeInOut});
	            TweenMax.to($('.inview'), 0.8, {opacity:1, x:'0', delay:0.4, ease:Quint.easeOut}, 0.5);
	        } else if (isInView && visiblePartY == "bottom") {
	        	TweenMax.to(el.find('.liner'), 1, {opacity:1, y:'0', ease:Quint.easeOut});
	        }
	    });
	},
	scrollTimeline:function(){
		$('.timeline .time').each(function(){
			$(this).parents('.item').attr('id', $(this).text())
			$('.timescroll').append('<div>'+$(this).text()+'</div>');
		});
		$('.timescroll div').on('click', function(){
			var target = $(this).text();
			$('html, body').animate({
	          scrollTop: $('#' + target).offset().top - 100
	        }, 1000);
		});
	},
	animateCountdown:function(){
		$('.infoGraph .col-in .count span').text('0');
		$('.infoGraph .col-in .count').bind('inview', function(event, isInView, visiblePartX, visiblePartY){
			if(isInView && visiblePartY == 'both'){
				var p = $(this);
				var count = p.attr('data-count');
				var currentCount = 0;
				var countInterval;
				var addTime = 16;
				countInterval = setInterval(function(){
					p.find('span').text((currentCount+=(count/addTime)).toFixed(0));
					if(currentCount >= count){
						p.find('span').text(count);
						clearInterval(countInterval);
						p.unbind('inview');
					}
				}, 50);
			}
		});
	},
	getCarousel:function(){
		$('.bottom-carousel').owlCarousel({
		    loop:true,
		    margin:0,
		    items:2,
		    nav:true,
		    responsiveClass:true,
		    smartSpeed:700,
		    responsive : {
			    0 : {
			        items:1,
			        autoplay:true,
				    autoplayTimeout:4000,
				    autoplayHoverPause:true

			    },
			    500 : {
			        items:2
			    }
			}
		});
	},
	logoMouseEvent:function(){
		$('.logo').mouseover(function(){
			var dd = $(this).find('span');
			TweenMax.to(dd, .25, {x:10, opacity:0, ease:Quint.easeIn, onComplete:function(){
				TweenMax.set(dd, {x:-10, opacity:0});
				TweenMax.to(dd, .25, {x:0, opacity:1, ease:Quint.easeOut});
			}});
		});
	},
	initTabs:function(){
		var tabWrap = $('.tab-wrapper');
	    var tl = tabWrap.find('.tab-link-wrap');

    	tabWrap.each(function(){
    		var tl2 = $(this).find('.tab-link-wrap');
    		tl2.addClass('col-'+tl2.find('li').length);
    		tl2.find('li:first-child').addClass('active-link')
    		$(this).find('.tab-content').eq(0).addClass('active').find('.tab-inner').addClass('moveup');
    	});

		tl.find('li').click(function(){
			var i = $(this).index();
			var tw = $(this).parents('.tab-wrapper');
			$(this).addClass('active-link').siblings().removeClass('active-link')
	        $(this).parent().addClass('active').siblings().removeClass('active');
	        tl.find('.mobile-tab span').text(tl.find('.active-link span').text());
        	tw.find('.active .tab-inner').removeClass('moveup').addClass('movedown');
        	$(this).parent('ul').removeClass('opened');
        	$('.mobile-tab').removeClass('opened')
	        setTimeout(function(){
	            tw.find('.active').removeClass('active');
	            tw.find('.tab-content').eq(i).addClass('active');
	            setTimeout(function(){
	                tw.find('.active .tab-inner').removeClass('movedown').addClass('moveup')
	            },50);
	        },300);
    	});

    	tl.find('.mobile-tab span').text(tl.find('.active-link span').text());

    	$('.mobile-tab').on('click', function(){
			if($(this).hasClass('opened')) {
				$(this).removeClass('opened')
				$(this).siblings('ul').removeClass('opened')
			}else{
				$(this).addClass('opened')
				$(this).siblings('ul').addClass('opened')
			}
		})
	},
	Navigation:{
		init:function(){
			$('header ul li:not(".search, .lang")').on('click', function(){
				var t = $(this);
				if(D.stContainer.hasClass('st-menu-open')) D.Navigation.close(t);
				else D.Navigation.open(t);
			});
			$('.overlay').on('click', function () {
				var t = $(this);
				t.addClass('active');
				D.Navigation.close(t);
			});

			$('.search').on('click', function(){
				if($(this).hasClass('opened')) D.Navigation.searchClose();
				else D.Navigation.searchOpen();
			});

		},
		open:function (arg) {
			TweenMax.to($('.st-content .fixedColumn, .sidecontent-inner, .related-section'), 0.6, {x:-40, ease:Quint.easeOut});
			$('.sidenav.nav-'+ arg.attr('class')).addClass('opened');
			arg.addClass('active').siblings().removeClass('active');
			D.stContainer.addClass('st-menu-open');
		},
		close:function (arg) {
			if(arg.hasClass('active') || arg.parents().hasClass('nav-daily')) {
				$('header ul li').removeClass('active');
				$('.sidenav').removeClass('opened');
				D.stContainer.removeClass('st-menu-open');
				TweenMax.to($('.st-content .fixedColumn, .sidecontent-inner, .related-section'), 0.6, {x:0, ease:Quint.easeOut});
			}
			else {
				$('.sidenav').removeClass('opened');
				$('.sidenav.nav-'+ arg.attr('class')).addClass('opened');
				arg.addClass('active').siblings().removeClass('active');
				D.stContainer.addClass('st-menu-open');
				$('.bigslider').addClass('st-menu-open');
			}
		},
		searchOpen:function(){
			$('.search').addClass('opened');
			D.stContainer.addClass('st-search-open');
			TweenMax.to($('.search-wrap'), 0.6, {y:'100%', ease:Quint.easeOut});
			$('.search-wrap input').focus();
		},
		searchClose:function(){
			$('.search').removeClass('opened');
			D.stContainer.removeClass('st-search-open');
			TweenMax.to($('.search-wrap'), 0.7, {y : '0%', ease:Quint.easeOut});
			$('.search-wrap input').blur();

		}
	},
	setGridClass:function(){
		var anchorBox,
			lengthType;
			boxLength = $('.boxMenuWrapper .box-item').length,
			extraBoxes = $('.extra-items .box-item');
		if( boxLength == 2 ) {
			extraBoxes.eq(0).addClass('gif').appendTo('.boxMenuWrapper');
			lengthType = 2;
		}
		if( boxLength == 3 ) {
			extraBoxes.eq(0).addClass('w2').appendTo('.boxMenuWrapper');
			lengthType = 3;
		} else {
			if( boxLength == 8 ) {
				extraBoxes.addClass('gif').appendTo('.boxMenuWrapper');
				lengthType = 8;
			}
			else if( boxLength == 9 ) {
				extraBoxes.eq(0).addClass('gif').appendTo('.boxMenuWrapper');
				lengthType = 9;
			}
			else if( boxLength == 6 ) {
				extraBoxes.eq(0).addClass('gif').appendTo('.boxMenuWrapper');
				lengthType = 6;
			}
		}
		$('.sub-headline').insertAfter($('.boxMenuWrapper .box-item').eq(3));

		anchorBox = $('.boxMenuWrapper .box-item').eq(3);
		anchorBox.addClass('w2');
		anchorBox2 = $('.boxMenuWrapper .box-item').eq(4);
		anchorBox2.addClass('w2');
		$('.boxMenuWrapper').waitForImages().done(function() {
			setTimeout(function(){
				$('.boxMenuWrapper').addClass('loaded');
				anchorBox.next('.sub-headline').height(anchorBox.height() ).after( '<div class="clearbox"></div>' );
				$(window).resize(function(){
					anchorBox.next('.sub-headline').height(anchorBox.height());
				});
				TweenMax.to($('#menuPage .sideContent').not('.spec'), 0.9, {x:'0', opacity:1, ease:Quint.easeOut});
			},10)
		});
	},
    drawCircle: function(el) {
        var circle = el.find(".arc");
        var interval = 1;
        var angle = 0;
        var angle_increment = 4;

        window.timer = window.setInterval(function () {
            circle.attr("stroke-dasharray", angle + ", 20000");

            if (angle >= 360) {
                window.clearInterval(window.timer);
            }
            angle += angle_increment;
        }.bind(this), interval);
        TweenMax.set(el.find(".line1"), {width:'0'});
        TweenMax.set(el.find(".line2"), {height:'0'});
        TweenMax.to(el.find(".line1"), .6, {width:'100%', delay:0.2, ease:Quint.easeOut});
        TweenMax.to(el.find(".line2"), .6, {height:'100%', delay:0.4, ease:Quint.easeOut});
    },
    clearCircle:function(){
    	var circle = $(".arc");
    	window.clearInterval(window.timer);
    	clearTimeout(circleTimeout);
    	circle.attr("stroke-dasharray", ', 20000')
    }
  /*  FormElements: {
    	messageTr :['Bu alan zorunludur.'],
		messageEn :['This field is required.'],
		messageMailTr :['Lütfen geçerli bir email adresi giriniz.'],
		messageMailEn :['Please enter valid email address.'],
		messageCaptchaEn :['Please enter verification code.'],
		messageCaptchaTr :['Lütfen doğrulama kodunu giriniz.'],
        init: function () {
            D.FormElements.customPlaceholder();
            D.FormElements.checkbox();
            D.FormElements.radio();
            D.FormElements.selectBox();
            D.FormElements.validateContact();

            function getParameterByName(name) {
			    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
			        results = regex.exec(location.search);
			    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}
            if (getParameterByName('q') != null) {
		        keyword = encodeURIComponent( getParameterByName('q') ).replace(/'/g,"%27").replace(/"/g,"%22");
		        keywordText = getParameterByName('q');
		    }
		    keyword = ((keyword == "") ? keyword = "..." : keyword);

		    if($('.searchResultPage').length != 0 ) D.FormElements.getSearchResult(keyword,pageSize,1);
           // if($('.contactForm').length!=0) D.FormElements.getirCaptcha(1,150,40,6);

            $('#refreshCaptcha').on('click', function(){
            	D.FormElements.getirCaptcha(1,150,40,6);
            });
        },
   //     getSearchResult:function(keyword, pageSize, currentPage){
   //     	var langS;
   //     	$.ajax({
			//	url: '/p/Plugins.ashx',
			//	type: 'POST',
			//	data: {
			//		'plugin': 'search',
			//		'searchtext': keyword,
			//		'pagesize': pageSize,
			//		'currentpage':currentPage,
			//		'lang': langTr ? 'TR' : 'EN',
			//		'siteid': langTr ? '6' : '7',
			//		'excludearticles':'1275,1347'
			//	},
			//	dataType: 'json',
			//	success: function (data) {
			//		if(data != "" || data != 0 ) {
			//			var pagerCount = data[0].PageCount;
			//			var itemCount = data[0].ItemCount + "";
			//			$('.search-result-list').html('');

			//			$.each(data, function() {
		 //                  result = '<div class="item"><a href="' + this.Alias + '"><p class="title">' + this.Headline + '</p><p>' + this.Summary + '</p></a></div>';
		 //                 	$('.search-result-list').append(result);
		 //               });

			//			$('.searched-text.on').show();
			//			$('.searched-text.not').hide();
			//			$('.searched-text small.keywordItem').text(itemCount);
		 //               if(langTr) $('.searched-text span.keywordText').text(keywordText);
			//			else $('.searched-text span.keywordText').text(keywordText);

		 //               $('.search-pager').pagination({
			//				hrefTextPrefix: '#',
			//				pages: pagerCount,
			//				currentPage: currentPage,
			//				displayedPages: 3,
			//				edges:1,
			//				prevText: '<',
			//				nextText: '>',
			//				selectOnClick:false,
			//				onPageClick: function(pageNumber, event) {
			//					event.preventDefault();
			//					D.FormElements.getSearchResult(keyword, pageSize, pageNumber);
			//			    }
			//			});
			//			if(pagerCount<=1) $('.search-pager').css({'display':'none'});
			//		} else {
			//			if(langTr) $('.searched-text span.keywordText').text(keywordText);
			//			else $('.searched-text span.keywordText').text(keywordText);
			//			$('.searched-text.on').hide();
			//			$('.searched-text.not').show();
			//		}
			//	}
			//});
   //     },
/!*        radio: function () {
            $('input:radio').change(function () {
                var current = $(this);
                if (current.is(':checked')) {
                    var lbl = $(this).next('label');
                    current.parents('.radio-wrap').find('label').removeClass('checked');
                    if (!lbl.hasClass('checked')) {
                        lbl.addClass('checked');
                    }
                }
            });
        },
        checkbox: function () {
            $('input:checkbox').change(function () {
                var lbl = $(this).next('label');
                if ($(this).is(':checked')) {
                    lbl.addClass('checked');
                }
                else {
                    lbl.removeClass('checked');
                }
            });
        },
        customPlaceholder: function () {
            $('input[placeholder], textarea[placeholder]').placeholder();
        },
        setMaxLength: function () {
            $('textarea#mesaj').maxlength({ maxCharacters: 300, statusText: '/300' });
        },
        selectBox:function(){
        	$('.selectpicker').selectpicker();
        },
        validateContact:function(){
        	var req, email;
        	$('.contactForm').validate({
				rules:{
					name:{required:true},
					email:{required:true, email:true},
					sector:{required:true},
					message:{required:true},
					captchaValue:{required:true}
				},
				messages:{
					name:{required: req = langTr ? D.FormElements.messageTr : D.FormElements.messageEn },
					email:{required: req = langTr ? D.FormElements.messageTr : D.FormElements.messageEn , email: email = langTr ? D.FormElements.messageMailTr : D.FormElements.messageMailEn },
					sector:{required: req = langTr ? D.FormElements.messageTr : D.FormElements.messageEn },
					message:{required: req = langTr ? D.FormElements.messageTr : D.FormElements.messageEn },
					captchaValue:{required: req = langTr ? D.FormElements.messageCaptchaTr : D.FormElements.messageCaptchaEn }
				},
				submitHandler:function(form,event){
					var captval;
					event.preventDefault();
					var formData = new FormData(form);
					var other_data = $('.contactForm').serializeArray();
					$.each(other_data, function (key, input) {
	                    formData.append(input.name, input.value);
	                });
					formData.append('Custom','contactform');
                	formData.append("articleid", '1100');
                	formData.append("captchaid", '1');
					$.ajax({
						url: '/Custom/sendContactForm',
						type: 'POST',
						data: formData,
						dataType: 'json',
						contentType: false,
                    	processData: false,
						success: function (data) {
							console.log("success");
							if (data.Success) {
								$('.contactForm')[0].reset();
								$('.selectpicker').selectpicker('refresh');
								$('.successResult').addClass('reveal')
								setTimeout(function () {
									$('.successResult').removeClass('reveal')
								}, 5000);
								console.log("geldim");
								D.FormElements.getirCaptcha(1, 150, 40, 6);
							}
							else {
									var $validator = $(".contactForm").validate();
									var errors = { captchaValue: captval = langTr ? "Doğrulama kodu yanlış girildi." : 'Verification code is invalid.' };
									$validator.showErrors(errors);
								}
						},
						error: function (data) {
							console.log("hata");
                        }
					});
				}
			});
        },
		getirCaptcha: function (cid, cwi, che, clen) {
			$.ajax({
				url: '/Custom/ShowCaptchaImage',
				type: 'POST',
				data: {
					'Custom': 'ShowCaptchaImage',
					'captchaId': cid,
					'width': cwi,
					'height': che,
					'length': clen
				},
				success: function (data) {
					console.log("yenile geldi");
					jQuery("#imgCaptcha1").remove();
					$("<img src='/Custom/ShowCaptchaImage' id='imgCaptcha1'>").insertBefore("#refreshCaptcha");
				}
			});
		}*!/
	},*/

/*    getTags:function(key, pageSize, currentPage){
    	var tagPage = true;
    	if( $('body').hasClass('static') || $('body').attr('id') == 'indexPage' ) tagPage = false;


    	if(tagPage){
    		if( !$('body').hasClass('tagResult') ) {
    			for(i=0;i<tags.length; i++) {
		    		for(k=0;k<1; k++) {
		    			var key = tags[i][0].replace(/\s+/g, '-');
		    			var relatedTagLink = langTr ? 'ilgili-etiketler#' : '/en/related-tags#';
		    			$('.tag-wrap .tags').append('<li><a href="'+ relatedTagLink +'' + tags[i][2] + '">'+ tags[i][0] +' </a></li>')
		    		}
		    	}
    		}
	    	key = window.location.hash.substr(1);
	    	//var tagArticleId = langTr ? '1296' : '1309';
	  //  	$.ajax({
			//	url: '/p/Plugins.ashx',
			//	type: 'POST',
			//	data: {
			//	    'plugin':'searchtags',
			//	    'articleid' : tagArticleId,
			//		'tagalias' : key,
			//		'pagesize' : pageSize,
			//		'currentpage' : currentPage
			//	},
			//	dataType: 'json',
			//	success: function (data) {
			//		if(data != "" || data != 0 ) {
			//			var pagerCountT = data[0].PageCount;
			//			$('.tag-results').html('');
			//			$.each(data, function() {
		 //                  	result = '<div class="item"><a href="' + this.Alias + '"><p class="title">' + this.Headline + '</p><p>' + this.Summary + '</p></a></div>';
		 //                  	$('.tag-results').append(result);
		 //               });

		 //               $('.tag-pager').pagination({
			//				hrefTextPrefix: '#',
			//				pages: pagerCountT,
			//				currentPage: currentPage,
			//				displayedPages: 3,
			//				edges:1,
			//				prevText: '<',
			//				nextText: '>',
			//				selectOnClick:false,
			//				onPageClick: function(pageNumber, event) {
			//					event.preventDefault();

			//					D.getTags(key,pageSize,pageNumber);
			//			    }
			//			});
			//			if(pagerCountT<=1) $('.tag-pager').css({'display':'none'})
			//		}
			//	}
			//});
	    }
    },
    pushRelatedArticles:function(){
  //  	var aId = $('.article_id').text();
  //  	var zId = $('.zone_id').text();
  //  	var hzId = langTr ? '12' : '25';
  //  	var langType = langTr ? 'TR' : 'EN';
  //  	$.ajax({
		//	url: '/ana-sayfa/Index',
		//	type: 'POST',
		//	data: {
		//		'plugin':'relatedarticles',
		//		'articleid' : aId,
		//		'zoneid': zId,
		//		'lang': langType,
		//		'homepagezoneid': hzId
		//	},
		//	dataType: 'json',
		//	success: function (data) {
		//		if(data != "" || data != 0 ) {

		//			if(data.Status == 'OK') {
		//				$('.bottom-carousel').html();
		//				for(i=0; i < data.Articles.length; i++ ) {
		//					var relatedResult = '<div class="item"><a href="' + data.Articles[i].Alias + '"><figure style="background-image:url(Content/assets../Content/'+ data.Articles[i].Image +')"></figure><div class="title">' + data.Articles[i].Headline + '</div></a></div>';
		//					if(data.Articles[i].Relation == 'Tag' || data.Articles[i].Relation == 'CommonZone' ) $('.related-carousel').append(relatedResult);
		//					else $('.daily-carousel').append(relatedResult);
		//					//if( i < Math.round(data.Articles.length / 2) ) $('.related-carousel').append(relatedResult);
		//					//else $('.daily-carousel').append(relatedResult);
		//				}
		//	            D.getCarousel();
		//			}
		//		}
		//	}
		//});
    },
    createTree:function(item){
	    for (var i = 0; i < item.length; i++) {
	        for(var key in item[i]) {
	            if(key == "Name") {
	                treeDom += '<div>';
	                treeDom += '<a href="' + [item[i]["URL"]] + '">' + [item[i][key]] + '</a>';
	            }
	            if(key == "Items") {
	                if(item[i][key].length > 0){
	                    treeDom += '<div>';
	                    D.createTree(item[i][key]);
	                    treeDom += '</div>';
	                }
	            }
	            if(key == "Name") {
	                treeDom += '</div>';
	            }
	        }
	    }
    },
    appendTree:function(){
		if ($('.sitemapmenuwrap').length >= 1) {
			D.createTree(siteMapData = langTr ? siteMapResultJson8 : siteMapResultJson16);
			$('.sitemapmenuwrap').append(treeDom);
			$('.sitemapmenu').prepend( langTr ? '<div><a href="ana-sayfa">ANASAYFA</a></div>' : '<div><a href="/en/homepage">HOMEPAGE</a></div>');
		}
    }*/
}
$(document).ready(function () {
	D.commonInit();

	//BizD Dergi Slider
	$('#dergiSlider').slick({
	  infinite: true,
	   arrows: true,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 4,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 980,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}

	  ]
	});


	$(".sidecontent-inner1 .dergiCont#d1").show()
	$('#dergiSlider .slick-slide a').each(function () {
	  $(this).on('click', function () {
		var trel = $(this).attr('rel');
		$(".dergiCont").hide();
		$(".dergiCont#"+trel).show();
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
	  });
	});

	//BizD Dergi Slider

});



