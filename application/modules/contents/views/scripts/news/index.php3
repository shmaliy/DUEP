<div class="middle">

  <div class="container">
      <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">События</a>
      </div>
    <div class="content">
      <div>
        <h1 class="developments"><?php echo Zend_Registry::get('trasvistit')->_("NEWS");?></h1>
      </div>
      <div class="adt">
        <ul class="adt_list">
          <?php foreach ($this->news as $item): if($item):?>
          <li class="adt_date">
            <span class="adt_image">
                <?php if ($item->media_id == ''): ?>
	            <img alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
	            <?php foreach ($this->imgs as $img): if($item->media_id == $img->id):?>
            <img width = 106 height = 106 alt="" src="<?php echo $this->Path(); ?><?php echo $img->id.'.'.$img->type; ?>" />
               <?php endif; endforeach; endif; ?>
             </span>
              <?php foreach ($this->cats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
              <a href="<?php echo $this->simpleUrl('view', 'news', 'contents', array('alias'=>$item->alias, 'cat'=>$itemc->alias), 'contents/news/view' ); ?>"><?php echo $item->title; ?></a>
              <?php endif; endforeach;?>
              <p><?php echo $item->date_created;?>,
              <a class="comments" href="">15 <?php echo Zend_Registry::get('trasvistit')->_("COMMENTS");?></a></p>
                              <?php foreach ($this->acats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
                <a class="category_news" href=""><?php echo $itemc->title; ?></a>
                <?php endif; endforeach;?>
              
              <p class="adt_description"><?php echo $item->tizer; ?></p>
          </li>
            <?php endif; endforeach;?>
            <?php
            	echo $this->partial('pagination.php3', 'default', array(
            		'rows'    => $this->newsRows,
            		'total'   => $this->newsCount,
            		'current' => $this->newsPage,
            		'link'    => $this->simpleUrl('index', 'news', 'contents', array(), 'contents/news/index')
				));
			?>
        </ul>
      </div>
        <div class="sideRight">
            <div class="calendar"></div>
            <div class="rss_card">
                <strong>Будьте в курсе</strong>
                <p>Подпишитесь на обновления сайта - и вы всегда будете в курсе событий!</p>
                <a class="rss_orang" href="">RSS-лента</a><br />
                <a href="">Электронная рассылка</a>
            </div>
        </div>
    </div>
    <!-- #content-->

  </div>
  <!-- #container-->

  <div class="sideLeft">
    <ul class="menu_sideLeft">
        <li><a href="">10 причин, чтобы выбрать ДУЭП Именно наш университет</a></li>
        <li><a href="">История</a></li>
        <li><a href="">Структура университета</a></li>
        <li><a href="">Нобелевское движение</a></li>
        <li><a href="">Аспирантура и докторантура</a></li>
        <li><div class="note">
        <a href=""><?php echo Zend_Registry::get('trasvistit')->_("NEWS");?></a>
        </div>
            <ul class="submenu">
                <li><a href="">Студенту</a></li>
                <li><a href="">Абитуриенту</a></li>
            </ul>
        </li>
        <li><a href="">Научные школы Университета</a></li>
        <li><a href="">Итоги научно-исследовательской деятельности 2010-2011 у.г.</a></li>
        <li><a href="">Болонский процесс</a></li>
    </ul>
       <?php echo $this->Actual(); ?>
  </div>

  <!-- #sideLeft -->
          
</div>
<!-- #middle-->
