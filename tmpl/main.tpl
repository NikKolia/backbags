<!DOCTYPE html>
<html lang="ru">
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->
<head>
	<meta name="google-site-verification" content="fjSATIwN5EmblWnjpIS_KvvOy3qgI6Q_qpLwqqHTpQQ" />
	<title><?=$this->title?></title>
	<meta name="robots" content="index, follow" />
	<base href="http://bag.zahist.club/" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<meta name="description" content="<?=$this->meta_desc?>" />
	<meta name="keywords" content="<?=$this->meta_key?>" />
	<meta property="fb:app_id" content="145741509378126" /> 
	<meta property="og:type" content="website" /> 
	<meta property="og:site_name" content="Качественные, стильные и удобные городские рюкзаки AspenSport" /> 
	<meta property="og:url" content="http://bag.zahist.club/" /> 
	<meta property="og:title" content="Стильные городские рюкзаки AspenSport. Выбери сейчас!" />
	<meta property="og:description" content="Удобные и качественные городские рюкзаки AspenSport. Акция! ✓ Оплата при получении! ✓ Бесплатная доставка по Украине ✓ Доступные цены ☎ (097)990-42-90, (095)002-49-02 ✓ Здесь Вы можете купить стильные ортопедические водонепроницаемые рюкзаки для ноутбуков : износостойкие, прочные и удобные рюкзаки на каждый день" />	
	<meta property="og:locale" content="ru_RU">
	<meta property="og:image:alt" content="Городские рюкзаки AspenSport" />
	<meta property="og:image" content="http://bag.zahist.club/img/fb_sharing.png" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="libs/owlcarousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="libs/owlcarousel/owl.theme.green.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />	
	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
	<script src="libs/jquery/jquery.min.js"></script>
	<script src="libs/jquery-scrollup/jquery.scrollup.min.js"></script>
	<script type="text/javascript">
		document.ondragstart = test;
		document.onselectstart = test;
		document.oncontextmenu = test;
			function test() {
			return false;
			}
		document.oncontextmenu;
		function catchControlKeys(event){
			var code=event.keyCode ? event.keyCode : event.which ? event.which : null;
			if (event.ctrlKey){
			// Ctrl+U
			if (code == 117) return false;
			if (code == 85) return false;
			// Ctrl+C
			if (code == 99) return false;
			if (code == 67) return false;
			// Ctrl+A
			if (code == 97) return false;
			if (code == 65) return false;
			}
		}
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108797490-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-108797490-1');
	</script>
</head>
<body onkeypress="return catchControlKeys(event)">
	<header>
		<div class="header_topline">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 logo">
						<a href="https://www.facebook.com/aspensport.ua" target="_blank">
							<img src="img/fb.png" alt="facebook" onmouseover="this.src='img/fb_active.png'" onmouseout="this.src='img/fb.png'" />
						</a>
					</div>
					<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 slogan">
						<h1>Стильные рюкзаки "AspenSport" - качество и удобство!</h1>
					</div>					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="contacts">	
							<p class="tel1">(097)990-42-90</p>
							<p class="tel2">(095)002-49-02</p>
							<a class="mailhref" href="mailto:info@chameleon.org.ua">info@bag.zahist.club</a>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container-fluid" id="content">
		<div class="row center">
			<div class="col-md-3" id="left">
				<div id="menu">
					<div class="header">
						<h3>Разделы</h3>
					</div>
					<div id="items">
						<p><a href="<?=$this->index?>">Все рюкзаки</a></p>
						<p><a href="<?=$this->link_models?>">Все модели</a></p>
						<?php for ($i = 0; $i < count($this->items); $i++) { ?>
							<p <?php if ($i + 1 == count($this->items)) {?>class="last"<?php }?>>
								<a href="<?=$this->items[$i]["link"]?>"><?=$this->items[$i]["title"]?></a>
							</p>
						<?php } ?>
					</div>
				</div>
				<div class="counter">
					<p class="center count1">Акция от призводителя:<br /><span class="red">доставка - БЕСПЛАТНО!</span><br />До конца акции осталось:</p>
					<div class="countdown"></div>		
					<p class="center count2">Оплата заказанного товара при получении!</p>
					<img class="deliv" src="img/deliv.png" alt="Доставка бесплатно!" />
				</div>
			</div>
			<div class="col-md-9 border borderbottom">
				<div id="right">
					<?php include "content_".$this->content.".tpl"; ?>
				</div>
				<div class="advantages">
					<p>- Улучшенный дизайн</p>
					<p>- Защитный отдел для ноутбука</p>
					<p>- Для учёбы, работы, путешествий, прогулок</p>
					<p>- Качество материалов соответствует европейским стандартам</p>
					<p>- Водоотталкивающий материал обеспечивает защиту от влажности</p>
				</div>		
				<div class="callbtext center bg-blue">
					<p>Появились вопросы? Хотите оформить заказ? Мы Вам перезвоним! </p>
				</div>
				<form id="callback" class="bg-blue">
					<div class="callback">	
						<input type="text" name="name" class="border first" placeholder="Ваше имя..." />
						<input type="text" name="phone" class="border middle" placeholder="Номер телефона..." required />
						<button class="button" type="submit">Оформить заявку</button>
					</div>
				</form>			
				<div class="title-delivery">
					<p>КАК МЫ РАБОТАЕМ:</p>
				</div>
				<div class="delivery">
					<p class="img">
						<img src="img/order1.png" class="img-responsive" alt="Доставка1" />
					</p>
					<p class="text">Оставляете заявку на сайте через форму или по телефону</p>
				</div>
				<div class="delivery">
					<p class="img">
						<img src="img/order2.png" class="img-responsive" alt="Доставка2" />
					</p>
					<p class="text">Наш менеджер уточнит и согласует детали заявки</p>
				</div>
				<div class="delivery">
					<p class="img">
						<img src="img/order3.png" class="img-responsive" alt="Доставка3" />
					</p>
					<p class="text">Вы получаете товар и платите за него на почте или курьеру</p>
				</div>
				<div class="row floatleft fb_low">
					<div class="col-md-6">
						<iframe src="https://www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2Faspensport.ua&amp;layout=standard&amp;show_faces=true&amp;colorscheme=light&amp"></iframe>		
					</div>				
				</div>	
			</div>				
		</div>			
		<div class="row" id="footer">
			<div class="col-md-4" id="copy">	
				<p><span class="copy">"ЗАХИСТ-club" &copy; 2016.</span><br />Разработка и поддержка - <a href="http://chameleon.org.ua/" target="_blank">chameleon.org.ua</a></p>		
			</div>		
			<div class="col-md-4" id="counter">
				<p><!--LiveInternet counter--><script type="text/javascript">
				document.write("<a href='//www.liveinternet.ru/click' "+
				"target=_blank><img src='//counter.yadro.ru/hit?t52.16;r"+
				escape(document.referrer)+((typeof(screen)=="undefined")?"":
				";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
				screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
				";h"+escape(document.title.substring(0,150))+";"+Math.random()+
				"' alt='' title='LiveInternet: показано число просмотров и"+
				" посетителей за 24 часа' "+
				"border='0' width='88' height='31'><\/a>")
				</script><!--/LiveInternet-->
				</p>
				<p class="wm">
					<!-- webmoney passport label#7E7EE140-7132-4D51-8171-679FFD5511BF begin -->
					<a href="//passport.webmoney.ru/asp/certview.asp?wmid=396988135932" target="_blank">
					<img src="img/wm_at.png" alt="Здесь находится аттестат нашего WM идентификатора 396988135932">
					</a> 
					<!-- webmoney passport label#7E7EE140-7132-4D51-8171-679FFD5511BF end -->
				</p>				
				<p class="kassa">
					<a href="https://www.interkassa.com/" target="_blank"><img src="img/interkassa.png" alt="www.interkassa.com" /></a>
				</p>
			</div>			
		</div>
	</div>
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="libs/jquery-scrollup/jquery.scrollup.min.js"></script>
	<script src="libs/owlcarousel/owl.carousel.min.js"></script>
	<script src="libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="libs/countdown/jquery.plugin.js"></script>
	<script src="libs/countdown/jquery.countdown.min.js"></script>
	<script src="libs/countdown/jquery.countdown-ru.js"></script>
	<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="js/common.js"></script>
	
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'UWzinU4PrR';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
	<!-- {/literal} END JIVOSITE CODE -->

	<!-- uSocial -->
	<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
	<div class="uSocial-Share" data-pid="e112eb296c4fa2723f73cb904687705e" data-uscl-host="https://usocial.pro" data-type="share" data-options="round-rect,style1,default,left,slide-down,size32,eachCounter0,counter1,counter-after" data-social="fb,gPlus,lin,twi,pinterest,tumblr,spoiler" data-mobile="vi,wa,sms"></div>
	<!-- /uSocial -->
</body>
</html>