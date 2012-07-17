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

<?php if (count($this->rowset) > 0): ?>
	<?php foreach ($this->rowset as $row): ?>
		<?php echo $row->getServerPath(); ?>/<?php echo $row->getName(); ?>
	<?php endforeach; ?>
<?php else : ?>

<?php endif; ?>

