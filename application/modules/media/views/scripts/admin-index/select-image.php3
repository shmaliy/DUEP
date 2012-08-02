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
	'backAction' => $this->a,	
	'updateContainer' => $this->update_container
);

?>
<?php echo $this->partial('admin-table-filter.php3', 'default', array('filter' => $this->filter)); ?>
<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
<?php if (count($this->rowset) > 0): ?>
	<div class="selectImage_images_contanier">
	<?php foreach ($this->rowset as $row): ?>
		<div class="selectImage_images_contanier_element">
			<a media-type="<?php echo $row->getType();?>" media-id="<?php echo $row->getId(); ?>" onclick="$.fn.cmsManager('mainImageFormSelector', $(this), 'media_id', $(this).parents('.ui-dialog-content-wrapper'));">
				<img src="/uploads/<?php echo $row->getId(); ?>.<?php echo $row->getType(); ?>" width="130" height="130">
			</a>
		</div>
	<?php endforeach; ?>
	<div class="clr"></div>
	</div>
<?php else : ?>

<?php endif; ?>
<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
