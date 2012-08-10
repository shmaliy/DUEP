<div class="side_true">
        <h2><?php echo Zend_Registry::get('trasvistit')->_("ACTUAL");?></h2>
        <ul>
         <?php foreach ($this->actual as $item):?>
            <li>
                <?php if ($item->media_id == ''): ?>
	            <img width = 40 height = 40 alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
	            <?php foreach ($this->imgs as $img): if($item->media_id == $img->id):?>
            <img width = 40 height = 40 alt="" src="<?php echo $this->Path(); ?><?php echo $img->id.'.'.$img->type; ?>" />
               <?php endif; endforeach; endif; ?>
               <span class = "actual">
                <p><?php echo $item->date_created;?></p>
                <?php foreach ($this->group as $itemg):
                if ($itemg->id == $item->contents_groups_id):?>
                <?php foreach ($this->cats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
                <a class="name_news" href="<?php echo $this->simpleUrl('view', $itemg->alias, 'contents', array('alias'=>$item->alias, 'cat'=>$itemc->alias), 'contents/'.$itemg->alias.'/view' ); ?>"><?php echo $item->title; ?></a><br/>
                <?php endif; endforeach;?>
                <?php endif; endforeach;?>
                <?php foreach ($this->cats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
                <?php foreach ($this->group as $itemg):
                if ($itemg->id == $item->contents_groups_id):?>

                 <a href="<?php echo $this->simpleUrl('view', $itemg->alias, 'contents', array('cat'=>$itemc->alias), 'contents/'.$itemg->alias.'/cat' ); ?>"><?php echo $itemc->title; ?></a>
                <?php endif; endforeach;?>
                <?php endif; endforeach;?>
                &rarr;
                <?php foreach ($this->group as $itemg):
                if ($itemg->id == $item->contents_groups_id):?>
                 <a href="<?php echo $this->simpleUrl('view', $itemg->alias, 'contents', array(), 'contents/'.$itemg->alias.'/index' ); ?>"><?php echo $itemg->title; ?></a>
                <?php endif; endforeach;?>
               
                </span>
            </li>
            <?php endforeach;?>
        </ul>
    </div>