<div class="middle">

  <div class="container">
      <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">События</a>
      </div>
    <div class="content">
      <div>
        <h1 class="developments">Новости</h1>
      </div>
      <div class="adt">
        <ul class="adt_list">
          <?php foreach ($this->news as $item):?>
          <li class="adt_date">
            <span class="adt_image">
	            <?php if ($item->img == ''): ?>
	            <img alt="" src="/theme/img/front/noimage.png" />
	            <?php else: ?>
               <img alt="" src="/theme/img/front/developments/<?php echo $item->img; ?>" />
               <?php endif;?>
             </span>
              <a href="<?php echo $this->simpleUrl('view', 'news', 'contents', array('alias'=>$item->alias), 'contents/news/view' ); ?>"><?php echo $item->title; ?></a>
              <p><?php echo $item->date_created;?>,
              <a class="comments" href="">15 комментариев</a></p>
                              <?php foreach ($this->acats as $itemc):
                if ($itemc->id == $item->contents_categories_id):?>
                <a class="category_news" href=""><?php echo $itemc->title; ?></a>
                <?php endif; endforeach;?>
              
              <p class="adt_description"><?php echo $item->tizer; ?></p>
          </li>
           <?php endforeach;?>
            <li class="paging">
                <a href="">&larr;</a>
                <a href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
                <a href="">5</a>
                <a href="">6</a>
                <a href="">7</a>
                <a href="">8</a>
                <a href="">&rarr;</a>
            </li>
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
        <a href="">Новости</a>
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
    <div class="side_true">
        <h2>Актуально</h2>
        <ul>
            <li>
                <img alt="" src="/theme/img/front/true/1.jpg" />
                <p>30 Березня 2012</p>
                <a class="name_news" href="">Название новости</a>
                <a href="">Лента</a>&rarr;<a href="">Категория</a>
            </li>
            <li>
                <img alt="" src="/theme/img/front/true/2.jpg" />
                <p>30 Березня 2012</p>
                <a class="name_news" href="">Название новости</a>
                <a href="">Лента</a>&rarr;<a href="">Категория</a>
            </li>
            <li>
                <img alt="" src="/theme/img/front/true/3.jpg" />
                <p>30 Березня 2012</p>
                <a class="name_news" href="">Название новости</a>
                <a href="">Лента</a>&rarr;<a href="">Категория</a>
            </li>
            <li>
                <img alt="" src="/theme/img/front/true/4.jpg" />
                <p>30 Березня 2012</p>
                <a class="name_news" href="">Название новости</a>
                <a href="">Лента</a>&rarr;<a href="">Категория</a>
            </li>
            <li>
                <img alt="" src="/theme/img/front/true/5.jpg" />
                <p>30 Березня 2012</p>
                <a class="name_news" href="">Название новости</a>
                <a href="">Лента</a>&rarr;<a href="">Категория</a>
            </li>
        </ul>
    </div>
  </div>

  <!-- #sideLeft -->
          
</div>
<!-- #middle-->
