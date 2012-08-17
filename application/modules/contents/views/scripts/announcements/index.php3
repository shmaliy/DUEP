<section class="middle">

  <div class="container">
        <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">События</a>
      </div>
    <div class="content">
      <div>
          <h1 class="developments"><?php echo Zend_Registry::get('trasvistit')->_("EVENTS");?></h1>
        <ul class="lineTabs">
          <li>
            <a class="active" href=""><span><?php echo Zend_Registry::get('trasvistit')->_("ANNOUNCEMENTS");?></span></a>
          </li>
          <li>
            <a href=""><span><?php echo Zend_Registry::get('trasvistit')->_("LAST_EVENTS");?></span></a>
          </li>
        </ul>
          <hr />
      </div>
      <div class="adt">
        <ul class="adt_list">
        <?php foreach ($this->announcements as $item): if($item):?>
          <li class="adt_date" style = "display: none;">
            <span class="adt_image">
                <?php if ($item->media_id == ''): ?>
	            <img alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
	            <?php foreach ($this->imgs as $img): if($item->media_id == $img->id):?>
            <img width = 106 height = 106 alt="" src="/uploads/<?php echo $img->id.'.'.$img->type; ?>" />
               <?php endif; endforeach; endif; ?>
             </span>
            <p><?php echo $item->date_created;?></p>
            <?php foreach ($this->cats as $itemc):
            if ($itemc->id == $item->contents_categories_id):?>
            <a href="<?php echo $this->simpleUrl('view', 'announcements', 'contents', array('alias'=>$item->alias, 'cat'=>$itemc->alias), 'contents/announcements/view' ); ?>"><?php echo $item->title;?></a>
             <?php endif; endforeach;?>
            <p class="adt_description"><?php echo $item->tizer;?></p>
          </li>
          <?php endif; endforeach;?>
        </ul>
      </div>
        <div class="calendar"></div>
<div class="rss_card">
            <strong>Будьте в курсе</strong>
            <p>Подпишитесь на обновления сайта - и вы всегда будете в курсе событий!</p>
            <a class="rss_orang" href="">RSS-лента</a><br />
            <a href="">Электронная рассылка</a>
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
        <a href=""><?php echo Zend_Registry::get('trasvistit')->_("EVENTS");?></a>
        </div>
            <ul class="submenu">
                <li><a href="">Категория1</a></li>
                <li><a href="">Категория2</a></li>
            </ul>
        </li>
        <li><a href="">Научные школы Университета</a></li>
        <li><a href="">Итоги научно-исследовательской деятельности 2010-2011 у.г.</a></li>
        <li><a href="">Болонский процесс</a></li>
    </ul>
<?php echo $this->Actual(); ?>
  </div>

  <!-- #sideLeft -->

</section>
<!-- #middle-->
