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
    add_action( 'customize_register', 'mbbc_customize_register' );
}
add_action( 'init', 'mbbc_init' );

/**
 * Registriert die Customizer-Einstellungen unter Design > Customizer.
 */
function mbbc_customize_register( $wp_customize ) {
    // Sektion
    $wp_customize->add_section( 'mbbc_section', array(
        'title'    => __( 'Mobile Browser-Bar Farbe', 'mbbc' ),
        'priority' => 160,
    ) );

    // Einstellung
    $wp_customize->add_setting( 'mbbc_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    // Colorpicker-Control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mbbc_color', array(
        'label'   => __( 'Browser-Bar Farbe (HEX)', 'mbbc' ),
        'section' => 'mbbc_section',
    ) ) );
}

/**
 * Fügt die Meta-Tags für die mobile Browser-Bar-Farbe hinzu.
 */
function mbbc_add_meta_tags() {
    $color = get_theme_mod( 'mbbc_color', '#000000' );
    $color = apply_filters( 'mbbc_browser_bar_color', $color );
    ?>
    <!-- Meta-Tags für die mobile Browser-Bar-Farbe -->
    <meta name="theme-color" content="<?php echo esc_attr( $color ); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?php
}
