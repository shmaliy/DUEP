<style>

.header {
	position: absolute;
	z-index: 1000;
	width: 100%;
	height: 298px;
	left: 0;
	background: url('/theme/img/front/header.jpg') no-repeat center top;
	
}
body{
	background: url('/theme/img/front/header_bg.png') repeat-x 0px 0px;
	color: #737373;
	font-family: Arial;
	font-size: 12px;
	line-height: 18px;
}

</style>
            
				<div class="promo relative">
				<span class = "baner_big">
				 <?php $i = 0; $kol = 0;  foreach ($this->resizer as $items): $kol = $kol + 1; if($i == 0): $i = 1;?> 
				 <span id_baner_big = "<?php echo $kol; ?>">
					<img src="<?php echo $items['big']; ?>"/>
					<div class="promo_text">
						<div class="MyriadProCondBold fs28 color_ffc400" style = "max-width: 800px;"><?php echo $items['title']; ?></div>
						
						<div class="MyriadProCondRegular fs20" style = "max-width: 500px;"><?php echo $items['tizer']; ?></div>
					</div>
					</span>

				<?php else: ?>
								 <span style = "display:none;">
					<img src="<?php echo $items['big']; ?>"/>
					<div class="promo_text">
						<div class="MyriadProCondBold fs38 color_ffc400"><?php echo $items['title']; ?></div>
						
						<div class="MyriadProCondRegular fs14"><?php echo $items['tizer']; ?></div>
					</div>
					</span>
						<?php endif; endforeach;?>
						</span>
					<div class="promo_img">
					 <?php $i = 0; $kol = 0;  foreach ($this->resizer as $items): $kol = $kol + 1; if($i == 0): $i = 1;?> 
						<a style = "cursor: pointer" class="active" id_baner_min = "<?php echo $kol; ?>"><img src="<?php echo $items['small']; ?>"/></a>
						 <?php else: ?>
						<a style = "cursor: pointer" id_baner_min = "<?php echo $kol; ?>"><img src="<?php echo $items['small']; ?>"/></a>
						<?php endif; endforeach;?>
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
