<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
$current_url = $_SERVER['HTTP_HOST']; // Get the current host (domain) without protocol and path
$main_domain = 'lumewomenshealth.com'; // The main domain
$excluded_subdomains = array('staging2'); // Define the subdomains to exclude

// Extract the subdomain from the current URL
$subdomain = explode('.', $current_url)[0];

// Check if the subdomain is in the list of excluded subdomains
if (!in_array($subdomain, $excluded_subdomains)) {
    // If the subdomain is not excluded, include Google Analytics code
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YFX3F3HZRZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YFX3F3HZRZ');
    </script>
    <?php
}
?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>
  <!-- <div id="loader">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/lume-animation.gif" alt="Loading GIF">
  </div> -->
  <header class="header">
    <?php if ( $topbarEnable = get_field( 'top_bar_enable', 'option' ) && $topBarText = get_field( 'top_bar_text', 'option' ) ) : ?>
      <div class="topbar">
        <div class="container">
          <?php echo $topBarText; ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="header__main">
      <div class="container">
        <a href="<?php echo home_url();?>" aria-label="Go to home page"><img class="skip-lazy site-logo" alt="lume logo" width="<?php echo get_field( 'header_logo', 'option' )['width']; ?>" height="<?php echo get_field( 'header_logo', 'option' )['height']; ?>" src="<?php echo get_field( 'header_logo', 'option' )['url']; ?>"></a>
        <button class="header__toggler js-nav-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="header__toggler-icon"></span>
          <span class="header__toggler-icon"></span>
          <span class="header__toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainmenu">
          <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'primary',
                'container'       => '',
                'menu_class'      => 'header__main-nav ms-auto',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'fallback_cb'     => '__return_false',
                'walker'          => new WP_bootstrap_4_walker_nav_menu()
              )
            );
          ?>
        </div>
      </div>
    </div>
    
  </header>
  <main>