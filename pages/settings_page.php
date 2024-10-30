<?php
defined('ABSPATH') or die('No direct load!'); // Some kind of security
class_exists('IconsEnricherSettings') or die('No direct load!'); // Only include from class is allowed

/**
 * @var $this IconsEnricherSettings
 */
?>
<style>
.i8e-wrap {
    background: #fff;
}
    .i8e-wrap a {
        text-decoration: none;
    }
        .i8e-wrap a:hover {
            text-decoration: underline;
        }
    .i8e-wrap .b-header {
        background: #FFBE00;
        color: #fff;
        padding: 10px;
        height: 48px;
        line-height: 48px;;
    }
        .i8e-wrap .b-header:after {
            content: '';
            display: block;
            clear: both;
        }

    .i8e-wrap .b-logo {
        color: #fff;
        margin: 0;
    }
        .i8e-wrap .b-logo svg {
            display: block;
            width: 48px;
            height: 48px;
            fill: #fff;
            margin-right: 12px;
            float: left;
        }
        .i8e-wrap .b-logo span {
            display: inline-block;
            float: left;
        }

.i8e-wrap .container {
    padding: 20px;
}
    .i8e-wrap .dashboard-announce {
        border: 1px solid #FFBE00;
        color: #333;
        padding: 10px;
        margin: 10px 0;
    }
        .i8e-wrap .dashboard-announce:after {
            content: '';
            display: block;
            clear: both;
    }

        .i8e-wrap .dashboard-announce:first-child {
            margin-top: 0;
        }
        .i8e-wrap .dashboard-announce:last-child {
            margin-bottom: 0;
        }
    .i8e-wrap .dashboard-announce-inverted {
        background: #FFBE00;
        border: 0 none;
        color: #fff;
    }
        .i8e-wrap .dashboard-announce-inverted a {
            color: #fff;
        }
            .i8e-wrap .dashboard-announce-inverted a:hover {
                color: #fff;
                text-decoration: underline;
            }

#js-i8e-agdtohs {
}
    #js-i8e-agdtohs, #js-i8e-agdtohs p, #js-i8e-agdtohs a {
        font-size: 1.1em;
    }
#js-i8e-sp101 {
}
    #js-i8e-sp101:after {
        content: '';
        display: block;
        clear: both;
    }
    #js-i8e-sp101-about {
        float: left;
        width: 50%;
    }
    #js-i8e-sp101-form {
        float: left;
        width: 50%;
    }
    #js-i8e-sp101 img {
        border-radius: 50%;
        height: 96px;
        padding-right: 40px;
        margin-right: -20px;
    }
    #js-i8e-sp101 .form-inline {
        display: table;
        width: 100%;
        margin-bottom: 10px;
    }
        #js-i8e-sp101 .form-inline:last-child {
            margin-bottom: 0;
        }
    #js-i8e-sp101 label {
        display: table-cell;
        padding: 5px 10px;
    }
    #js-i8e-sp101 label span {
        display: block;
    }
    #js-i8e-sp101 input[type=text] {
        width: 100%;
    }
    #js-i8e-sp101-above, #js-i8e-sp101-below {
        display: none;
    }
    #js-i8e-sp101 textarea {
        width: 100%;
        height: 5em;
    }

.icon8.icons8-treasure-chest {
    display: inline-block;
    width: 96px;
    height: 96px;
    float: left;
    margin-right: 24px;
}

.i8e-options {

}
.i8e-option {
    margin-top: 0.5em;
    margin-bottom: 0.5em;
}
    .i8e-option:first-child {
        margin-top: 0;
    }
    .i8e-option:last-child {
        margin-bottom: 0;
    }
.i8e-extraoptions {
    margin-left: 4em;
}

.i8e-options-wrap:after {
    content: '';
    display: block;
    clear: both;
}
.i8e-optionsbox {
    width: 50%;
    float: left;
}
</style>

<div class="wrap i8e-wrap">
    <div class="b-header">
        <h2 class="b-logo">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;"><path d="M24,10c0-1.657-1.343-3-3-3c-0.68,0-1.301,0.235-1.804,0.617C18.467,6.641,17.312,6,16,6  s-2.467,0.641-3.196,1.617C12.301,7.235,11.68,7,11,7c-1.657,0-3,1.343-3,3H6v12h3v3.134C8.701,25.307,8.5,25.63,8.5,26  c0,0.552,0.447,1,1,1c0.841,0,1.5-0.682,1.5-1.552V22h1v3.134c-0.299,0.173-0.5,0.496-0.5,0.866c0,0.552,0.447,1,1,1  c0.841,0,1.5-0.682,1.5-1.552V22h4v3.134c-0.299,0.173-0.5,0.496-0.5,0.866c0,0.552,0.447,1,1,1c0.841,0,1.5-0.682,1.5-1.552V22h1  v3.134c-0.299,0.173-0.5,0.496-0.5,0.866c0,0.552,0.447,1,1,1c0.841,0,1.5-0.682,1.5-1.552V22h3V10H24z M24,20H8v-8h16V20z M15,16  c0-0.552,0.448-1,1-1s1,0.448,1,1c0,0.552-0.448,1-1,1S15,16.552,15,16z M19,16c0-0.552,0.448-1,1-1s1,0.448,1,1  c0,0.552-0.448,1-1,1S19,16.552,19,16z M11,16c0-0.552,0.448-1,1-1s1,0.448,1,1c0,0.552-0.448,1-1,1S11,16.552,11,16z"></path></svg>
            <span><?php echo I8_ENRICHER_NAME ?></span>
        </h2>
    </div>

    <div class="clearfix container metabox-holder">
        <div id="postbox-container-left">
            <div class="content">
                <div class="dashboard-announce" id="js-i8e-agdtohs">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" viewBox="0 0 48 48" class="icon8 icons8-treasure-chest"><polygon fill="#4E342E" points="6,25 9,18 6,13 42,13 39,18 42,25 "></polygon><path fill="#795548" d="M42,42H6V25h36V42z M42,13c0,0-0.125-7-5-7S15.813,6,11,6c-5,0-5,7-5,7H42z"></path><path fill="#5D4037" d="M42,32H6v-2h36V32z M42,36H6v2h36V36z"></path><path fill="#FFAB00" d="M28,25v4c0,2.2-1.8,4-4,4s-4-1.8-4-4v-4H28z M6,42h6c0-3.313-2.686-6-6-6V42z M42,36c-3.314,0-6,2.687-6,6h6	V36z M24,9c-2.2,0-4,1.8-4,4h8C28,10.8,26.2,9,24,9z"></path><polygon fill="#212121" points="9,18 6,13 42,13 39,18 "></polygon><path fill="#FFC400" d="M38,25c0-1.657-1.343-3-3-3c0-1.657-1.343-3-3-3c-0.473,0-0.914,0.119-1.312,0.314	C30.265,18.535,29.449,18,28.5,18c-0.488,0-0.941,0.146-1.326,0.388C26.844,18.146,26.44,18,26,18c-0.375,0-0.721,0.109-1.021,0.289	C24.87,17.009,23.808,16,22.5,16c-1.231,0-2.249,0.892-2.456,2.063C19.868,18.024,19.687,18,19.5,18	c-1.308,0-2.37,1.009-2.479,2.289C16.721,20.109,16.375,20,16,20c-1.105,0-2,0.896-2,2c0,0.018,0.005,0.034,0.005,0.051	C13.842,22.018,13.673,22,13.5,22c-1.381,0-2.5,1.119-2.5,2.5c0,0.171,0.018,0.338,0.05,0.5H38z"></path><path fill="#FFE57F" d="M37.942,24.424c-0.026-0.134-0.071-0.26-0.114-0.386c-0.016-0.045-0.025-0.093-0.043-0.138	c-0.065-0.165-0.146-0.319-0.238-0.468c-0.001-0.001-0.002-0.003-0.002-0.004C37.016,22.574,36.078,22,35,22	c-0.786,0-1.496,0.309-2.031,0.804C32.989,22.706,33,22.604,33,22.5c0-0.829-0.672-1.5-1.5-1.5c-0.756,0-1.375,0.562-1.479,1.289	C29.721,22.109,29.375,22,29,22c-0.16,0-0.313,0.023-0.463,0.059C28.085,21.42,27.343,21,26.5,21c-0.59,0-1.126,0.213-1.554,0.556	C24.744,20.666,23.951,20,23,20c-0.873,0-1.608,0.563-1.88,1.343C20.8,21.126,20.415,21,20,21c-0.873,0-1.608,0.563-1.88,1.343	C17.8,22.126,17.415,22,17,22c-0.676,0-1.272,0.338-1.634,0.852C14.908,22.333,14.246,22,13.5,22c-0.815,0-1.532,0.396-1.989,1h0	c0,0,0,0,0,0c-0.068,0.09-0.128,0.186-0.183,0.285c-0.017,0.03-0.034,0.061-0.05,0.092c-0.043,0.085-0.082,0.171-0.116,0.262	c-0.025,0.065-0.043,0.133-0.062,0.201c-0.019,0.068-0.04,0.135-0.053,0.206C11.018,24.193,11,24.344,11,24.5	c0,0.171,0.018,0.338,0.05,0.5h7.672h5.789h6.211H32h6C38,24.802,37.979,24.61,37.942,24.424z"></path><path fill="#FF1744" d="M22,21l-1,2l-2-1l1-2L22,21z M30,20l-2,1l1,2l2-1L30,20z"></path><path fill="#3E2723" d="M24,31L24,31c-0.55,0-1-0.45-1-1v-1c0-0.55,0.45-1,1-1h0c0.55,0,1,0.45,1,1v1C25,30.55,24.55,31,24,31z"></path></svg>
                    <p>Thanks for choosing <?php echo I8_ENRICHER_NAME ?></p>
                    <p>Enrich your WordPress website with styled, consistent, pixel-perfect, first-class, shiny-ass icons.</p>
                </div>
                <div class="dashboard-announce" id="js-i8e-sp101">
                    <div id="js-i8e-sp101-about">
                        <img src="https://avatars1.githubusercontent.com/u/1147388?v=3&amp;s=460" width="96px" align="left">
                        <p>Hi! My name is Pavel, I'm from <a href="https://icons8.com/about/<?php echo I8_ENRICHER_GA_TRACKING ?>" target="_blank">Icons8</a> team.</p>
                        <p>I'm developing and supporting <strong><?php echo I8_ENRICHER_NAME ?></strong> by my own, independent from developing and supporting Icons8 apps.</p>
                        <p>Please ask me anything about plugin directly: via <a href="<?php echo esc_url(I8_ENRICHER_CONTACT_URL) ?>" target="_blank">support site</a>, or <a href="mailto:enricher@icons8.com">enricher@icons8.com</a>, or using this form:</p>
                    </div>
                    <div id="js-i8e-sp101-form">
                        <form action="<?php echo esc_url(I8_ENRICHER_CONTACT_URL) ?>" method="post" target="_blank">
                            <input type="hidden" name="cms" value="Wordpress"/>
                            <input type="hidden" name="cms_version" value="<?php echo esc_attr(get_bloginfo('version', 'display')) ?>"/>
                            <input type="hidden" name="app" value="<?php echo esc_attr(I8_ENRICHER) ?>"/>
                            <input type="hidden" name="app_version" value="<?php echo esc_attr(I8_ENRICHER_VERSION) ?>"/>

                            <div id="js-i8e-sp101-above">
                                <div class="form-inline">
                                    <label><span>Your name</span><input type="text" name="name" placeholder="Your name"></label>
                                    <label><span>Your email</span><input type="email" name="email" required placeholder="Your email" value="<?php echo esc_attr(get_bloginfo('admin_email')) ?>"></label>
                                    <label><span>Your domain</span><input type="url" name="url" placeholder="http://" value="<?php echo esc_attr(get_bloginfo('url')) ?>"></label>
                                </div>
                            </div>
                            <div class="form-inline">
                                <label><span>Your message, question, report, idea, suggestion</span><textarea name="text" onfocus="jsI8EnricherAgdtohsPrepare()" placeholder="Hi there, I'm contacting you regarding..."></textarea></label>
                            </div>
                            <div id="js-i8e-sp101-below">
                                <div align="center"><small>This form will be submitted to <a href="<?php echo esc_url(I8_ENRICHER_CONTACT_URL) ?>" target="_blank"><?php echo esc_html(I8_ENRICHER_CONTACT_URL) ?></a></small></div>
                                <div align="right"><input type="submit" class="button button-secondary" value="Send"></div>
                            </div>
                        </form>
<script>
function jsI8EnricherAgdtohsPrepare(){
    jQuery('#js-i8e-sp101-above').slideDown();
    jQuery('#js-i8e-sp101-below').slideDown();
};
</script>
                    </div>
                </div>

<form action="<?php echo esc_url( $this->settings_url() ); ?>" method="post">
<?php settings_fields(I8_ENRICHER); ?>
<?php //do_settings_sections(I8_ENRICHER); ?>
                <?php //submit_button(); ?>
                <div class="i8e-options-wrap">
                    <div class="i8e-optionsbox">
                        <h2 class="title">Packs</h2>
                        <p>Some packs require additional files to be included into page (CSS, Javascript, font files). You may reduce traffic by excluding unnecessary packs.</p>

                        <div class="i8e-packs-options">
                            <?php foreach($this->packs as $pack) { ?>
                                <?php $enabledOption = 'i8e__pack_'.$pack->apiCode.'_enabled'; ?>
                                <div class="i8e-option">
                                    <label>
                                        <input name="<?php echo $enabledOption ?>" type="hidden" value="0">
                                        <input name="<?php echo $enabledOption ?>" id="<?php echo $enabledOption ?>"
                                               type="checkbox"
                                               value="1"
                                               <?php checked('1', $this->option($enabledOption)); ?>>
                                        <?php
                                        echo 'Enable ', $pack->title;
                                        if ($pack->version)
                                            echo ' v'.$pack->version;
                                        echo ' pack';

                                        if ($pack->url) {
                                            echo ' ( <a href="', esc_attr($pack->url), '" target="_blank">preview</a> )';
                                        }
                                        ?>
                                    </label>

                                    <?php if ($pack->apiCode == 'fontawesome') { ?>
                                    <div class="i8e-extraoptions">
                                        <div class="i8e-option">
                                            <label>
                                                <input name="i8e__pack_fontawesome_source"
                                                       type="radio"
                                                       value="<?php echo IconsEnricher::SOURCE_BUILTIN ?>"
                                                       <?php checked(IconsEnricher::SOURCE_BUILTIN, $this->option('i8e__pack_fontawesome_source')); ?>>
                                                <span>Use built-in (if intranet, firewall, etc)</span></label>
                                        </div>
                                        <div class="i8e-option">
                                            <label>
                                                <input name="i8e__pack_fontawesome_source"
                                                       type="radio"
                                                       value="<?php echo IconsEnricher::SOURCE_CDN ?>"
                                                       <?php checked(IconsEnricher::SOURCE_CDN, $this->option('i8e__pack_fontawesome_source')); ?>>
                                                <span>Use CDN for speed</span></label>
                                        </div>
                                        <div class="i8e-option">
                                            <label>
                                                <input name="i8e__pack_fontawesome_source"
                                                       type="radio"
                                                       value="<?php echo IconsEnricher::SOURCE_DEFAULT ?>"
                                                       <?php checked(IconsEnricher::SOURCE_DEFAULT, $this->option('i8e__pack_fontawesome_source')); ?>>
                                                <span>Use existing one from any other installed WordPress plugin (experimental)</span></label>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if ($pack->apiCode != 'fontawesome' && !empty($pack->source_cdn)) { ?>
                                        <?php $sourceOption = 'i8e__pack_'.$pack->apiCode.'_source'; ?>
                                        <div class="i8e-extraoptions">
                                            <div class="i8e-option">
                                                <label>
                                                    <input name="<?php echo $sourceOption ?>"
                                                           type="radio"
                                                           value="<?php echo IconsEnricher::SOURCE_BUILTIN ?>"
                                                        <?php checked(IconsEnricher::SOURCE_BUILTIN, $this->option($sourceOption)); ?>>
                                                    <span>Use built-in (if intranet, firewall, etc)</span></label>
                                            </div>
                                            <div class="i8e-option">
                                                <label>
                                                    <input name="<?php echo $sourceOption ?>"
                                                           type="radio"
                                                           value="<?php echo IconsEnricher::SOURCE_CDN ?>"
                                                        <?php checked(IconsEnricher::SOURCE_CDN, $this->option($sourceOption)); ?>>
                                                    <span>Use CDN for speed</span></label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php submit_button(); ?>
</form>
            </div>
        </div>
</div>
