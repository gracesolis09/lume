<?php

/**
 * Image Linking Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/
$image = get_field( 'lume_image_linking_image');
$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'lume-image-linking'
    ]
);
?>

<?php
if (  isset( $block['data']['preview_image_image_linking'] ) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/image-linking.png" style="width:100%; height:auto;">';
else :
?>
    <div <?php echo $wrapper_attributes; ?>>
        <?php if ( $image ) : ?>
            <div class="lume-image-linking__image-holder">
                <?php echo wp_get_attachment_image( $image['ID'], 'large', "", ["class" => "lume-image-linking__image"]); ?>
                <?php if( have_rows( 'lume_image_linking_dots' ) ) : 
                    $count = 1;
                ?>
                    <?php while ( have_rows( 'lume_image_linking_dots' ) ) : the_row(); 
                        $dotX = get_sub_field( 'x_coordinate' );
                        $dotY = get_sub_field( 'y_coordinate' );
                        $link = get_sub_field( 'link' );

                    ?>
                    <div class="lume-image-linking__dot lume-image-linking__dot--<?php echo $count; ?> js-lume-dot-hover" style="top:<?php echo $dotY; ?>%; left:<?php echo $dotX;?>%;">
                        <?php if ( $link ) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="btn-link dot-content" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php $count++; endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>