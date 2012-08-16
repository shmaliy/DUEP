				<div class="promo relative">
					<img src="/theme/img/front/promo.jpg"/>
					<div class="promo_text">
						<div class="MyriadProCondBold fs20 color_ffc400">СТУДЕНТЫ, НЕ СДАВШИЕ ЯЗЫКИ</div>
						<div class="MyriadProCondRegular fs38">ПОВЕШЕНЫ НА ТРЕТЬЕМ ЭТАЖЕ </div>
						<div class="MyriadProCondRegular fs28">В НАЗИДАНИЕ МЛАДШИМ КУРСАМ</div>
					</div>
					<div class="promo_img">
						<a href=""><img src="/theme/img/front/promo_small.jpg"/></a>
						<a href=""><img src="/theme/img/front/promo_small1.jpg"/></a>
						<a href="" class="active"><img src="/theme/img/front/promo_small.jpg"/></a>
						<a href=""><img src="/theme/img/front/promo_small1.jpg"/></a>
						<a href=""><img src="/theme/img/front/promo_small.jpg"/></a>
					</div>
					<div class="promo_left_bottom"></div>
					<div class="promo_right_bottom"></div>
				</div>
				<div class="box">
					<div class="box_left_top"></div>
					<div class="box_left_bottom"></div>
					<span class="left MyriadProCondRegular"><?php echo Zend_Registry::get('trasvistit')->_("STANDART");?> <br> <?php echo Zend_Registry::get('trasvistit')->_("QUALITY");?>:</span>
					<a href=""><img src="/theme/img/front/standart1.jpg" class="standart_img"/></a>
					<a href=""><img src="/theme/img/front/standart2.jpg" class="standart_img"/></a>
					<a href=""><img src="/theme/img/front/standart3.jpg" class="standart_img"/></a>
					<a href=""><img src="/theme/img/front/standart1.jpg" class="standart_img"/></a>
					<a href=""><img src="/theme/img/front/standart2.jpg" class="standart_img"/></a>
					<div class="box_right_top"></div>
					<div class="box_right_bottom"></div>
					<div class="clearer"></div>
				</div>
				<div class="left content_left bg_ed1c24">
					<div class="pl_bg_box">
						<div class="pl_title_box"><a style ="cursor: pointer; color: #FFFFFF;" href = "<?php echo $this->simpleUrl('view', 'announcements', 'contents', array('alias'=>$item->alias), 'contents/announcements/index' );?>"><?php echo Zend_Registry::get('trasvistit')->_("ANNOUNCEMENTS");?></a></div>
						<div class="right pl_all_box relative anons_all" style ="cursor: pointer;">
							<a style ="cursor: pointer;" class="dashed events"><?php echo Zend_Registry::get('trasvistit')->_("ALL_ANNOUNCEMENTS");?></a> &#8595;
							<div class="pop_up" style = "display: none">
								<div class="pop_up_left_top"></div>
								<div class="pop_up_right_top"></div>
								<div class="pop_up_top_l"></div>
								<div class="pop_up_top_r"></div>
								<div class="pop_up_left"></div>
								<div class="pop_corner"></div>
								<ul>
								<?php foreach ($this->acats as $item):?>
									<li><a style ="cursor: pointer;" class = "cat_anons" ans_id = "<?php echo $item->id;?>" ans_alias = "<?php echo $item->alias;?>"><?php echo $item->title;?></a></li>

									<?php endforeach;?>
								</ul>
								<div class="pop_up_left_bottom"></div>
								<div class="pop_up_right_bottom"></div>
								<div class="pop_up_right"></div>
								<div class="pop_up_bottom"></div>
							</div>
						</div>
						
						<div class="clearer"></div>
					</div>
					<span class = "ans_block">
					<?php foreach ($this->announcements as $item):?>
					<a style = 'color: #737373; text-decoration:none;' href = "<?php echo $this->simpleUrl('view', 'announcements', 'contents', array('alias'=>$item->alias), 'contents/announcements/view' ); ?>">
					<div class="pl_item_box">
						<div class="pl_item_title"><?php echo $item->date_created;?></div>
						<div><?php echo $item->tizer;?></div>
					</div>
					</a>
					<?php endforeach;?>
					</span>
				</div>
				
				<div class="left content_center bg_0066c1">
					<div class="pl_bg_box">
						<div class="pl_title_box"><a style ="cursor: pointer; color: #FFFFFF;" href = "<?php echo $this->simpleUrl('view', 'news', 'contents', array('alias'=>$item->alias), 'contents/news/index' ); ?>"><?php echo Zend_Registry::get('trasvistit')->_("NEWS");?></a></div>
						<div class="right pl_all_box news_all" style ="cursor: pointer;"><a style ="cursor: pointer;" class="dashed news"><?php echo Zend_Registry::get('trasvistit')->_("ALL_NEWS");?></a> &#8595;
							<div class="pop_up" style = "display: none">
								<div class="pop_up_left_top"></div>
								<div class="pop_up_right_top"></div>
								<div class="pop_up_top_l"></div>
								<div class="pop_up_top_r"></div>
								<div class="pop_up_left"></div>
								<div class="pop_corner"></div>
								<ul>
									<?php foreach ($this->ncats as $item):?>
									<li><a style ="cursor: pointer;" class = "cat_news" news_id = "<?php echo $item->id;?>" news_alias = "<?php echo $item->alias;?>"><?php echo $item->title;?></a></li>

									<?php endforeach;?>
								</ul>
								<div class="pop_up_left_bottom"></div>
								<div class="pop_up_right_bottom"></div>
								<div class="pop_up_right"></div>
								<div class="pop_up_bottom"></div>
							</div>
						</div>
						<div class="clearer"></div>
					</div>
					<span class = "news_block">
					<?php foreach ($this->news as $item):?>
					<a style = 'color: #737373; text-decoration:none;' href = "<?php echo $this->simpleUrl('view', 'news', 'contents', array('alias'=>$item->alias), 'contents/news/view' ); ?>">
					<div class="pl_item_box">
						<div class="pl_item_title"><?php echo $item->date_created;?></div>
						<div><?php echo $item->tizer;?></div>
					</div>
					</a>
					<?php endforeach;?>
					</span>
				</div>
				<div class="right content_right">
					<div class="grey_box">
						<div class="title_box"><?php echo Zend_Registry::get('trasvistit')->_("ACTUAL_INFO");?></div>
						<div class="text_box">
							<ul>
								<li><a href="">Ліцензування та акредитація</a></li>
								<li><a href="">Ласкаво просимо до Університету!</a></li>
								<li><a href="">Політика і цілі Університету</a></li>
								<li><a href="">Університет третьего віку</a></li>
								<li><a href="">До уваги абітурієнтів-2012!</a></li>
								<li><a href="">Ліцензування та акредитація</a></li>
								<li><a href="">Ліцензування та акредитація</a></li>
								<li><a href="">Ласкаво просимо до Університету!</a></li>
								<li><a href="">Політика і цілі Університету</a></li>
								<li><a href="">Університет третьего віку</a></li>
								<li><a href="">До уваги абітурієнтів-2012!</a></li>
								<li><a href="">Ліцензування та акредитація</a></li>
							</ul>
						</div>
					</div>
					<div class="grey_box">
						<div class="title_box"><?php echo Zend_Registry::get('trasvistit')->_("GOS");?></div>
						<div class="text_box">
							<ul>
								<li><center><img src="/theme/img/front/logo_m.jpg"/></center></li>
								<li><center><img src="/theme/img/front/logo_m1.jpg"/></center></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearer"></div>
				<div class="bg_61a123">
					<div class="pl_bg_box">
						<div class="pl_title_box"><?php echo Zend_Registry::get('trasvistit')->_("LAST_EVENTS");?></div>
						<div class="right pl_all_box"><a style = "cursor: pinter;" class="dashed"><?php echo Zend_Registry::get('trasvistit')->_("ALL_EVENTS");?></a> &#8595;</div>
						<div class="clearer"></div>
					</div>
					<div class="last_photo">
						<div style="width: 5000px;">
							<a href=""><img src="/theme/img/front/last_photo/p1.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p2.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p3.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p4.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p5.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p6.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p7.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p1.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p2.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p3.jpg"/></a>
							<a href=""><img src="/theme/img/front/last_photo/p4.jpg"/></a>
						</div>
						<div class="clearer"></div>
					</div>
				</div>
