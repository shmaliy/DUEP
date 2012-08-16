              <div class="comments">
              <h3><?php echo Zend_Registry::get('trasvistit')->_("COMMENT");?> <span>(<?php echo count($this->comment);?>)</span></h3>
              <ul>
              
               <?php foreach ($this->comment as $item):?>
                  <li class="comments_top">
                      <span class="comments_photo"><img width = 64 height = 64 alt="" src="/theme/img/front/noavatar.jpg" /></span>
                      <p>
                          <span class="name"> 
                          <?php foreach ($this->users as $items):?>
                          <?php if($item->users_id == $items->users_id){ echo $items->last_name .' '. $items->first_name .' '. $items->middle_name;}; ?>
                          <?php endforeach;?>
                          <span class="data"><?php echo $item->created; ?></span></span>
                          <span><?php echo $item->text; ?></span>
                      </p>
                  </li>
                   <?php endforeach;?>
                  
              </ul>
          		</div>
          		          <h4><?php echo Zend_Registry::get('trasvistit')->_("Y_COMMENT");?></h4>
          <form id="addComment" class="comments" action="#" method="post" onsubmit="return false;" >
              <textarea id="text" name="" cols="" rows=""><?php echo Zend_Registry::get('trasvistit')->_("TEXT_COMMENTS");?></textarea>
              <input id="send" type = "submit" value="<?php echo Zend_Registry::get('trasvistit')->_("SEND");?>">
          </form>
          <span class = "msg" style = "display: none;"><?php echo Zend_Registry::get('trasvistit')->_("THENKS");?></span>
          	<script type="text/javascript">
$(function() {
	$("#addComment").submit(function(){	
		var id_user = "12";
		var text = $("#text").val();
		var alias = "<?php echo $this->alias; ?>";	
		var dates  = new Date();
		
		var date = dates.getTime()/1000;

		


		if (text=='<?php echo Zend_Registry::get("trasvistit")->_("TEXT_COMMENTS");?>')
		{
		alert(' <?php echo Zend_Registry::get("trasvistit")->_("VALID_COMMENTS");?> <?php echo Zend_Registry::get("trasvistit")->_("TEXT_COMMENTS");?>');
		return false;};



		$.ajax({
			type: "POST",
			url: "<?php echo $this->simpleUrl('add-comments', 'comments', 'contents', array(), 'default'); ?>",
			data: {"id_user": id_user, "text": text, "created": date, "alias": alias},
			success: function(data){
				
				$('#comments_add').html(data.comment);
				$('.msg').fadeIn(1500).fadeOut(10000);
				
				
				},


		});
				
	});

});
jQuery(function($) {
    $('#text')
    .focus(function(){if ($(this).val() == '<?php echo Zend_Registry::get("trasvistit")->_("TEXT_COMMENTS");?>') {$(this).val('');} })
    .blur(function(){if ($(this).val() == '') {$(this).val('<?php echo Zend_Registry::get("trasvistit")->_("TEXT_COMMENTS");?>');} })

});
</script>