<div class="platform-<?php echo $mainPlatform ?> platform <?php echo $mainPlatform ?> <?php echo ${$mainPlatform.'_orientation'} ?> current">
                <div class="row-fluid">
                  <div class="content leftcolumn <?php echo ${$mainPlatform.'_leftcolumn'}; ?>">
                      
                      <div class="app-title-group clearfix">
                          				<?php if( $app_icon != '' ): ?>
                      						<a href="<?php the_permalink(); ?>"><img id="app-icon" src="<?php echo $app_icon; ?>" alt="<?php the_title(); ?> icon" /></a>
                                  <?php endif; ?>
                      
                      					    <h1 id="app-title">
                      					        <?php if( $info_use_image == 'on' && $info_app_logo != '' ): ?>
                      					            <a href="<?php the_permalink(); ?>"><img src="<?php echo $info_app_logo ?>" alt="<?php the_title(); ?>" /></a>
                      					        <?php else: ?>
                      					            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      					        <?php endif; ?>
                      					    </h1>
                      </div><!-- .app-title-group -->
                      
                      <div class="description">
                        
                        <?php if ($info_description_primary != ''): ?>
                        <p class="primary"><?php echo $info_description_primary ?></p>
                        <?php endif ?>

                        <?php if ($info_description_secondary != ''): ?>
                        <p class="secondary"><?php echo $info_description_secondary ?></p>
                        <?php endif ?>

                        <?php if (${$mainPlatform.'_description'} != ''): ?>
                        <p class="platform-description"><?php echo ${$mainPlatform.'_description'} ?></p>
                        <?php endif ?>
                        
                        <div class="platform-links">
                          <?php if($platformCount > 0): ?>


                          <div class="platforms">
                            <p class="for"><?php _e( 'Available For', 'appifywp' ) ?></p>
                          <?php 
                              foreach ($platforms as $platform => $data) {
                            if ($data['value'] == 'on'):
                            ?>
                            <a href="<?php echo the_permalink() . '#' . $platform ?>" class="<?php echo $platform ?> platform"><?php _e( $data['name'], 'appifywp' ) ?></a><?php 
                              endif; 
                              } // end foreach
                            ?>
                          </div><!-- .platforms -->

                          
                          <?php else : ?>
                            <?php if(${$mainPlatform.'_coming_soon'} != 'on') : ?>
                            
                                                  <?php if(${$mainPlatform.'_appstore_url'} || isset(${$platform.'_appstore_url_amazon'}) != '') : ?>
                                                  <div class="get-app button-container">
                                                      <?php if(${$mainPlatform.'_appstore_url'} != '') : ?>
                                                      <a href="<?php echo ${$mainPlatform.'_appstore_url'} ?>"></a>
                                                      <?php endif ?>
                                                      <?php if(isset(${$mainPlatform.'_appstore_url_amazon'}) !='' && ${$mainPlatform.'_appstore_url_amazon'} !='') : ?>
                                                      <a class="amazon" href="<?php echo ${$mainPlatform.'_appstore_url_amazon'} ?>"></a>
                                                      <?php endif ?>
                                                  </div><!-- .get.button -->
                                                  <?php endif ?>
                            
                                                  <?php if (${$mainPlatform.'_price'} != '') : ?>
                                                    <div class="app-price"><div><?php echo ${$mainPlatform.'_price'} ?></div></div>
                                                  <?php endif ?>
                                                <?php else : ?>
                                                  <?php if (${$mainPlatform.'_coming_soon_text'} != '') : ?>
                                                  <div class="coming-soon"><div><?php echo ${$mainPlatform.'_coming_soon_text'} ?></div></div>
                                                  <?php endif ?>
                                                <?php endif // coming soon mode ?>
                            <?php endif; ?>

                            <a class="btn btn-large" href="<?php the_permalink(); ?>"><?php _e( 'More Info', 'appifywp' );?> <i class="icon-double-angle-right"></i></a>
                        

                      </div><!-- .description -->

                    
                                        					
                    </div><!-- .platforms -->

                    
                  </div><!-- column.content -->



                  <div class="rightcolumn <?php echo ${$mainPlatform.'_rightcolumn'}; ?>">
                    <div class="device">
                    <?php if( ${$mainPlatform.'_effect'} == 'slideshow' ): ?>
                          <div class="screen slideshow">
                              <?php if (${$mainPlatform.'_slideshow_images'} != '') { ?>
                                  <div class="flexslider">
                                  <ul class="slides">
                                  <?php 
                                  if( is_array( ${$mainPlatform.'_slideshow_images'} ) )
                                  foreach( ${$mainPlatform.'_slideshow_images'} as $image ) : 
                                    $resized_image_src = theme_get_image( $image, ${$mainPlatform.'_screen_width'},${$mainPlatform.'_screen_height'},true);
                                    $full_img_src = theme_get_image( $image);
                                  ?>
                                    <li><a class="fancybox" href="<?php echo $full_img_src; ?>" data-fancybox-group="<?php echo $mainPlatform ?>"><img src="<?php echo $resized_image_src; ?>" alt="<?php the_title(); ?> - <?php echo $mainPlatform ?>" /></a></li>
                                  <?php endforeach; ?>
                                  </ul>
                                </div><!-- .flexslider -->
                              <?php } else { ?>
                              <p class="noscreenshots"><?php _e( "No Screenshots" ); ?></p>
                              <?php } ?>
                              
                          </div><!-- .slideshow -->
                          
                          <?php elseif( ${$mainPlatform.'_effect'} == 'video' ): ?>
                            <div class="screen video">
                            
                              <?php if( is_numeric(${$mainPlatform.'_video_id'}) ): ?>
                                <iframe src="http://player.vimeo.com/video/<?php echo ${$mainPlatform.'_video_id'}; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                              <?php else: ?>
                                <iframe src="http://www.youtube.com/embed/<?php echo ${$mainPlatform.'_video_id'}; ?>?rel=0&autohide=1&egm=1&modestbranding=1&showinfo=0&wmode=opaque" width="<?php echo ${$mainPlatform.'_screen_width'} ?>" height="<?php echo ${$mainPlatform.'_screen_height'} ?>" frameborder="0" allowfullscreen controls="0" wmode="opaque"></iframe>
                              <?php endif; ?>
                              
                              
                            </div><!-- .video -->
                            
                          <?php endif; ?>
                      </div><!-- .device -->
                  </div><!-- column -->
                </div><!-- .row -->
                    
</div><!-- end #platform -->

