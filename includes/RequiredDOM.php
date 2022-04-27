<?php

class RequiredDOM {

    private $agencies;
    private $university_links;

    public function __construct() {

        $this->agencies = wpsf_get_setting( 'agl_req_links', 'general', 'agencies' );
        $this->university_links = wpsf_get_setting( 'agl_req_links', 'general', 'university_links' );

        add_theme_support( 'genesis-accessibility', array(
            'skip-links',
        ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );

        if( empty( $this->university_links ) || $this->university_links === 'footer' ){

            add_action( 'genesis_setup', array( $this, 'remove_default_footer' ) );

            add_action( 'genesis_footer', array( $this, 'genesis_do_footer' ), 11 );

        }

        add_filter( 'genesis_attr_sidebar-primary', array( $this, 'genesis_attributes_sidebar_primary' ), 11 );

    }

    /**
     * Add attributes for primary sidebar element.
     *
     * @since 1.2.8
     *
     * @param array $attributes Existing attributes for primary sidebar element.
     * @return array Amended attributes for primary sidebar element.
     */
    public function genesis_attributes_sidebar_primary( $attributes ) {

        if ( array_key_exists( 'role', $attributes ) ) {
            unset( $attributes['role'] );
        }

        return $attributes;

    }

    /**
     * Provides the styles for header and footer links
     *
     * @return HTML
     */
    function register_plugin_styles() {

        wp_register_style(
            'aglinks-plugin',
            AGL_DIR_URL . 'css/aglinks.css',
            false,
            filemtime( AGL_DIR_PATH . '/css/aglinks.css' ),
            'screen'
        );
        wp_enqueue_style( 'aglinks-plugin' );

    }

    /**
     * Removes existing footer content
     *
     * @return void
     */
    function remove_default_footer() {

        remove_action( 'genesis_footer', 'genesis_do_footer' );

    }

    /**
     * Provides the footer links
     *
     * @return HTML
     */
    public function genesis_do_footer()
    {

        ?>
            <div class="agl-footer-wrap <?php echo AGL_THEME_NAME; ?>">
                <div class="wrap">
                    <div class="footer-container">
                        <ul class="req-links">
                            <li><a href="http://agrilife.org/required-links/compact/">Compact with Texans</a></li>
                            <li><a href="http://agrilife.org/required-links/privacy/">Privacy and Security</a></li>
                            <li><a href="http://itaccessibility.tamu.edu/" target="_blank">Accessibility Policy</a></li>
                            <li><a href="https://dir.texas.gov/resource-library-item/state-website-linking-privacy-policy" target="_blank">State Link Policy</a></li>
                            <li><a href="http://www.tsl.state.tx.us/trail" target="_blank">Statewide Search</a></li>
                            <li><a href="http://veterans.tamu.edu/" target="_blank">Veterans Benefits</a></li>
                            <li><a href="https://fch.tamu.edu/programs/military-programs/" target="_blank">Military Families</a></li>
                            <li><a href="https://secure.ethicspoint.com/domain/en/report_custom.asp?clientid=19681" target="_blank">Risk, Fraud &amp; Misconduct Hotline</a></li>
                            <li><a href="https://gov.texas.gov/organization/hsgd" target="_blank">Texas Homeland Security</a></li>
                            <li><a href="http://veterans.portal.texas.gov/">Texas Veterans Portal</a></li>
                            <li><a href="http://agrilifeas.tamu.edu/hr/diversity/equal-opportunity-educational-programs/" target="_blank">Equal Opportunity</a></li>
                            <li class="last"><a href="http://agrilife.org/required-links/orpi/">Open Records/Public Information</a></li>
                        </ul>
                    </div>
                    <div class="footer-container-tamus">
                        <?php
                            function agl_footer_container_tamus(){
                                $content = '<a href="http://tamus.edu/" title="Texas A&amp;M University System"><img class="footer-tamus" src="' . AGL_DIR_URL . 'img/footer-tamus-maroon.png" alt="Texas A&amp;M University System Member"></a>';
                                $output = apply_filters( 'agl_footerlogo', $content );
                                if ( $output != '' ){
                                    echo $output;
                                } else {
                                    echo $content;
                                }
                            }
                            agl_footer_container_tamus();
                        ?>
                    </div>
                </div>
            </div>
        <?php
    }
}
