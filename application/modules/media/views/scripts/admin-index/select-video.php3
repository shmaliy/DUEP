<!--<?php echo __FILE__; ?>-->
<?php //echo $this->action('upload-image-widget', 'admin-index', 'media'); ?>
<?
	echo new Media_Form_MediaCreate(array(
		'uploadUrl' => $this->simpleUrl('upload', $this->c, $this->m, array(
			'backto' => $this->a, 
			'method' => 'update', 
			'container' => '.ui-dialog-content-wrapper',
	    	'selector-mode'    => $this->selectorMode,
	    	'select-multiple'  => $this->selectMultiple,
		))
	));
?>
<?php
$adminTableNavOptions = array(
	'page'       => $this->page,
	'rows'       => $this->rows,
	'total'      => $this->total,
	'action'     => $this->a,
	'controller' => $this->c,
	'module'     => $this->m,
	'backAction' => $this->a,	
	'updateContainer' => $this->update_container,
	'params'     => array(
    	'selector-mode'   => $this->selectorMode,
    	'select-multiple' => $this->selectMultiple,
    	'field'           => $this->field
	)
);

?>
<?php
if ($this->selectMultiple) {
	$this->filter->addElement('button', 'select_items', array(
		'ignore'  => true,
		'label'   => '',
		'value'   => 'Выбрать',
		'onClick' => "selectVideoMany();"
	));
}
?>
<?php var_export($this->selectMultiple); ?>
<?php echo $this->partial('admin-table-filter.php3', 'default', array('filter' => $this->filter)); ?>
<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
<?php if (count($this->rowset) > 0): ?>
	<div class="selectImage_images_contanier">
	<?php foreach ($this->rowset as $row): ?>
		<div class="selectFile_images_contanier_element">
			<?php if (!$this->selectMultiple): ?>
			<a media-type="<?php echo $row->getType();?>" media-id="<?php echo $row->getId(); ?>" onclick="$.fn.cmsManager('selectVideoSingle', $(this), '<?php echo $this->field; ?>', $(this).parents('.ui-dialog-content-wrapper'));">
				<?php echo $row->getName(); ?>
			</a>
			<?php else: ?>
			<input media-type="<?php echo $row->getType();?>" media-id="<?php echo $row->getId(); ?>" class="selected_items" type="checkbox" />
			<?php echo $row->getName(); ?>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
	<div class="clr"></div>
	</div>
<?php else : ?>

<?php endif; ?>
<?php echo $this->partial('admin-table-nav.php3', 'default', $adminTableNavOptions); ?>
<script>
function selectVideoMany()
{
	//alert($('.selectImage_images_contanier .selected_items:checked').length);
	var items = $('.selectImage_images_contanier .selected_items:checked');
	
	$.fn.cmsManager('selectVideoMany', items, '<?php echo $this->field; ?>', $('.selectImage_images_contanier').parents('.ui-dialog-content-wrapper'));
}
</script>