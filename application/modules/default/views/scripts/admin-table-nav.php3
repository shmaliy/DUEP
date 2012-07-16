<div class="generic-table-nav">
	<?php if ($this->total > $this->rows && $this->rows > 0): ?>
	<div class="generic-table-nav-pages">
		<?php
			if ($this->page <= 1) {
				?><a class="larr"><span>&larr;</span>Сюда</a><?php
			} else {
				?><a href="/page/<?php
				echo ($this->page - 1);
				?>" class="larr"><span>&larr;</span>Сюда</a><?php
			}
			
			for ($i = 1; $i <= ceil($this->total / $this->rows); $i++) {
				if ($this->page == $i) {
					?><a class="current"><?php echo $i; ?></a><?php
				} else {
					?><a href="/page/<?php echo $i; ?>"><?php echo $i; ?></a><?php
				}
			}
			
			if ($this->page >= ceil($this->total / $this->rows)) {
				?><a class="rarr">Туда<span>&rarr;</span></a><?php
			} else {
				?><a href="/page/<?php
				echo ($this->page + 1);
				?>" class="larr">Туда<span>&rarr;</span></a><?php
			}
		?>
	</div>
	<?php endif; ?>
	<div class="generic-table-nav-rows">
		<span>Показывать по:</span>
		<?php
			$rows = array(10, 20, 50, 100, 200, 500, 0);
			foreach ($rows as $r) {
				$title = $r;
				
				if ($r == 0) {
					$title = 'Все';
				}
				
				if ($r == $this->rows) {
					?><a class="current"><?php echo $title; ?></a><?php
				} else {
					?><a href="#" onclick="return setLimit('<?php
						echo $this->simpleUrl('set-limit', $this->controller, $this->module, $this->params);
					?>', <?php echo $r; ?>);"><?php echo $title; ?></a><?php
				}
			}
		?>
	</div>
</div>
