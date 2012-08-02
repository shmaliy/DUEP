<!--<?php echo __FILE__; ?>-->
<?php
	$adminTableNavOptions = array(
		'page'       => $this->page,
		'rows'       => $this->rows,
		'total'      => $this->total,
		'action'     => $this->a,
		'controller' => $this->c,
		'module'     => $this->m,
	);
?>
<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
<?php echo $this->partial('admin-table-filter.php3', 'default', array('filter' => $this->filter)); ?>
<div class="admin-table">
	<div class="admin-actions">
		<ul>
			<li class="single"><a class="add" href="<?php
				echo $this->simpleUrl('edit', $this->c, $this->m, array('group' => $this->group->alias));
			?>"></a></li>
			<li class="multi"><a class="delete" href="#"></a></li>
			<li class="multi"><a class="move" href="#"></a></li>
			<li class="multi"><a class="copy" href="#"></a></li>
			<!--<li class="single"><a class="save" href="#"></a></li>
			<li class="single"><a class="apply" href="#"></a></li>-->
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th class="delete"></th>
				<th class="checkbox"><div><input type="checkbox" /></div></th>
				<th><div>Название</div></th>
				<th class="datetime"><div>Дата создания</div></th>
				<th class="datetime"><div>Дата изменения</div></th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($this->rowset) > 0): ?>
				<?php foreach ($this->rowset as $row): ?>
					<tr>
						<td class="delete"><div><a class="via_ajax" href="<?php echo $this->simpleUrl('delete', $this->c, $this->m, array('id' => $row->id, 'group' => $this->group->alias)); ?>"></a></div></td>
						<td class="checkbox"><div><input type="checkbox" /></div></td>
						<td><div><a href="<?php
							echo $this->simpleUrl('edit', $this->c, $this->m, array('id' => $row->getId()));
						?>"><?php echo $row->getTitle();?></a></div></td>
						<td class="datetime"><div><?php echo date('m.d.Y', $row->getDateCreated()); ?></div></td>
						<td class="datetime"><div><?php echo date('m.d.Y', $row->getDateModified()); ?></div></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td class="empty" colspan="5"><div>Нет записей</div></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>

