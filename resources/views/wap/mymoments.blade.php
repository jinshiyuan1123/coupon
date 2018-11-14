@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/wap/css/commes.css') }}" />
<link rel="stylesheet" href="{{ asset('/wap/css/photoswipe.css') }}"> 
<link rel="stylesheet" href="{{ asset('/wap/css/default-skin/default-skin.css') }}">	
@endsection
@section('content')
    <div class="m_container">
        <div class="m_body2">

            <div class="m_wrapper clear">
                <div class="m_member-title1 clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
					
                    我的动态
					<a href="{{ route('wap.releasemoments') }}" class="pull-right" style="color:#00BCD4">发动态</a>
                </div>
                <div class="m_userCenter-line"></div>
<!---->
@foreach($data as $v)
	<div class="container">
    	<!--用户头像-->
		<div class="header_pic">
			<div><img src="{{$v->headpic}}" /></div>
		</div>
		<div class="right_con">
			<div class="demo">
            	<!--用户名and发布时间-->
            	<div class="use">
                	<div class="usename"><a href="{{ route('wap.mymoments') }}/{{$v->id}}" style="color:#ed4947;"><span>{{$v->nichen}}</span></a><em class="pub-time">{{$v->created_at}}</em></div>
                </div>
                <!--分享的内容-->
                <p class="fx_content"><a href="{{ route('wap.mymoments') }}/{{$v->id}}" style="color:#4a4848;">{{$v->content}}</a></p>
                <!--分享的图片-->
                <div class="my-gallery">
				@if($v->imgurltotal > 0)
				  @foreach($v->imgurl as $c)
                    <figure>
                        <a href="{{$c}}" data-size="800x1142">
                            <img src="{{$c}}" />
                        </a>
                    </figure>
				   @endforeach	
				@endif
                </div>
                <!--显示的位置-->
              @if($v->statu==0) <div class="fx_address">审核中</div> @endif <a href="{{ route('wap.mymoments') }}/{{$v->id}}"><div class="fx_address_footbook">({{$v->message}})</div></a><div id="{{$v->id}}" class="@if(in_array($v->id,$arrayzan)) fx_address_zan2 @else fx_address_zan @endif" onclick="zan(this.id)">(<span class="{{$v->id}}">{{$v->zan}}</span>)</div><div class="fx_address">{{$v->MomentsClassname}}</div>
            </div>
		</div>
	</div>	
@endforeach	
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
			
			
//点赞请求
function zan(id){
	    //获取系统参数
	    var domain=document.domain;
		var getid='#'+id;
		$.ajax({  
			type:'get',  
			url:'http://'+domain+'/m/zan/'+id,  
			data:'',  
			success:function(data){//返回json结果	
              $('.'+id+'').html(data['zan']);		
 			  if(data['msg']==1){
				  alert("请先登录");
				  location.assign('/m/login');
			  }else if(data['msg']==2){
				  $('#'+id+'').removeClass('fx_address_zan2');
				  $('#'+id+'').addClass('fx_address_zan');				  
				  alert("已取消点赞");
			  }else{
				  $('#'+id+'').removeClass('fx_address_zan');
				  $('#'+id+'').addClass('fx_address_zan2');				  
				  alert("点赞成功"); 
			  } 
			} 
 			
			  
		}); 
}			
			
        </script>		
				
<!---->	
<div style="width:95%;margin:0 auto">
{!! $data->links() !!}
</div>
<div class="bottom_box"></div>	
            </div>


        </div>
    </div>

@endsection