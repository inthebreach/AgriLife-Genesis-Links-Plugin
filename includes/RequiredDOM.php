<?php

class RequiredDOM {

    public function __construct() {

        add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );

        add_action( 'wp_head', array( $this, 'add_skip_nav_link') );

        add_action( 'genesis_before', array( $this, 'add_required_head_content'), 2 );

        add_action( 'genesis_setup', array( $this, 'remove_default_footer' ) );

        add_action( 'genesis_footer', array( $this, 'genesis_do_footer' ), 6 );

    }

    /**
     * Provides the styles for header and footer links
     *
     * @return HTML
     */
    function register_plugin_styles() {
        wp_register_style( 'aglinks-plugin', AGL_DIR_URL . 'css/aglinks.css' );
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
     * Provides the skip links
     *
     * @return HTML
     */
    public function add_skip_nav_link()
    {
        ?>
        <div class="agl-skip-link">
        <a href="#content" title="Skip to content" tabindex="1">Skip to content</a>
        </div>
        <?php
    }

    /**
     * Provides the header links
     *
     * @return HTML
     */
    public function add_required_head_content()
    {
        $arltheme = wp_get_theme()->get('Name');
        ?>
        <div class="agl-agency-bar <?php echo strtolower(str_replace(' ', '', $arltheme)); ?>">
            <div class="agency-wrap">
                <ul>
                    <li class="tfs-item"><a href="http://texasforestservice.tamu.edu/"><span>Texas A&amp;M Forest Service</span></a></li>
                    <li class="tvmdl-item"><a href="http://tvmdl.tamu.edu/"><span>Texas A&amp;M Veterinary Medical Diagnostics Laboratory</span></a></li>
                    <li class="ext-item"><a href="http://agrilifeextension.tamu.edu/"><span>Texas A&amp;M AgriLife Extension Service</span></a></li>
                    <li class="res-item"><a href="http://agriliferesearch.tamu.edu/"><span>Texas A&amp;M AgriLife Research</span></a></li>
                    <li class="college-item"><a href="http://aglifesciences.tamu.edu/"><span>Texas A&amp;M College of Agrculture and Life Sciences</span></a></li>
                </ul>
            </div>
        </div>
        <?php
    }

    /**
     * Provides the footer links
     *
     * @return HTML
     */
    public function genesis_do_footer()
    {
        ?>
            <div class="wrap">
                <div class="footer-container">
                    <ul class="req-links">
                        <li><a href="http://agrilife.org/required-links/compact/">Compact with Texans</a></li>
                        <li><a href="http://agrilife.org/required-links/privacy/">Privacy and Security</a></li>
                        <li><a href="http://itaccessibility.tamu.edu/" target="_blank">Accessibility Policy</a></li>
                        <li><a href="http://www2.dir.state.tx.us/pubs/Pages/weblink-privacy.aspx" target="_blank">State Link Policy</a></li>
                        <li><a href="http://www.tsl.state.tx.us/trail" target="_blank">Statewide Search</a></li>
                        <li><a href="http://www.tamus.edu/veterans/" target="_blank">Veterans Benefits</a></li>
                        <li><a href="http://fcs.tamu.edu/families/military_families/" target="_blank">Military Families</a></li>
                        <li><a href="https://secure.ethicspoint.com/domain/en/report_custom.asp?clientid=19681" target="_blank">Risk, Fraud &amp; Misconduct Hotline</a></li>
                        <li><a href="http://www.texashomelandsecurity.com/" target="_blank">Texas Homeland Security</a></li>
                        <li><a href="http://veterans.portal.texas.gov/">Texas Veteran's Portal</a></li>
                        <li><a href="http://aghr.tamu.edu/education-civil-rights.htm" target="_blank">Equal Opportunity for Educational Programs Statement</a></li>
                        <li class="last"><a href="http://agrilife.org/required-links/orpi/">Open Records/Public Information</a></li>
                    </ul>
                </div>
                <div class="footer-container-tamus">
                    <a href="http://tamus.edu/" title="Texas A&amp;M University System"><img class="footer-tamus" src="http://aglifesciences.tamu.edu/biochemistry2/wp-content/themes/AgriFlex3/img/footer-tamus-maroon.png" title="Texas A&amp;M University System Member" alt="Texas A&amp;M University System Member">
                    <noscript><img src="//agrilifecdn.tamu.edu/wp-content/themes/AgriLife-Beta/images/footer-tamus.png" title="Texas A&amp;M University System Member" alt="Texas A&amp;M University System Member" /></noscript></a>
                </div>
            </div>
        </footer>
        <?php
    }
}