
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
        <h1 class="developments"><?php echo $this->album->title;?></h1>
      <div class="area">
        <p class="info_text"><?php echo $this->album->description;?></p>
          <a class="arrow_left left left" style = "cursor: pointer;"></a>
          <div class="horizontal_carousel b_carousel">
                <ul class = "foto_slide" style = "left: 0px;">
               <?php $i = 0; $kol = 0;  foreach ($this->resizer as $items): $kol = $kol + 1; if($i == 0): $i = 1;?> 
                    <li class="min_foto active"><span><?php echo $kol;?></span><a class = "open_photo" num = '<?php echo $kol;?>' idfoto = "<?php echo $items['id']; ?>"><img alt="<?php echo $items['title']; ?>" src="<?php echo $items['small']; ?>" /></a></li>
                    <?php else: ?>
                    <li class="min_foto"><span><?php echo $kol;?></span><a class = "open_photo" num = '<?php echo $kol;?>' idfoto = "<?php echo $items['id']; ?>"><img alt="<?php echo $items['title']; ?>" src="<?php echo $items['small']; ?>" /></a></li>
                    <?php endif; endforeach;?>   
                </ul>
            </div>
            <a class="arrow_right right" style = "cursor: pointer;"></a>
             <?php $i = 0; $kol = 0; foreach ($this->resizer as $items): $kol = $kol + 1; if($i == 0): $i = 1;?> 
          <span class = "big_foto" id = "<?php echo $items['id']; ?>"  number = "<?php echo $kol;?>"><a class="arrow_left pre" style = "cursor: pointer;"></a><img class="b_photo" alt="" src="<?php echo $items['big']; ?>" /><a class="arrow_right next" style = "cursor: pointer;"></a></span>
          <?php else:?>
             <span class = "big_foto" id = "<?php echo $items['id']; ?>" number = "<?php echo $kol;?>" style = "display: none;"><a class="arrow_left pre" style = "cursor: pointer;"></a><img class="b_photo" alt="" src="<?php echo $items['big']; ?>" /><a class="arrow_right next" style = "cursor: pointer;"></a></span>
                              <?php endif; endforeach;?> 
          <h2><span class = "number">1</span>/<span class = "kol_img"><?php echo $kol;?></span></h2>
           <?php $i = 0; $kol = 0; foreach ($this->resizer as $items): $kol = $kol + 1; if($i == 0): $i = 1;?> 
        <p class="info_text" num = '<?php echo $kol;?>'><?php echo $items['description']; ?></p>
          <?php else:?>
          <p class="info_text" num = '<?php echo $kol;?>' style = "display: none;"><?php echo $items['description']; ?></p>
            <?php endif; endforeach;?> 
          <div class="adt">
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
          <div class="comments">
              <h3>Комментарии <span>(3)</span></h3>
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
          <h4>Ваш комментарий</h4>
          <form class="comments">
              <textarea name="" cols="" rows=""></textarea>
              <input type="submit" value="Отправить">
          </form>
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
        <li><a href="">Контактные данные</a></li>
    </ul>
    <?php echo $this->Actual(); ?>
  </div>

  <!-- #sideLeft -->
          
</div>
<!-- #middle-->
