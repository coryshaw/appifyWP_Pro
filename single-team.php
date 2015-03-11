<?php
	get_header();
	the_post();
	
	// Get Team Member Info
	$name = get_the_title();
	$title = get_post_meta($post->ID, 'info_role', true);
	$mug = theme_get_image( get_post_meta($post->ID, 'info_mug', true), 150, 150, true );
	$location = get_post_meta($post->ID, 'info_location', true);
	$shortbio = get_post_meta($post->ID, 'info_short_bio', true);
	$email = get_post_meta($post->ID, 'info_email', true);
	$phone = get_post_meta($post->ID, 'info_phone', true);
	$website = get_post_meta($post->ID, 'info_website', true);
	$twitter = get_post_meta($post->ID, 'info_twitter', true);
	$facebook = get_post_meta($post->ID, 'info_facebook', true);
	$linkedin = get_post_meta($post->ID, 'info_linkedin', true);
?>

<section id="body" class="team">
<div class="container">

  <div class="row">
    <div class="span8 content">
      
      <?php if (function_exists('appifywp_breadcrumbs')) appifywp_breadcrumbs(); ?>

            <?php if ($mug != ''){ ?>
              <div class="mugshot pull-right"><img src="<?php echo $mug ?>" alt="<?php echo $name ?>"/></div>
            <?php } ?>

        	  <div class="team-member-info">


                
         
        	    <?php
        	    // BASIC INFO
        	    if ($name != '' || $title != '' || $location != ''){ ?>
        	    <div class="basic-info">
        	    
              
            	  <?php if ($name != ''){ ?>
            	    <h1><?php echo $name ?></h1> 
            	  <?php } ?>
            	  
            	  <?php if ($title != ''){ ?>
            	    <div class="title"><?php echo $title ?></div>
            	  <?php } ?>
            	  
            	  <?php if ($location != ''){ ?>
            	    <div class="location"><?php echo $location ?></div>
            	  <?php } ?>
          	  
          	  </div><!-- end basic-info -->
          	  <?php } 
          	  // END BASIC INFO ?>
          	  
          	  <?php
          	  // CONTACT INFO
          	  if ($email != '' || $phone != '' || $website != ''){ ?>
          	  <div class="contact-info">
          	    
          	    <?php if ($email != ''){ ?>
          	      <div class="email"><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></div>
          	    <?php } ?>
          	    
          	    <?php if ($phone != ''){ ?>
          	       <div class="phone"><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></div>
          	    <?php } ?>
          	    
          	    <?php if ($website != ''){ ?>
          	       <div class="website"><a href="<?php echo $website ?>"><?php echo $website ?></a></div>
          	    <?php } ?>
          	  </div><!-- end contact-info -->

              <?php } ?>
          	
              

              <?php
              // SOCIAL LINKS
              if ($twitter != '' || $facebook != '' || $linkedin != ''){ ?>
              <div class="social-links">
                
                <?php if ($twitter != ''){ ?>
                  <a class="twitter" href="<?php echo $twitter ?>"><i class="icon-twitter"></i></a>
                <?php } ?>
                
                <?php if ($facebook != ''){ ?>
                   <a class="facebook" href="<?php echo $facebook ?>"><i class="icon-facebook"></i></a>
                <?php } ?>
                
                <?php if ($linkedin != ''){ ?>
                  <a class="linkedin" href="<?php echo $linkedin ?>"><i class="icon-linkedin"></i></a>
                <?php } ?>
              </div><!-- end social-links -->
              <?php } ?>
     

       
            
            </div><!-- end team-member-info -->


            <div class="team-member-bio">
              <?php if( have_posts() ) the_post(); the_content(); ?>
            </div><!-- .team-member-bio -->
        	</div><!-- .span8 -->
          <?php get_sidebar('sidebar'); ?>

        </div><!-- .row -->

    
</div><!-- .container --> 
</section><!-- #team-member -->
<?php get_footer(); ?>