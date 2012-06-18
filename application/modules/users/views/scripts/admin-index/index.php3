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
<script type="text/javascript">
//<![CDATA[
$("#rowset").jqGrid({
	url: "<?php echo $this->url(array(), 'default'); ?>",
	datatype: "json",
	forceFit: true,
	ignoreCase: true,
	autowidth: true,
	mtype: "POST",
	height: "auto",
	pager: "#rowsetNav",
	viewrecords: false,
	hoverrows: false,
	multiboxonly: true,
	multiselect: true,
	jsonReader: {
		root: "rowset",
		page: "page",
		total: "total",
		repeatitems: false
	},
	colModel: [
		{
			name: "id",
			index:"id",
			label: 'ID',
			width: 15
		}, {
			name: "ordering",
			index:"ordering",
			label: ' ',
			width: 15
		}, {
			name: "email",
			index:"email",
			label: 'E-mail',
			width: 100
		}, {
			name: "published",
			index:"published",
			label: 'Вкл.',
			width: 10
		}, {
			name: "date_created",
			index:"date_created",
			label: 'Дата регистрации',
			width: 50
		}, {
			name: "admin_comment",
			index:"admin_comment",
			label: 'Комментарий',
			width: 50
		}, {
			name: 'actions',
			index: 'actions',
			label: 'Действия',
			width: 20
		}
	],
	loadComplete: function() {
		var ids = $("#rowset").getDataIDs(); 
        console.log(ids);
        for (var i = 0; i < ids.length; i++) { 
            var cl = ids[i]; 
            //be = '<input style="height:22px;width:60px;" type="button" value="Edit" onclick="window.location.href = \'<?php echo $this->url(array('module' => 'users', 'controller' => 'admin-index', 'action' => 'edit'), 'default'); ?>/id/' + cl + '" />'; 
            be = '<div class="ui-icon ui-button ui-icon-pencil" onclick="return edit(' + cl + ')"></div>';
            $("#rowset").jqGrid('setRowData', ids[i], {'actions': be}) ;
        }
    }, 
});

function edit(id)
{
	window.location.href = '<?php
		echo $this->url(array(
			'module' => 'users', 
			'controller' => 'admin-index', 
			'action' => 'edit'
		), 'default'); 
	?>/id/' + id;
}
//]]>
</script>
<ul class="generic-menu">
	<li><a href="<?php
		echo $this->url(array(
			'module' => 'users',
			'controller' => 'admin-index',
			'action' => 'edit',
			'id' => 'new'
		), 'default', true);
	?>">Добавить</a></li>
</ul>
<div class="clr"></div>
