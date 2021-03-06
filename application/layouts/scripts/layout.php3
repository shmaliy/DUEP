 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
	// установка ссылок в скрипте вида:
	$this->headLink()->appendStylesheet('/theme/css/main.css')
		
	     ->headLink(array('rel' => 'favicon',
	                      'href' => '/img/favicon.ico'),
	                      'PREPEND');
	// вывод ссылок:
	echo $this->headLink(); 
?>
<?php
		$this->headScript()->appendFile('/js/jquery/jquery.js');
		$this->headScript()->appendFile('/js/jquery/jquery-1.7.2.min.js');
		$this->headScript()->appendFile('/js/jquery/jquery-ui-1.8.20.custom/jquery-ui-1.8.20.custom.min.js');
		$this->headScript()->appendFile('/js/jquery/jquery.jqGrid-4.3.3/i18n/grid.locale-ru.js');
		$this->headScript()->appendFile('/js/jquery/jquery.swfupload/swfupload.js');
		$this->headScript()->appendFile('/js/jquery/jquery.swfupload.js');
		$this->headScript()->appendFile('/js/jquery/jquery.synctranslit.js');
		$this->headScript()->appendFile('/js/script.js');
		$this->headScript()->appendFile('/js/index.js');
		$this->headScript()->appendFile('/js/baner.js');
		$this->headScript()->appendFile('/js/content.js');
		$this->headScript()->appendFile('/js/gallery.js');
		echo $this->headScript();
    ?>
		
	<meta charset="utf-8" />
	<title>DUEP</title>
</head>
<body onload="load();">
	<div class='load' style="display:none;">
	<div class="header">
		<div class="headerResize">
			<a href="/" class="logo">
				<img src="/theme/img/front/<?php echo Zend_Registry::get('trasvistit')->_("LOGO");?>"/>
			</a>
			
			<?php echo $this->Lang(); ?>

			<div class="user_block">
				<div><a href=""><?php echo Zend_Registry::get('trasvistit')->_("INPUT");?></a> / <a href=""><?php echo Zend_Registry::get('trasvistit')->_("REGISTRATION");?></a></div>
				<div><a href=""><?php echo Zend_Registry::get('trasvistit')->_("REMEMBER_PASS");?></a></div>
				<div><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'default', array(), 'default' ); ?>"><?php echo Zend_Registry::get('trasvistit')->_("ADMIN");?></a></div>
			</div>
			
			<div class="clear"></div>
			
			<div class="menu">
				<div class="menu_left"></div>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" height="">
					<tr class="first">
						<!--td class="active"><div class="menu_item"><a href="">Университет</a></div></td-->
						<td class="main_down">
							<a href="#" class="menu_item">Университет</a>
							<div class="dropDown">
								<div class="droupdaun_top"></div>
								<ul class = "list_main">
									<li><a href="">Университет</a></li>
									<li><a href="">Руководство</a></li>
									<li><a href="">Награды</a></li>
									<li><a href="">Про нас пишут</a></li>
									<li><a href="">Структура Университета</a></li>
								</ul>
								<div class="droupdaun_bottom"></div>
							</div>
						</td>
						<td class="main_down"><div class="menu_item"><a href="">Образование<br> для жизни!</a></div>

							<div class="dropDown">
								<div class="droupdaun_top"></div>
								<ul class = "list_main">
									<li><a href="">Университет</a></li>
									<li><a href="">Руководство</a></li>
									<li><a href="">Награды</a></li>
									<li><a href="">Про нас пишут</a></li>
									<li><a href="">Структура Университета</a></li>
								</ul>
								<div class="droupdaun_bottom"></div>
							</div>
						</td>
						<td><a href="">Студенческая<br> жизнь</a></td>
						<td><a href="">Наука</a></td>
						<td><a href="">Международное<br> сотрудничество</a></td>
						<td><a href="">Нобелевские<br> конгрессы</a></td>
						<td class="no_li"><a href="">Почётные<br> профессора</a></td>
					</tr>
					<!--tr class="last">
						<td class="active">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr-->
				</table>
				<div class="menu_right"></div>
			</div>
		</div>
	</div>
	<div class="body">
		<div class="pushTop"></div>
		
		<div class="contentWrapper">
		<div class="content_show" style = "display: none;">
			<?php echo $this->layout()->content; ?>
		</div>
		</div>
		<div class="pushBottom"></div>
		
	</div>
		<div class="footer">
			<div class="menu MyriadProCondRegular"><a href="">Издательство</a> | <a href="">Школа бизнеса</a> | <a href="">Уэльс</a> | <a href="">Библиотека</a> | <a href="">Карта сайта</a></div>
			<div class="left footer_item">
				<a href="" class="logo"><img src="/theme/img/front/logo_small.png"/></a>
				<div class="left ">
					<b>Днепропетровский университет<br/>
					им. Альфреда Нобеля</b><br/>
					Все права защищены, 2012
				</div>
            </div>					
			<div class="left footer_item">
				<b>Приёмная комиссия</b><br />
				+38(056)370-36-21<br />
				+38(0562)31-24-40<br/>
				<b>Приёмная ректора</b><br/>
				+38(056)370-36-26
			</div>
			<div class="left footer_item">
				<b>Адрес:</b><br />
				ул. Набережная Ленина 18<br />
				<a href="mailto:abit@duep.edu">abit@duep.edu</a><br/>
				<a href="">Другие формы связи</a><br/>
			</div>
			<div class="right">
			   <a href="sunny.net.ua"><img src="/theme/img/front/sunny_logo.png" class="sunny_logo"/></a>
			</div>						
			<div class="right footer_item">
			   <form action="" method="">
					<div class="search">
						<div class="search_left"></div>
						<input type="text" class="input" value="<?php echo Zend_Registry::get('trasvistit')->_("SEARCH_SITE");?>"/> 
						<input type="submit" class="submit" value=""/> 
					</div>
			   </form>
			<div class="social_networks"><b>Поделится ссылкой</b></div>
		</div>
	</div>
</body>
</html>
