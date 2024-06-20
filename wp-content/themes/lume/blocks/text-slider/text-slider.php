<?php

/**
 * Text Slider Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/
$bgImage = get_field( 'lume_text_slider_bg_image' );
$bgImage = $bgImage ? 'background-image: url('. $bgImage .'); background-size: 100%; background-repeat:no-repeat;background-color: #817159;' : '';
$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'lume-text-slider alignfull'
    ]
);
?>
<?php
if (  isset( $block['data']['preview_image_text_slider'] ) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/text-slider.png" style="width:100%; height:auto;">';
else :
?>
    <!-- Slider code here -->
    <div <?php echo $wrapper_attributes; ?> style="<?php echo $bgImage; ?>;">
        <div class="js-lume-text-slider">
            <?php if ( have_rows( 'lume_text_slider' ) ) : ?>
                <?php while( have_rows( 'lume_text_slider' ) ): the_row(); 
                    $text = get_sub_field( 'lume_text_slider_text' );
                ?>
                    <div class="lume-text-slider__text" tabindex="-1">
                        <?php echo $text; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
endif;    
?>