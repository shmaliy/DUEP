 <body>
<div class="middle">

  <div class="container">
      <div class="tape_path">
          <a class="emblem_way" href=""></a>&rarr;
          <a href="">Университет</a>&rarr;
          <a href="">Контактные данные</a>
      </div>
    <div class="content">
        <h1 class="developments"><?php echo Zend_Registry::get('trasvistit')->_("CONTACTS_DATE");?></h1>
      <div class="area">
          <div class="contacts">
              <h3>Номера телефонов</h3>
              <h4>Приемная комиссия:</h4>
              <span>+38(056)370-36-21</span>
              <span>+38(0562)31-24-40</span>
              <h4>Приемная ректора:</h4>
              <span>+38(056)370-36-26</span>
              <ul>
                  <li class="callback_field">
                      <a class="report_event button_callback" href=""><span><?php echo Zend_Registry::get('trasvistit')->_("CALL");?> &darr;</span></a>
                        <ul class="pop_up file_types inset callback">
                            <li class="field_text"><p><strong>Укажите свой номер телефона, интересующую тему, и соответствующий специалист перезвонит вам в течение получаса</strong> (если сейчас не три часа ночи – мы не роботы, что, кстати, является нашим конкурентным преимуществом).</p>
                                <form action="">
                                    <input class="button_name" type="text" value="<?php echo Zend_Registry::get('trasvistit')->_("Y_NAME");?>" />
                                    <input type="text" value="<?php echo Zend_Registry::get('trasvistit')->_("TEMS_QUESTIONS");?>" />
                                    <input type="text" value="<?php echo Zend_Registry::get('trasvistit')->_("NUMBER");?>" />
                                    <input class="comments" type="submit" value="<?php echo Zend_Registry::get('trasvistit')->_("SEND");?>" />
                                    <span><?php echo Zend_Registry::get('trasvistit')->_("RULLS");?></span>
                                </form>
                            </li>
                            <li class="pop_up_left_top"></li>
                            <li class="pop_up_right_top"></li>
                            <li class="pop_corner"></li>
                            <li class="pop_up_left"></li>
                            <li class="pop_up_right"></li>
                            <li class="pop_up_left_bottom"></li>
                            <li class="pop_up_right_bottom"></li>
                            <li class="pop_up_top_l"></li>
                            <li class="pop_up_top_r"></li>
                            <li class="pop_up_bottom"></li>
                        </ul>
                  </li>
              </ul>
          </div>
          <div class="contacts">
              <h3>Адреса</h3>
              <span>49000, Украина г. Днепропетровск  ул. Набережная Ленина 18</span>
              <h3>Реквизиты</h3>
              <span>Днепропетровский университет имени Альфреда Нобеля г. Днепропетровск, ул. Набережная Ленина 18 ЄДРПОУ 33440037 р/р 26003021601191 в КМФ АКБ "Укрсоцбанк" МФО 322012 ІПН 334400326584 № cвід.пл.ПДВ 36103208</span>
          </div>
          <div class="contacts contacts_mail">
              <h3>Электронная почта</h3>
              <span><a href="mailto:abit@duep.edu ">abit@duep.edu</a></span>
              <h3>Skype</h3>
              <span><a href="">Приемная</a><i>(в сети)</i></span>
              <h3>QR-код</h3>
              <img alt="" src="../theme/img/front/qr_kod.png" />
          </div>
          <div class="map">
              <img alt="" src="../theme/img/front/map.jpg" />
          </div>
          <div class="adt">
              <form class="feedback" action="">
                  <h1 class="developments"><?php echo Zend_Registry::get('trasvistit')->_("CALL_BEACK");?></h1>
                  <input class="button_name" type="text" value="<?php echo Zend_Registry::get('trasvistit')->_("Y_NAME");?>" />
                  <input type="text" value="<?php echo Zend_Registry::get('trasvistit')->_("Y_EMAIL");?>" />
                  <input class="button_issue" type="text" value="<?php echo Zend_Registry::get('trasvistit')->_("TEMS_MAIL");?>" />
                  <textarea rows="" cols=""><?php echo Zend_Registry::get('trasvistit')->_("TEXT_MAIL");?></textarea>
                  <input class="comments" type="submit" value="<?php echo Zend_Registry::get('trasvistit')->_("SEND");?>" />
                  <span><?php echo Zend_Registry::get('trasvistit')->_("RULLS");?></span>
              </form>
          </div>
        </div>
      </div>
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
        <li><a href="">Видеогалерея</a></li>
        <li><a href="">Веб-камеры live</a></li>
        <li><a href="">Контактные данные</a></li>
    </ul>
    <div class="side_true">
        <h2><?php echo Zend_Registry::get('trasvistit')->_("ACTUAL");?></h2>
        <ul>
            <?php foreach ($this->actual as $item): if($item):?>
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
            <?php endif; endforeach;?>
        </ul>
    </div>
  </div>

  <!-- #sideLeft -->
          
</div>
<!-- #middle-->
  </body>