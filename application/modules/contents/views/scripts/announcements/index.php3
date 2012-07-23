<section class="middle">

  <div class="container">
        <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">События</a>
      </div>
    <div class="content">
      <div>
          <h1 class="developments">События</h1>
        <ul class="lineTabs">
          <li>
            <a class="active" href=""><span>Анонсы</span></a>
          </li>
          <li>
            <a href=""><span>Прошедшие события</span></a>
          </li>
        </ul>
          <hr />
      </div>
      <div class="adt">
        <ul class="adt_list">
        <?php foreach ($this->announcements as $item):?>
          <li class="adt_date" style = "display: none;">
             <span class="adt_image">
                <?php if ($item->img == ''): ?>
	            <img alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
               <img alt="" src="/theme/img/front/developments/<?php echo $item->img; ?>" />
               <?php endif;?>
                <?php foreach ($this->acats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
                  <a href=""><?php echo $itemc->title; ?></a>
                <?php endif; endforeach;?>
             </span>
            <p><?php echo $item->date_created;?></p>
            <a href="<?php echo $this->simpleUrl('view', 'announcements', 'contents', array('alias'=>$item->alias) ); ?>"><?php echo $item->title;?></a>
            <p class="adt_description"><?php echo $item->tizer;?></p>
          </li>
          <?php endforeach;?>
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
        <a href="">События</a>
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
        <h2>Актуально</h2>
        <ul>
         <?php foreach ($this->actual as $item):?>
            <li>
                 <?php if ($item->img == ''): ?>
	            <img height = 40 width = 40 alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
               <img height = 40 width = 40 alt="" src="/theme/img/front/developments/<?php echo $item->img; ?>" />
               <?php endif;?>
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
