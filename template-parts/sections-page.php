<?php if( have_rows('page_sections') ) : 
  while( have_rows('page_sections') ) : the_row(); ?>

  <?php if( get_row_layout() == 'short_text' ) : ?>

    <?php $background = get_sub_field('background_image'); 
    if( $background ) : ?>
      <div class="text-block --dark --has-bg-image" style="--background-url: url('<?php echo $background["sizes"]["large"]; ?>');">
    <?php else : ?>
      <div class="text-block --dark">
    <?php endif; ?>
      
        <div class="text-block__wrapper container">
          <?php if(get_sub_field('heading') ) : ?>
            <div class="text-block__heading">
              <h2><?php the_sub_field('heading'); ?></h2>
            </div>
          <?php endif; ?>
          
          <div class="text-block__content">
            <?php the_sub_field('text'); ?>

            <?php if(get_sub_field('add_link') ) : ?>
              <?php if(have_rows('button') ) : while(have_rows('button')) : the_row(); ?>
                
                <?php $linkto = get_sub_field('link_to');
                if($linkto == 'internal') {
                  $url = get_sub_field('button_link');
                } else if($linkto == 'external') {
                  $url = get_sub_field('custom_url');
                } ?>

                <a class="text-link" href="<?php echo $url; ?>"><?php the_sub_field('button_label'); ?> <span class="link-arrow">→</span></a>
                
              <?php endwhile; ?>
              <?php endif; /* button */ ?>
            <?php endif; /* add_link */ ?>
            
          </div>
        </div>
      </div>

  <?php elseif( get_row_layout() == 'image_break') : 
    $image = get_sub_field('image');
    $spacing = get_sub_field('spacing'); 
    ?>
    <div class="image-section --spacing-<?php echo $spacing; ?>" style="--background-url: url('<?php echo $image["sizes"]["large"]; ?>');"></div>
  
  <?php else : ?>

  <?php endif; ?>

<?php endwhile; /* page sections */ ?>
<?php endif; /* page sections */ ?>