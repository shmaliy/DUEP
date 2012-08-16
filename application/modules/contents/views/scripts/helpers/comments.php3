              <div class="comments">
              <h3><?php echo Zend_Registry::get('trasvistit')->_("COMMENT");?> <span>(3)</span></h3>
              <ul>
              
               <?php foreach ($this->comment as $item):?>
                  <li class="comments_top">
                      <span class="comments_photo"><img alt="" src="/theme/img/front/commentators_photos/1.jpg" /></span>
                      <p>
                          <span class="name"><?php echo $item->users_id; ?><span class="data"><?php echo $item->created; ?></span></span>
                          <span><?php echo $item->text; ?></span>
                      </p>
                  </li>
                   <?php endforeach;?>
                  
              </ul>
          		</div>
          		          <h4><?php echo Zend_Registry::get('trasvistit')->_("Y_COMMENT");?></h4>
          <form class="comments">
              <textarea name="" cols="" rows=""></textarea>
              <input type="submit" value="<?php echo Zend_Registry::get('trasvistit')->_("SEND");?>">
          </form>