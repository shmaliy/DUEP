<?php 
	$params = (array) $this->params;
	
	if (empty($this->params['update_m'])) {
		$params['update_m'] = $this->module;
	}
	
	if (empty($this->params['update_c'])) {
		$params['update_c'] = $this->controller;
	}
	
	if (empty($this->params['update_a'])) {
		$params['update_a'] = $this->action;
	}

?>


<div class="admin-table-navigation">
	<?php if ($this->total > $this->rows && $this->rows > 0): ?>
	<div class="admin-table-navigation-pages">
		<?php
			
			if ($this->page <= 1) {
				?><a class="larr current"><span>&larr;</span></a><?php
			} else {
				$params[Sunny_Controller_Action::SESSION_PAGE] = $this->page - 1;
				$url =  $this->simpleUrl('set-page', $this->controller, $this->module, $params);
				?><a href="<?php echo $url; ?>" class="larr via_ajax"><span>&larr;</span></a><?php
			}
			
			for ($i = 1; $i <= ceil($this->total / $this->rows); $i++) {
				$params[Sunny_Controller_Action::SESSION_PAGE] = $i; 
				$url =  $this->simpleUrl('set-page', $this->controller, $this->module, $params);
				if ($this->page == $i) {
					?><a class="current"><?php echo $i; ?></a><?php
				} else {
					?><a href="<?php echo $url; ?>" class="via_ajax"><?php echo $i; ?></a><?php
				}
			}
			
			if ($this->page >= ceil($this->total / $this->rows)) {
				?><a class="rarr current"><span>&rarr;</span></a><?php
			} else {
				$params[Sunny_Controller_Action::SESSION_PAGE] = $this->page + 1;
				$url =  $this->simpleUrl('set-page', $this->controller, $this->module, $params);
				?><a href="<?php echo $url;	?>" class="larr"><span>&rarr;</span></a><?php
			}
		?>
	</div>
	<?php endif; ?>
	<div class="admin-table-navigation-rows">
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
					?><a class="via_ajax" href="<?php
						$params[Sunny_Controller_Action::SESSION_ROWS] = $r;
						echo $this->simpleUrl('set-limit', $this->controller, $this->module, $params);
					?>"><?php echo $title; ?></a><?php
				}
			}
		?>
	</div>
	<div class="clr"></div>
</div>
