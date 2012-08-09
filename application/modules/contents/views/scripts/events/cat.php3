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
            <a href=""><span><?php echo Zend_Registry::get('trasvistit')->_("ANNOUNCEMENTS");?></span></a>
          </li>
          <li>
            <a class="active" href=""><span><?php echo Zend_Registry::get('trasvistit')->_("LAST_EVENTS");?></span></a>
          </li>
        </ul>
          <hr />
      </div>
      <div class="adt">
        <ul class="adt_list">
        <?php foreach ($this->events as $item): if($item):?>
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
            <a href="<?php echo $this->simpleUrl('view', 'events', 'contents', array('alias'=>$item->alias), 'contents/events/view'); ?>"><?php echo $item->title;?></a>
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
       <div class="side_true">
        <h2><?php echo Zend_Registry::get('trasvistit')->_("ACTUAL");?></h2>
        <ul>
         <?php foreach ($this->actual as $item):?>
            <li>
                <?php if ($item->media_id == ''): ?>
	            <img width = 40 height = 40 alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
	            <?php foreach ($this->imgs as $img): if($item->media_id == $img->id):?>
            <img width = 40 height = 40 alt="" src="/uploads/<?php echo $img->id.'.'.$img->type; ?>" />
               <?php endif; endforeach; endif; ?>
               <span class = "actual">
                <p><?php echo $item->date_created;?></p>
                <?php foreach ($this->group as $itemg):
                if ($itemg->id == $item->contents_groups_id):?>
                <a class="name_news" href="<?php echo $this->simpleUrl('view', $itemg->alias, 'contents', array('alias'=>$item->alias), 'contents/'.$itemg->alias.'/view' ); ?>"><?php echo $item->title; ?></a><br/>
                <?php endif; endforeach;?>
                <a href="">Лента</a>&rarr;<a href="">Категория</a>
                </span>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
  </div>

  <!-- #sideLeft -->

</section>
<!-- #middle-->
