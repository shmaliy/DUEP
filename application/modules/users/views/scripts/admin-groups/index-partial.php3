<ul>
<?php foreach ($this->tree as $branch) : ?>
	<li>
		<?php echo $branch->getTitle(); ?>
		<?php if ($branch->getExtendChilds()->count() > 0) : ?>
			<?php echo $this->partial('admin-groups/index-partial.php3', 'users', array('tree' => $branch->getExtendChilds())); ?>	
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>