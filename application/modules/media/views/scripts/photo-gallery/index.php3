
<div class="middle">

  <div class="container">
      <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">Фотогалерея</a>&rarr;
          <a href="">Жизнь Университета</a>&rarr;
          <a href="">Собрание активистов</a>
      </div>
    <div class="content">
      <div>
        <h1 class="developments">Фотогалерея</h1>
      </div>
      <div class="photos">
            <?php foreach ($this->gallery as $item): if($item):?> 
          <div class="photo_preview">
              <?php if ($item->media_id == ''): ?>
	            <img width = 170 height = 140 alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
	            <?php foreach ($this->imgs as $img): if($item->media_id == $img->id):?>
            <img width = 170 height = 140 alt="<?php echo $img->title; ?>" src="<?php echo $this->Path(); ?><?php echo $img->id.'.'.$img->type; ?>" />
               <?php endif; endforeach; endif; ?>
              <div class="photo_underline"><span class="number_photos"></span><span class="label_photos"></span></div>
              <p class="photo_description">
                <?php foreach ($this->cats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
                  <a class="photo_name" href="<?php echo $this->simpleUrl('view', 'photo-gallery', 'media', array('alias'=>$item->alias, 'cat'=>$itemc->alias), 'media/photo-gallery/view' ); ?>"><?php echo $item->title; ?></a><br />

                  <a class="photo_category" href="<?php echo $this->simpleUrl('view', 'photo-gallery', 'media', array('alias'=>$item->alias, 'cat'=>$itemc->alias), 'media/photo-gallery/cat' ); ?>"><?php echo $itemc->title; ?></a><br />
                  <?php endif; endforeach;?>
                  <span class="date_comments"><?php echo $item->date_created;?>,</span><span class="number_comments">3</span><span class="label_comments"></span>
              </p>
          </div>
         <?php endif; endforeach;?>
      </div>
        <p class="description_gallery">Здесь отображается описание к галерее. Традиционно выступает MARG (Management Accounting Research Group) - исследовательская группа по управленческому учету, которая включает в себя ведущих ученых и исследователей из университетов по всему миру и практиков Лондонской школе экономики и политических наук (LSE) при поддержке Института дипломированных бухгалтеров Англии и Уэльса (ICAEW) и Частного института управленческого учета (CIMA). На этих конференциях концентрируется внимание на </p>
    </div>
    <!-- #content-->

  </div>
  <!-- #container-->

  <div class="sideLeft">
    <ul class="menu_sideLeft">
        <li><a href="">Университет</a></li>
        <li><a href="">Руководство</a></li>
        <li><a href="">Награды</a></li>
        <li><a href="">Про нас пишут</a></li>
        <li><a href="">Структура Университета</a></li>
        <li><a href="">Гости Университета</a></li>
        <li><div class="note">
        <a href="">Фотогалерея</a>
        </div>
            <ul class="submenu">
                <li><a href="">Жизнь Университета</a></li>
                <li><a href="">Нобелевские премии</a></li>
                <li><a href="">Веселые конкурсы</a></li>
            </ul>
        </li>
        <li><a href="">Контактные данные</a></li>
    </ul>
    <?php echo $this->Actual(); ?>
  </div>

  <!-- #sideLeft -->
          
</div>
<!-- #middle-->
