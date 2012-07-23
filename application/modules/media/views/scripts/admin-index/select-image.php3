<!--<?php echo __FILE__; ?>-->
<?php echo $this->action('upload-image-widget', 'admin-index', 'media'); ?>
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
	<div class="selectImage_images_contanier">
	<?php foreach ($this->rowset as $row): ?>
		<div class="selectImage_images_contanier_element">
			<img src="/uploads/<?php echo $row->getId(); ?>.<?php echo $row->getType(); ?>" width="130" height="130">
			<input name="thumbnail" type="radio" value = "<?php echo $row->getId(); ?>" />
		</div>
	<?php endforeach; ?>
	<div class="clr"></div>
	</div>
<?php else : ?>

<?php endif; ?>

