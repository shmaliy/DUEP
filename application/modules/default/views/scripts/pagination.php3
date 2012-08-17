<?php if ($this->total > $this->rows): ?>
<?php
if ($this->current < 1) {
	$this->current = 1;
}
$prev = $this->current - 1;
$next = $this->current + 1;
$pages = ceil($this->total / $this->rows);
$push1 = $push2 = false;
?>
<li class="paging">
	<?php if ($this->current > 1): ?>
	<a href="<?php echo $this->link . ($prev != 1 ? '?page=' . $prev : ''); ?>">&larr;</a>
	<?php else: ?>
	<a style="color:#3a3a3a;">&larr;</a>
	<?php endif; ?>
	
	<?php for ($p = 1; $p <= $pages; $p++): ?>
	<?php if ($pages <= 11 || $pages > 11 && ($p < 4 || $p > $pages - 3 || $p > $this->current - 2 && $p < $this->current + 2)): ?>		
		<?php if ($this->current != $p): ?>
		<a href="<?php echo $this->link . ($p != 1 ? '?page=' . $p : ''); ?>"><?php echo $p; ?></a>
	    <?php else: ?>
	    <a style="color:#3a3a3a;"><?php echo $p; ?></a>
	    <?php endif; ?>
	<?php else: ?>
	    <?php if ($pages > 11 && $p < $this->current && !$push1): $push1 = true; ?>
	    <span>...</span>
	    <?php endif; ?>
		
	    <?php if ($pages > 11 && $p > $this->current && !$push2): $push2 = true; ?>
	    <span>...</span>
	    <?php endif; ?>
	<?php endif; ?>
	<?php endfor; ?>
   
    <?php if ($this->current < $pages): ?>
    <a href="<?php echo $this->link; ?>?page=<?php echo $this->current + 1; ?>">&rarr;</a>
    <?php else: ?>
    <a style="color:#3a3a3a;">&rarr;</a>
    <?php endif; ?>
</li>
<?php endif; ?>