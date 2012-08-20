            <div class="language">
                <div class="language_active relative">
                    <div class="language_active_left lang"></div>
                    <?php foreach ($this->langs as $items): if($items->default == 1): ?>
                    <img src="/theme/img/front/<?php echo $items->alias;?>.jpg" class="lan lang_img"/><a style = "cursor: pointer;" class="dashed dashed_lang"><?php echo $items->title;?></a> &#8595;
                    <?php endif; endforeach; ?>
                    <div class="language_active_right"></div>
                </div>
                <div class="pop_up lang_dop">
                    <div class="pop_up_left_top"></div>
                    <div class="pop_up_right_top"></div>
                    <div class="pop_up_top_l"></div>
                    <div class="pop_up_top_r"></div>
                    <div class="pop_up_left"></div>
                    <div class="pop_corner"></div>
                        <ul>
                         <?php foreach ($this->langs as $items):?>
                            <li><img src="/theme/img/front/<?php echo $items->alias;?>.jpg" class="lan"/><a class="lang" ele = "<?php echo $items->alias;?>"><?php echo $items->title;?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <div class="pop_up_left_bottom"></div>
                    <div class="pop_up_right_bottom"></div>
                    <div class="pop_up_right"></div>
                    <div class="pop_up_bottom"></div>
                </div>
            </div>