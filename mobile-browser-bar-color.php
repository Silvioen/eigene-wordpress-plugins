<?php
/**
 * Plugin Name: Mobile Browser Bar Color
 * Description: Passt die Farbe der mobilen Browser-Bar durch Hinzufügen von Meta-Tags an.
 * Version: 1.0
 * Author: Silvio Endruhn
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sicherheit geht vor!
}

/**
 * Hauptfunktion, um die benötigten Hooks zu registrieren.
 */
function mbbc_init() {
    add_action( 'wp_head', 'mbbc_add_meta_tags' );
}
add_action( 'init', 'mbbc_init' );

/**
 * Fügt die Meta-Tags für die mobile Browser-Bar-Farbe hinzu.
 */
function mbbc_add_meta_tags() {
    // Standardfarbe für die Browser-Bar (Schwarz)
    $color = apply_filters( 'mbbc_browser_bar_color', '#000' ); // Ermöglicht Anpassung durch andere Entwickler.
    ?>
    <!-- Meta-Tags für die mobile Browser-Bar-Farbe -->
    <meta name="theme-color" content="<?php echo esc_attr( $color ); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?php
}
