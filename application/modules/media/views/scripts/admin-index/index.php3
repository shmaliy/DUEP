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
<?php echo $this->partial('admin-table-filter.php3', 'default', array('filter' => $this->filter)); ?>
<table class="generic-table">
	<thead>
		<tr>
			<th align="left" width="1%"><a class="icon-16 icon-16-add" href="<?php
				echo $this->simpleUrl('upload', $this->c, $this->m);
			?>"></a></th>
			<th width="1%"><input type="checkbox" class="selectAll" /></th>
			<th>Ф.И.О.</th>
			<th width="1%" nowrap="nowrap">Дата создания</th>
			<th width="1%" nowrap="nowrap">Дата изменения</th>
		</tr>
		<tr>
			<td colspan="10">				
				<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
			</td>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="10">				
				<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php if (count($this->rowset) > 0): ?>
	<?php foreach ($this->rowset as $row): ?>
		<tr>
			<td width="40" nowrap="nowrap">
				<a class="icon-16 icon-16-edit" href="<?php echo $this->simpleUrl('edit', $this->c, $this->m, array('id' => $row->getId())); ?>"></a>
				<a class="icon-16 icon-16-delete" onclick="return deleteItem('<?php echo $this->simpleUrl('delete', $this->c, $this->m); ?>', <?php echo $row->getId(); ?>);"></a>
			</td>
			<td><input type="checkbox" class="selectOne" name="multi[<?php echo $row->getId(); ?>]" /></td>
			<td><?php echo $row->getName(); ?></td>
			<td align="right"><?php echo date('m.d.Y', $row->getDateCreated()); ?></td>
			<td align="right"><?php echo date('m.d.Y', $row->getDateCreated()); ?></td>
		</tr>
	<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td align="center" colspan="5">Нет записей</td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>
