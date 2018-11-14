@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="/wap/css/commes.css" />
<link rel="stylesheet" href="/wap/css/photoswipe.css"> 
<link rel="stylesheet" href="/wap/css/default-skin/default-skin.css">
@endsection
@section('content')

    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>	

            <div class="m_wrapper clear">
                <div class="m_category">
                    <a href="/"><div class="titlel">优惠券</div></a>  <a href="{{ route('wap.moments') }}"><div class="titler active">颖上朋友圈</div></a>
                </div>		
            </div>
<!---->
	<div class="container">
    	<!--用户头像-->
		<div class="header_pic">
			<div><img src="/wap/images/s1_m.jpg" /></div>
		</div>
		<div class="right_con">
			<div class="demo">
            	<!--用户名and发布时间-->
            	<div class="use">
                	<div class="usename"><span>徐静蕾</span><em class="pub-time">刚刚</em></div>
                </div>
                <!--分享的内容-->
                <p class="fx_content">适用浏览器：IE8、360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗.</p>
                <!--分享的图片-->
                <div class="my-gallery">
                    <figure>
                        <a href="/wap/images/aside_game3.png" data-size="800x1142">
                            <img src="/wap/images/aside_game3.png" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s2.jpg" data-size="800x1142">
                            <img src="/wap/images/s2_m.jpg" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s3.jpg" data-size="800x1142">
                            <img src="/wap/images/s3_m.jpg" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s4.jpg" data-size="800x1142">
                            <img src="/wap/images/s4_m.jpg" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s5.jpg" data-size="800x1142">
                            <img src="/wap/images/s5_m.jpg" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s3.jpg" data-size="800x1142">
                            <img src="/wap/images/s3_m.jpg" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s4.jpg" data-size="800x1142">
                            <img src="/wap/images/s4_m.jpg" />
                        </a>
                    </figure>
                    <figure>
                        <a href="/wap/images/s5.jpg" data-size="800x1142">
                            <img src="/wap/images/s5_m.jpg" />
                        </a>
                    </figure>
                </div>
                <!--显示的位置-->
                <div class="fx_address">生活</div><div class="fx_address_zan">(356)</div><div class="fx_address_footbook">(666)</div><div class="fx_address_comment">(666)</div>
            </div>
		</div>
	</div>	
    <div class="container">
    	<!--用户头像-->
		<div class="header_pic">
			<div><img src="/wap/images/s1_m.jpg" /></div>
		</div>
		<div class="right_con">
			<div class="demo">
            	<!--用户名and发布时间-->
            	<div class="use">
                	<div class="usename"><span>徐静蕾</span><em class="pub-time">12:32</em></div>
                </div>
                <!--分享的内容-->
                <p class="fx_content">你不知道的晨跑，好消息，合作谈妥了！！！</p>
                <!--分享的图片-->
                <div class="my-gallery">
                    <figure>
                        <a href="/wap/images/s1.jpg" data-size="800x1142">
                            <img src="/wap/images/s1.jpg" alt="Image description" />
                        </a>
                    </figure>
                </div>
                <!--显示的位置-->
                <div class="fx_address">租售</div><div class="fx_address_zan">(356)</div><div class="fx_address_footbook">(666)</div><div class="fx_address_comment">(666)</div>
            </div>
		</div>
	</div>	
<!--以下内容不要管-->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
   							<div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
             	<div class="pswp__share-tooltip"></div> 
           	 </div>
             <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
             <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
             <div class="pswp__caption">
             	<div class="pswp__caption__center"></div>
			 </div>
		</div>
	</div>
</div>
        <script src="/wap/js/photoswipe.min.js"></script> 
        <script src="/wap/js/photoswipe-ui-default.min.js"></script> 
        <script type="text/javascript">
            var initPhotoSwipeFromDOM = function(gallerySelector) {

                // parse slide data (url, title, size ...) from DOM elements 
                // (children of gallerySelector)
                var parseThumbnailElements = function(el) {
                    var thumbElements = el.childNodes,
                            numNodes = thumbElements.length,
                            items = [],
                            figureEl,
                            linkEl,
                            size,
                            item;

                    for (var i = 0; i < numNodes; i++) {

                        figureEl = thumbElements[i]; // <figure> element

                        // include only element nodes 
                        if (figureEl.nodeType !== 1) {
                            continue;
                        }

                        linkEl = figureEl.children[0]; // <a> element

                        size = linkEl.getAttribute('data-size').split('x');

                        // create slide object
                        item = {
                            src: linkEl.getAttribute('href'),
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10)
                        };



                        if (figureEl.children.length > 1) {
                            // <figcaption> content
                            item.title = figureEl.children[1].innerHTML;
                        }

                        if (linkEl.children.length > 0) {
                            // <img> thumbnail element, retrieving thumbnail url
                            item.msrc = linkEl.children[0].getAttribute('src');
                        }

                        item.el = figureEl; // save link to element for getThumbBoundsFn
                        items.push(item);
                    }

                    return items;
                };

                // find nearest parent element
                var closest = function closest(el, fn) {
                    return el && (fn(el) ? el : closest(el.parentNode, fn));
                };

                // triggers when user clicks on thumbnail
                var onThumbnailsClick = function(e) {
                    e = e || window.event;
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;

                    var eTarget = e.target || e.srcElement;

                    // find root element of slide
                    var clickedListItem = closest(eTarget, function(el) {
                        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
                    });

                    if (!clickedListItem) {
                        return;
                    }

                    // find index of clicked item by looping through all child nodes
                    // alternatively, you may define index via data- attribute
                    var clickedGallery = clickedListItem.parentNode,
                            childNodes = clickedListItem.parentNode.childNodes,
                            numChildNodes = childNodes.length,
                            nodeIndex = 0,
                            index;

                    for (var i = 0; i < numChildNodes; i++) {
                        if (childNodes[i].nodeType !== 1) {
                            continue;
                        }

                        if (childNodes[i] === clickedListItem) {
                            index = nodeIndex;
                            break;
                        }
                        nodeIndex++;
                    }



                    if (index >= 0) {
                        // open PhotoSwipe if valid index found
                        openPhotoSwipe(index, clickedGallery);
                    }
                    return false;
                };

                // parse picture index and gallery index from URL (#&pid=1&gid=2)
                var photoswipeParseHash = function() {
                    var hash = window.location.hash.substring(1),
                            params = {};

                    if (hash.length < 5) {
                        return params;
                    }

                    var vars = hash.split('&');
                    for (var i = 0; i < vars.length; i++) {
                        if (!vars[i]) {
                            continue;
                        }
                        var pair = vars[i].split('=');
                        if (pair.length < 2) {
                            continue;
                        }
                        params[pair[0]] = pair[1];
                    }

                    if (params.gid) {
                        params.gid = parseInt(params.gid, 10);
                    }

                    return params;
                };

                var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                    var pswpElement = document.querySelectorAll('.pswp')[0],
                            gallery,
                            options,
                            items;

                    items = parseThumbnailElements(galleryElement);

                    // define options (if needed)
                    options = {
                        // define gallery index (for URL)
                        galleryUID: galleryElement.getAttribute('data-pswp-uid'),
                        getThumbBoundsFn: function(index) {
                            // See Options -> getThumbBoundsFn section of documentation for more info
                            var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                    rect = thumbnail.getBoundingClientRect();

                            return {x: rect.left, y: rect.top + pageYScroll, w: rect.width};
                        }

                    };

                    // PhotoSwipe opened from URL
                    if (fromURL) {
                        if (options.galleryPIDs) {
                            // parse real index when custom PIDs are used 
                            // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                            for (var j = 0; j < items.length; j++) {
                                if (items[j].pid == index) {
                                    options.index = j;
                                    break;
                                }
                            }
                        } else {
                            // in URL indexes start from 1
                            options.index = parseInt(index, 10) - 1;
                        }
                    } else {
                        options.index = parseInt(index, 10);
                    }

                    // exit if index not found
                    if (isNaN(options.index)) {
                        return;
                    }

                    if (disableAnimation) {
                        options.showAnimationDuration = 0;
                    }

                    // Pass data to PhotoSwipe and initialize it
                    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                    gallery.init();
                };

                // loop through all gallery elements and bind events
                var galleryElements = document.querySelectorAll(gallerySelector);

                for (var i = 0, l = galleryElements.length; i < l; i++) {
                    galleryElements[i].setAttribute('data-pswp-uid', i + 1);
                    galleryElements[i].onclick = onThumbnailsClick;
                }

                // Parse URL and open gallery if it contains #&pid=3&gid=1
                var hashData = photoswipeParseHash();
                if (hashData.pid && hashData.gid) {
                    openPhotoSwipe(hashData.pid, galleryElements[ hashData.gid - 1 ], true, true);
                }
            };

        // execute above function
            initPhotoSwipeFromDOM('.my-gallery');
        </script>		
				
<!---->	<div class="bottom_box"></div>	
        </div>
			
    </div>

@endsection