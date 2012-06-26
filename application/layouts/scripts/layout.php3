<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<head>
		<?php // установка ссылок в скрипте вида:
$this->headLink()->appendStylesheet('/theme/css/main.css')
                 ->headLink(array('rel' => 'favicon',
                                  'href' => '/img/favicon.ico'),
                                  'PREPEND')
?>
<?php // вывод ссылок: ?>
<?php echo $this->headLink() ?>
		<meta charset="utf-8">
		<title>DUEP</title>
	</head>
	<body>
		<div id="header">
			<div class="fixed relative">
				<a href="" class="logo">
					<img src="/theme/img/front/logo.png"/>
				</a>
				<div class="user_block">
					<div><a href="">Вход</a> / <a href="">Регистрация</a></div>
					<div><a href="">Забыли пароль?</a></div>
				</div>
				<div class="language">
					<div class="language_active relative">
						<div class="language_active_left"></div>
						<img src="/theme/img/front/ru.jpg" class="lan"/><a href="" class="dashed">Русский</a> &#8595;
						<div class="language_active_right"></div>
					</div>
					<div class="pop_up">
						<div class="pop_up_left_top"></div>
						<div class="pop_up_right_top"></div>
						<div class="pop_up_top_l"></div>
						<div class="pop_up_top_r"></div>
						<div class="pop_up_left"></div>
						<div class="pop_corner"></div>
						<ul>
							<li><img src="/theme/img/front/ua.jpg" class="lan"/><a href="">Українська</a></li>
							<li><img src="/theme/img/front/en.jpg" class="lan"/><a href="">English</a></li>
							<li><img src="/theme/img/front/us.jpg" class="lan"/><a href="">US English</a></li>
							<li><img src="/theme/img/front/ua.jpg" class="lan"/><a href="">Українська</a></li>
							<li><img src="/theme/img/front/ua.jpg" class="lan"/><a href="">Українська</a></li>
							<li><img src="/theme/img/front/ua.jpg" class="lan"/><a href="">Українська</a></li>
						</ul>
						<div class="pop_up_left_bottom"></div>
						<div class="pop_up_right_bottom"></div>
						<div class="pop_up_right"></div>
						<div class="pop_up_bottom"></div>
					</div>
				</div>
				<div class="menu">
					<div class="menu_left"></div>
					<table border="0" cellpadding="0" cellspacing="0" width="100%" height="">
						<tr class="first">
							<!--td class="active"><div class="menu_item"><a href="">Университет</a></div></td-->
							<td><div class="menu_item"><a href="">Университет</a></div></td>
							<td><div class="menu_item"><a href="">Образование<br> для жизни!</a></div></td>
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
					<div class="droupdaun">
						<div class="droupdaun_top"></div>
						<ul>
							<li><a href="">Унивирситет</a></li>
							<li><a href="">Руководство</a></li>
							<li><a href="">Награды</a></li>
							<li><a href="">Про нас пишут</a></li>
							<li><a href="">Структура Университета</a></li>
						</ul>
						<div class="droupdaun_bottom"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="fixed">
		<?php echo $this->layout()->content; ?>
			</div>
		</div>
		<div id="footer">
			<div id="footerResize">
			<div class="fixed">
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
				   <a href=""><img src="/theme/img/front/sunny_logo.png" class="sunny_logo"/></a>
				</div>						
				<div class="right footer_item">
				   <form action="" method="">
						<div class="search">
							<div class="search_left"></div>
							<input type="text" class="input" value="Поиск по сайту"/> 
							<input type="submit" class="submit" value=""/> 
						</div>
				   </form>
				   <div class="social_networks"><b>Поделится ссылкой</b></div>
				   
				</div>
			</div>
			</div>
		</div>
	</body>
</html>