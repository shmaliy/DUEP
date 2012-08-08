<!--?php echo __FILE__; ?-->
<html>
  <body>
<div class="middle">

  <div class="container">
      <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">События</a>&rarr;
          <a href="">Категория 1</a>&rarr;
          <a href="">Поздравляем победителей IV регионального Студенческого Фестиваля Рекламы!</a>&rarr;
          <a href="">Отчет</a>
      </div>
    <div class="content">
      <div>
        <h1 class="developments"><?php echo $this->announcement->title;?></h1>
          <a class="report_event_a" href=""><span><?php echo Zend_Registry::get('trasvistit')->_("V_EVENTS");?></span></a>
        <ul class="lineTabs">
          <li>
            <a class="active" href=""><span><?php echo Zend_Registry::get('trasvistit')->_("INFO");?></span></a>
          </li>
          <li>
            <a href=""><span><span class="label_camera"><span><?php echo Zend_Registry::get('trasvistit')->_("FOTO_AL");?> </span><sup>38</sup></span></span></a>
          </li>
          <li>
            <a href=""><span><span class="label_video"><span><?php echo Zend_Registry::get('trasvistit')->_("VIDEO_AL");?> </span><sup>8</sup></span></span></a>
          </li>
        </ul>
        <hr />
      </div>
      <div class="adt">
        <p class="info_text"><?php echo $this->announcement->description;?></p>
          <div class="social-services">
              <ul>
                  <li>
                      <img alt="" src="/theme/img/front/social_v.jpg" />
                  </li>
                  <li>
                      <img alt="" src="/theme/img/front/social_f.jpg" />
                  </li>
                  <li>
                      <img alt="" src="/theme/img/front/social_t.jpg" />
                  </li>
                  <li>
                      <img alt="" src="/theme/img/front/social_g.jpg" />
                  </li>
              </ul>
          </div>
          <div class="linked_materials side_true">
              <span class="menu_add_file"><?php echo Zend_Registry::get('trasvistit')->_("CONNECT_CONTENTS");?></span>
              <div class="group_materials">
                  <strong class=""><?php echo Zend_Registry::get('trasvistit')->_("NEWS");?></strong>
                  <ul class="sked">
                      <li>
                          <p>20.12.2012<span>8:18</span></p>
                          <a class="name_news" href="">Название новости</a>
                          <a href="">Лента</a>&rarr;<a href="">Категория</a>
                      </li>
                      <li>
                          <p>20.12.2012<span>8:18</span></p>
                          <a class="name_news" href="">Название новости</a>
                          <a href="">Лента</a>&rarr;<a href="">Категория</a>
                      </li>
                  </ul>
              </div>
              <div class="group_materials">
                  <strong><?php echo Zend_Registry::get('trasvistit')->_("NEWS_ANNOUNCEMENTS");?></strong>
                  <ul class="sked">
                      <li>
                          <p>20.12.2012<span>8:18</span></p>
                          <a class="name_news" href="">Название новости</a>
                          <a href="">Лента</a>&rarr;<a href="">Категория</a>
                      </li>
                      <li>
                          <p>20.12.2012<span>8:18</span></p>
                          <a class="name_news" href="">Название новости</a>
                          <a href="">Лента</a>&rarr;<a href="">Категория</a>
                      </li>
                  </ul>
              </div>
               <div class="group_materials">
                  <strong class=""><?php echo Zend_Registry::get('trasvistit')->_("OTHER");?></strong>
                  <ul class="sked">
                      <li>
                          <a class="name_news" href="">Название новости</a>
                          <a href="">Лента</a>&rarr;<a href="">Категория</a>
                      </li>
                  </ul>
              </div>
              <div style="clear:both;"></div>
          </div>
          <div class="comments">
              <h3><?php echo Zend_Registry::get('trasvistit')->_("COMMENT");?> <span>(3)</span></h3>
              <ul>
                  <li class="comments_top">
                      <span class="comments_photo"><img alt="" src="/theme/img/front/commentators_photos/1.jpg" /></span>
                      <p>
                          <span class="name">Анатолий Александрович Задоя<span class="data">1 мая 2012 14:42</span></span>
                          <span>Собрание сегодня состоится?</span>
                      </p>
                  </li>
                  <li class="comments_bottom">
                      <span class="comments_photo"><img alt="" src="/theme/img/front/commentators_photos/2.jpg" /></span>
                      <p>
                          <span class="name">Анатолий Александрович Задоя<span class="data">1 мая 2012 14:42</span></span>
                          <span>Собрание сегодня состоится?</span>
                      </p>
                  </li>
                  <li class="comments_top">
                      <span class="comments_photo"><img alt="" src="/theme/img/front/commentators_photos/1.jpg" /></span>
                      <p>
                          <span class="name">Анатолий Александрович Задоя<span class="data">1 мая 2012 14:42</span></span>
                          <span>Собрание сегодня состоится?</span>
                      </p>
                  </li>
              </ul>
          </div>
          <h4><?php echo Zend_Registry::get('trasvistit')->_("Y_COMMENT");?></h4>
          <form class="comments">
              <textarea name="" cols="" rows=""></textarea>
              <input type="submit" value="<?php echo Zend_Registry::get('trasvistit')->_("SEND");?>">
          </form>
      </div>
        <div class="sideRight">
            <div class="add_file">
                <ul>
                    <li>
                        <span class="menu_add_file"><?php echo Zend_Registry::get('trasvistit')->_("ADD_FILE");?></span>
                    </li>
                    <li>
                        <img alt="" src="/theme/img/front/add_file/doc.png" />
                        <p>
                            <a class="name_news" href="">Лицензування та акредитация</a>
                            <span>DOC (12Мб)</span>
                            <a href="">Лента</a>&rarr;<a href="">Категория</a>
                        </p>
                    </li>
                    <li>
                        <img alt="" src="/theme/img/front/add_file/pdf.png" />
                        <p>
                            <a class="name_news" href="">Ласкаво просимо</a>
                            <span>PDF (12Мб)</span>
                            <a href="">Лента</a>&rarr;<a href="">Категория</a>
                        </p>
                    </li>
                    <li>
                        <img alt="" src="/theme/img/front/add_file/xls.png" />
                        <p>
                            <a class="name_news" href="">Лицензування та акредитация</a>
                            <span>XLS (12Мб)</span>
                            <a href="">Лента</a>&rarr;<a href="">Категория</a>
                        </p>
                    </li>
                    <li>
                        <img alt="" src="/theme/img/front/add_file/xls.png" />
                        <p>
                            <a class="name_news" href="">Лицензування та акредитация</a>
                            <span>XLS (12Мб)</span>
                            <a href="">Лента</a>&rarr;<a href="">Категория</a>
                        </p>
                    </li>
                </ul>
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
        <a href=""><?php echo Zend_Registry::get('trasvistit')->_("EVENTS");?></a>
        </div>
            <ul class="submenu">
                <li><a href="">Категория1</a></li>
                <li><a href="">Категория2</a></li>
                <li><a href="">Категория3</a></li>
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
          
</div>
<!-- #middle-->
  </body>
</html>