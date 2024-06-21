
  </main>
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <?php if ( get_field( 'footer__links', 'option' ) || get_field( 'footer_email', 'option' ) || get_field( 'footer_social_medias', 'option' ) ) : ?>
          <div class="footer-col__menu col-lg-4 mb-5 mb-lg-0"> 
            <ul class="footer-menu">
              <?php if( have_rows( 'footer_links', 'option' ) ) : ?>
                <?php while( have_rows( 'footer_links', 'option' ) ) : the_row(); 
                  $link = get_sub_field( 'link', 'option' );
                  if ( $link ) :
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    $link_title = $link['title'];
                  ?>
                    <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link_title;?></a></li>
                  <?php endif;
                endwhile; 
              endif; ?>
              <li><a class="btn-outline--light" href="mailto:<?php echo esc_attr( get_field( 'footer_email', 'option' ) ); ?>"><?php echo get_field( 'footer_email', 'option' ); ?></a></li>
            </ul>
            <?php if( have_rows( 'footer_social_medias', 'option' ) ) : ?>
              <div class="social-media">
                <?php while( have_rows( 'footer_social_medias', 'option' ) ) : the_row();
                  $social_link = get_sub_field( 'social_link', 'option');  
                  $social_icon = get_sub_field( 'social_icon', 'option' );
                ?>
                 <a href="<?php echo $social_link; ?>" target="_blank" aria-label="Footer Social Icons" class="social-media__link">
                    <img src="<?php echo $social_icon['url']; ?>" alt="<?php echo $social_icon['alt']; ?>">
                  </a>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ( $footer_logo = get_field( 'footer_logo', 'option' ) ) : ?> 
          <div class="footer-col__logo col-lg-4 mb-5 mb-lg-0 d-flex justify-content-center">
            <a class="footer-logo" href="<?php echo home_url();?>" aria-label="Go to home page"><img class="skip-lazy site-logo" alt="lume logo" width="<?php echo $footer_logo['width']; ?>" height="<?php echo $footer_logo['height']; ?>" src="<?php echo $footer_logo['url']; ?>"></a>
          </div>
        <?php endif; ?>
        <?php if ( $newsletterForm = get_field( 'newsletter_form', 'option' ) ) :
          $heading = get_field( 'newsletter_heading', 'option' );
          $subheading = get_field( 'newsletter_tagline', 'option' );
        ?>
          <div class="footer-col__form col-lg-4 d-flex justify-content-center flex-column text-center">
            <?php if ( $subheading ) : ?>
              <div class="subheading"><?php echo $subheading; ?></div>
            <?php endif; ?>
            <?php if ( $heading ) : ?>
              <h4><?php echo $heading; ?></h4>
            <?php endif; ?>
            <div class="mt-4">
              <a href="https://thelumenewsletter.substack.com/" target="_blank" class="btn-outline--light subscribe-btn  d-inline">Subscribe</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if ( $copyright = get_field( 'footer_copyright', 'option' ) ) : ?>
      <div class="footer-copyright text-center">
        <div class="container">
          <?php echo $copyright; ?>
        </div>
      </div>
    <?php endif; ?>
  </footer>

  <?php 
  $bgImage = get_field( 'popup_bg_image', 'option' );
  $bgImage = $bgImage ? 'background-image: url('. $bgImage .'); background-size: 100%; background-repeat:no-repeat; background-size: cover; background-color: #233C29;' : ''; ?>
  <div id="announcementPopup" class="announcement-popup modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content" style="<?php echo $bgImage; ?>;">
        <div class="modal-body">
          <button type="button" class="js-close-modal close" data-dismiss="modal" aria-label="Close">
            <span class="popup-close-icon"></span>
          </button>
          <?php if ( $content = get_field( 'popup_content', 'option' ) ) : ?>
            <?php echo $content; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php wp_footer(); ?>
  </body>
</html>