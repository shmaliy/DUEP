<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->headMeta(); ?>
	<?php
		$this->headLink()->appendStylesheet('/theme/css/style.css');
		$this->headLink()->appendStylesheet('/js/jquery/jquery-ui-1.8.20.custom/css/smoothness/jquery-ui-1.8.20.custom.css');
		$this->headLink()->appendStylesheet('/js/jquery/jquery.jqGrid-4.3.3/css/ui.jqgrid.css');
		$this->headLink()->headLink(array('rel' => 'SHORTCUT ICON', 'href' => '/favicon.png'), 'PREPEND');
		
		echo $this->headLink();
	?>
	<?php
		$this->headScript()->appendFile('/js/jquery/jquery-1.7.2.min.js');
		$this->headScript()->appendFile('/js/jquery/jquery-ui-1.8.20.custom/jquery-ui-1.8.20.custom.min.js');
		$this->headScript()->appendFile('/js/jquery/jquery.jqGrid-4.3.3/i18n/grid.locale-ru.js');
		$this->headScript()->appendFile('/js/jquery/jquery.jqGrid-4.3.3/jquery.jqGrid.min.js');
		$this->headScript()->appendFile('/js/script.js');
		echo $this->headScript();
    ?>
</head>
<body>
	<div class="header">
		<div class="header-resize">
			<ul class="menu">
				<li><a href="/index/config">Настройки</a></li>
				<li><a href="<?php
					echo $this->url(array('module' => 'users'), 'default');
				?>">Пользователи</a></li>
			</ul>
		</div>
	</div>
	<div class="body">
		<div class="body-push1"></div>
		<div class="body-container">
			<?php echo $this->layout()->content; ?>
		</div>
		<div class="body-push2"></div>
	</div>
	<div class="footer">
		<div class="footer-resize">
			<a class="footer-developer-logo" href="http://sunny.net.ua/" target="_blank"></a>
			<div class="footer-developer-text">
				Данное тестовое задание выполнено для компании CPT компанией <a href="http://sunny.net.ua/" target="_blank">SunNY CT</a>.<br />
				Использованные технологии: PHP 5.3, ZendFramework 1.11.1, jQuery 1.7.2, HTML/CSS
			</div>
		</div>
	</div>	
</body>
</html>
