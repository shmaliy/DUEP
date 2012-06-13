<!--<?php echo __FILE__; ?>-->
<ul>
	<li><a href="<?php
		echo $this->url(array('controller' => 'admin-index'), 'default');
	?>">Пользователи</a></li>
	<li><a href="<?php
		echo $this->url(array('controller' => 'admin-groups'), 'default');
	?>">Группы</a></li>
	<li><a href="<?php
		echo $this->url(array('controller' => 'admin-permissions'), 'default');
	?>">Права</a></li>
</ul>

<table id="rowset"></table>
<div id="rowsetNav"></div>
<?php
	echo $this->jqGrid("#rowset", array(
		'url' => $this->url(array(), 'default'),
		'datatype' => 'json',
		'forceFit' => true,
		'ignoreCase' => true,
		'autowidth' => true,
		'height' => 'auto',
		'pager' => '#rowsetNav',
		'colModel' => array(
			array('name' => 'ID', 'index' => 'id', 'width' => 10),
			array('name' => '', 'index' => 'ordering', 'width' => 10),
			array('name' => 'E-mail', 'index' => 'email', 'width' => 100),
			array('name' => 'Вкл', 'index' => 'published', 'width' => 10),
			array('name' => 'Дата регистрации', 'index' => 'date_created', 'width' => 50),
		)
	));
?>
