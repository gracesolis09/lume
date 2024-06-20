<?php
/**
 * Newsletter Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/
$id = 'block-' . $block['id'];

$newsletterForm = get_field( 'newsletter_form', 'option' );
$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'lume-newsletter mx-auto text-center ' . $isReverse . ' ' . $position,
    ]
);

?>
<?php
if ( isset( $block['data']['preview_image_newsletter'] ) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/newsletter.png" style="width:100%; height:auto;">';
else :
?>

    <div <?php echo $wrapper_attributes; ?>>
        <?php echo $newsletterForm; ?>
    </div>
<?php endif; ?>