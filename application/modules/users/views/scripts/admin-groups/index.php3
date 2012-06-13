<!--<?php echo __FILE__; ?>-->
<ul class="generic-menu">
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
<div class="clr"></div>
<table id="rowset"></table>
<div id="rowsetNav"></div>
<?php
	echo $this->jqGrid("#rowset", array(
		'url' => $this->url(array(), 'default'),
		'datatype' => 'json',
		'forceFit' => true,
		'ignoreCase' => true,
		'autowidth' => true,
		'mtype' => 'POST',
		'height' => 'auto',
		'pager' => '#rowsetNav',
		'viewrecords' => false,
		'jsonReader' => array(
			'root' => "rowset",
			'page' => "page",
			'total' => "total",
			'repeatitems' => false,
			'id' => '0'
		),
		'colNames' => array('ID', 'Title.', 'Alias', 'description', 'ordering', 'publiashed', 'admin_comment', 'user_group_id', 'system'),
		'colModel' => array(
			array('name' => 'id', 'index' => 'id', 'width' => 15),
			array('name' => 'ordering', 'index' => 'ordering', 'width' => 15),
			array('name' => 'title', 'index' => 'title', 'width' => 100),
			array('name' => 'published', 'index' => 'published', 'width' => 10),
			array('name' => 'alias', 'index' => 'alias', 'width' => 50),
			array('name' => 'description', 'index' => 'description', 'width' => 50),
			array('name' => 'admin_comment', 'index' => 'admin_comment', 'width' => 50),
			array('name' => 'user_group_id', 'index' => 'user_group_id', 'width' => 50),
			array('name' => 'system', 'index' => 'system', 'width' => 50),
		)
	));
?>
