<?php
  $loopcount = 0;
  foreach ($platforms as $platform => $platformdata) {
    $loopcount++;
    if ($platformdata['value'] == 'on'):
?>
<div class="platform-<?php echo $platform ?> platform <?php echo $platform ?> <?php echo ${$platform.'_orientation'} ?><?php if ($deviceMatch && $device == $platform){ 
                  echo ' current';
                } else if(!$deviceMatch && ${$platform.'_default'} == 'on'){
                  echo ' current';
                }?>">
                <div class="row">
                  <div class="content leftcolumn <?php echo ${$platform.'_leftcolumn'}; ?>">
                      
                      <div class="description">
                        
                        <?php if ($info_description_primary != ''): ?>
                        <p class="primary"><?php echo $info_description_primary ?></p>
                        <?php endif ?>

                        <?php if ($info_description_secondary != ''): ?>
                        <p class="secondary"><?php echo $info_description_secondary ?></p>
                        <?php endif ?>

                        <?php if (${$platform.'_description'} != ''): ?>
                        <p class="platform-description"><?php echo ${$platform.'_description'} ?></p>
                        <?php endif ?>

                      </div><!-- .description -->

                    
                    <?php if(${$platform.'_coming_soon'} != 'on') : ?>

                      <?php if(${$platform.'_appstore_url'} || isset(${$platform.'_appstore_url_amazon'}) != '') : ?>
                      <div class="get-app button-container">
                          <?php if(${$platform.'_appstore_url'} != '') : ?>
                          <a href="<?php echo ${$platform.'_appstore_url'} ?>"></a>
                          <?php endif ?>
                          <?php if(isset(${$platform.'_appstore_url_amazon'}) !='' && ${$platform.'_appstore_url_amazon'} !='') : ?>
                          <a class="amazon" href="<?php echo ${$platform.'_appstore_url_amazon'} ?>"></a>
                          <?php endif ?>
                      </div><!-- .get.button -->
                      <?php endif ?>

                      <?php if (${$platform.'_price'} != '') : ?>
                        <div class="app-price"><div><?php echo ${$platform.'_price'} ?></div></div>
                      <?php endif ?>
                    <?php else : ?>
                      <?php if (${$platform.'_coming_soon_text'} != '') : ?>
                      <div class="coming-soon"><div><?php echo ${$platform.'_coming_soon_text'} ?></div></div>
                      <?php endif ?>
                    <?php endif // coming soon mode ?>

                    
                  </div><!-- column.content -->



                  <div class="rightcolumn <?php echo ${$platform.'_rightcolumn'}; ?>">
                    <div class="device">
                    <?php if( ${$platform.'_effect'} == 'slideshow' ): ?>
                          <div class="screen slideshow">
                            <?php if (${$platform.'_slideshow_images'} != '') { ?>
                              <div class="flexslider">
                              <ul class="slides">
                              <?php 
                              if( is_array( ${$platform.'_slideshow_images'} ) )
                              foreach( ${$platform.'_slideshow_images'} as $image ) : 
                                $resized_image_src = theme_get_image( $image, ${$platform.'_screen_width'},${$platform.'_screen_height'},true);
                                $full_img_src = theme_get_image( $image);
                              ?>
                                <li><a class="fancybox" href="<?php echo $full_img_src; ?>" data-fancybox-group="<?php echo $platform ?>"><img src="<?php echo $resized_image_src; ?>" alt="<?php the_title(); ?> - <?php echo $platform . $loopcount ?>" /></a></li>
                              <?php endforeach; ?>
                              </ul>
                            </div><!-- .flexslider -->
                          <?php } else { ?>
                          <p class="noscreenshots"><?php _e( "No Screenshots", 'appifywp' ); ?></p>
                          <?php } ?>
                          </div><!-- .slideshow -->
                          
                          <?php elseif( ${$platform.'_effect'} == 'video' ): ?>
                            <div class="screen video">
                            
                              <?php if( is_numeric(${$platform.'_video_id'}) ): ?>
                                <iframe src="http://player.vimeo.com/video/<?php echo ${$platform.'_video_id'}; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                              <?php else: ?>
                                <iframe src="http://www.youtube.com/embed/<?php echo ${$platform.'_video_id'}; ?>?rel=0&autohide=1&egm=1&modestbranding=1&showinfo=0&wmode=opaque" width="<?php echo ${$platform.'_screen_width'} ?>" height="<?php echo ${$platform.'_screen_height'} ?>" frameborder="0" allowfullscreen controls="0" wmode="opaque"></iframe>
                              <?php endif; ?>
                              
                              
                            </div><!-- .video -->
                            
                          <?php endif; ?>
                      </div><!-- .device -->
                  </div><!-- column -->
                </div><!-- .row -->
                    
</div><!-- end #platform -->

<?php 
endif;

} // end foreach ?>