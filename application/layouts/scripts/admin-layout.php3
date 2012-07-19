<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->headMeta(); ?>
	<?php
		$this->headLink()->appendStylesheet('/theme/css/style.css');
		$this->headLink()->appendStylesheet('/theme/css/admin.css');
		$this->headLink()->appendStylesheet('/js/jquery/jquery-ui-1.8.20.custom/css/smoothness/jquery-ui-1.8.20.custom.css');
		$this->headLink()->appendStylesheet('/js/jquery/jquery.jqGrid-4.3.3/css/ui.jqgrid.css');
		$this->headLink()->headLink(array('rel' => 'SHORTCUT ICON', 'href' => '/favicon.png'), 'PREPEND');
		
		echo $this->headLink();
	?>
	<?php
		$this->headScript()->appendFile('/js/jquery/jquery-1.7.2.min.js');
		$this->headScript()->appendFile('/js/jquery/jquery-ui-1.8.20.custom/jquery-ui-1.8.20.custom.min.js');
		$this->headScript()->appendFile('/js/jquery/jquery.jqGrid-4.3.3/i18n/grid.locale-ru.js');
		$this->headScript()->appendFile('/js/jquery/jquery.swfupload/swfupload.js');
		$this->headScript()->appendFile('/js/jquery/jquery.swfupload.js');
		$this->headScript()->appendFile('/js/script.js');
		echo $this->headScript();
    ?>
</head>
<body>
	<div class="header">
		<div class="header-resize">
			<ul class="generic-menu">
				<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'default'); ?>">Центр</a></li>				
				<li><a href="<?php echo $this->simpleUrl('config', 'admin-index', 'default'); ?>">Настройки</a></li>				
				<li><a>Структура</a></li>				
				<li><span>Модули</span>
					<ul>
						<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'media'); ?>" class="group">Файловый архив</a>
							<ul>
								<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'media'); ?>">Файлы</a></li>				
							</ul>
						</li>
						<li><span class="group">Контент</span>
							<ul>
								<li><span class="group">Анонсы</span>
									<ul>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'contents', array('group' => 'announcements')); ?>">Категории</a></li>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'contents', array('group' => 'announcements')); ?>">Контент</a></li>
									</ul>
								</li>
								<li><span class="group">Новости</span>
									<ul>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'contents', array('group' => 'news')); ?>">Категории</a></li>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'contents', array('group' => 'news')); ?>">Контент</a></li>
									</ul>
								</li>
								<li><span class="group">События</span>
									<ul>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'contents', array('group' => 'events')); ?>">Категории</a></li>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'contents', array('group' => 'events')); ?>">Контент</a></li>
									</ul>
								</li>
								<li><span class="group">Архив публикаций</span>
									<ul>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'contents', array('group' => 'publications_archive')); ?>">Категории</a></li>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'contents', array('group' => 'publications_archive')); ?>">Контент</a></li>
									</ul>
								</li>
								<li><span class="group">Галереи изображений</span>
									<ul>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'contents', array('group' => 'gallery_of_images')); ?>">Категории</a></li>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'contents', array('group' => 'gallery_of_images')); ?>">Альбомы</a></li>
									</ul>
								</li>
								<li><span class="group">Галереи видео</span>
									<ul>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-categories', 'contents', array('group' => 'gallery_of_videos')); ?>">Категории</a></li>
										<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'contents', array('group' => 'gallery_of_videos')); ?>">Галереи</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'staff'); ?>" class="group">Структура университета</a>
							<ul>
								<li><a href="<?php //echo $this->simpleUrl('index', 'admin-groups', 'contents'); ?>">Направления</a></li>
								<li><a href="<?php //echo $this->simpleUrl('index', 'admin-groups', 'contents'); ?>">Кафедры</a></li>
								<li><a href="<?php //echo $this->simpleUrl('index', 'admin-groups', 'contents'); ?>">Дисциплины</a></li>
								<li><a href="<?php //echo $this->simpleUrl('index', 'admin-groups', 'contents'); ?>">Подразделения</a></li>
								<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'staff'); ?>">Карточки сотрудников</a></li>
								<li><a href="<?php echo $this->simpleUrl('index', 'admin-students', 'staff'); ?>">Карточки студентов</a></li>	
								<li><a href="<?php //echo $this->simpleUrl('index', 'admin-groups', 'contents'); ?>">Аудитории</a></li>
								<li><a href="<?php //echo $this->simpleUrl('index', 'admin-groups', 'contents'); ?>">Группы</a></li>
							</ul>	
						</li>					
					</ul>
				</li>				
				<li><a href="<?php echo $this->simpleUrl('index', 'admin-index', 'users'); ?>" class="group">Пользователи</a>
					<ul>
						<li><a href="<?php echo $this->simpleUrl('index', 'admin-groups', 'users'); ?>">Группы пользователей</a></li>				
						<li><a href="<?php echo $this->simpleUrl('index', 'admin-permissions', 'users'); ?>">Права пользователей</a></li>				
					</ul>
				</li>				
			</ul>
			<div class="flash-messenger-container">
				<div class="flash-messenger-messages">
				<?php if ($this->flashMessenger()->hasMessages()): ?>
				<?php foreach ($this->flashMessenger()->getMessages() as $message) : ?>
					<div class="flash-messenger-message ui-corner-all" style="display: none;"><?php echo $message; ?></div>
				<?php endforeach; ?>
				<?php $this->flashMessenger()->clearMessages(); ?>
				<?php endif; ?>
				<?php if ($this->flashMessenger()->hasCurrentMessages()): ?>
				<?php foreach ($this->flashMessenger()->getCurrentMessages() as $message) : ?>
					<div class="flash-messenger-message ui-corner-all" style="display: none;"><?php echo $message; ?></div>
				<?php endforeach; ?>
				<?php $this->flashMessenger()->clearCurrentMessages(); ?>
				<?php endif; ?>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
	<div class="body">
		<div class="body-push1"></div>
		<div class="body-container">
			<?php echo $this->layout()->content; ?>
			<small>
			<?php
				$db = Zend_Db_Table::getDefaultAdapter();
				$profiler = $db->getProfiler();
				$queries = $profiler->getQueryProfiles(null, true);
				if (is_array($queries)) {
					foreach ($queries as $query) {
						echo $query->getQuery() . '<br />';
					}
				}
			?>
			</small>
		</div>
		<div class="body-push2"></div>
	</div>
	<div class="footer">
		<div class="footer-resize">
			<a class="footer-developer-logo" href="http://sunny.net.ua/" target="_blank"></a>
			<div style="color: #900; font-size: 24px;">BACKEND</div>
		</div>
	</div>	
</body>
</html>
