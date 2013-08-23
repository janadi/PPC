<?php

/* settings.html.twig */
class __TwigTemplate_216eb2fffd7a5b08e05b9b54501d6b4f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
<div style=\"position: relative; width: 100%;\"> ";
        // line 9
        echo "    <form method=\"post\" action=\"\" id=\"settings_form\" enctype=\"multipart/form-data\">
        ";
        // line 10
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "

        <h3>";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Geolocation"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Geolocation Service"), "html", null, true);
        echo "
                    </th>
                    <td>
                        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["geo_services"]) ? $context["geo_services"] : null));
        foreach ($context['_seq'] as $context["geo_service_name"] => $context["geo_service_value"]) {
            // line 21
            echo "                        <p>
                            <label>
                                <input type=\"radio\" name=\"geo_service\" value=\"";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["geo_service_name"]) ? $context["geo_service_name"] : null), "html", null, true);
            echo "\"";
            if ($this->getAttribute((isset($context["geo_service_value"]) ? $context["geo_service_value"] : null), "checked")) {
                echo "checked=\"checked\"";
            }
            echo " />
                                ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["geo_service_value"]) ? $context["geo_service_value"] : null), "title"), "html", null, true);
            echo "
                            </label>
                            <span class=\"description\">";
            // line 26
            echo $this->getAttribute((isset($context["geo_service_value"]) ? $context["geo_service_value"] : null), "desc");
            echo "</span>
                            ";
            // line 27
            if (((isset($context["has_geo_data"]) ? $context["has_geo_data"] : null) == (isset($context["geo_service_name"]) ? $context["geo_service_name"] : null))) {
                // line 28
                echo "                                <strong>(Detected)</strong>
                            ";
            }
            // line 30
            echo "                        </p>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['geo_service_name'], $context['geo_service_value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Countries"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <p>";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Only visitors from the following selected countries will have their cookies filtered, unless they have already opted in:"), "html", null, true);
        echo "</p>
                        <ul class=\"multi_checkbox\">
                            ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["countries"]) ? $context["countries"] : null));
        foreach ($context['_seq'] as $context["country_key"] => $context["country_val"]) {
            // line 43
            echo "                            <li>
                                <label>
                                    <input type=\"checkbox\" name=\"countries[]\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, (isset($context["country_key"]) ? $context["country_key"] : null), "html", null, true);
            echo "\" ";
            if ($this->getAttribute((isset($context["country_val"]) ? $context["country_val"] : null), "selected")) {
                echo "checked=\"checked\"";
            }
            echo " />
                                    ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country_val"]) ? $context["country_val"] : null), "country"), "html", null, true);
            echo "
                                </label>
                            </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['country_key'], $context['country_val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 50
        echo "                        </ul>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Undetermined Countries"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"show_on_unknown_location\" ";
        // line 60
        if ((isset($context["show_on_unknown_location"]) ? $context["show_on_unknown_location"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Show the alert if the visitor's country could not be determined"), "html", null, true);
        echo "
                            <span class=\"description\">(";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Recommended"), "html", null, true);
        echo ")</span>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class=\"maxmind_settings\">
            <h3>";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("MaxMind Settings"), "html", null, true);
        echo "</h3>
            <table class=\"form-table\">
                <tbody>
                    <tr>
                        <th scope=\"row\">
                            ";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("IPv4 Country Database"), "html", null, true);
        echo "
                        </th>
                        <td>
                            <label>
                                ";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("File Location:"), "html", null, true);
        echo "
                                <input type=\"text\" name=\"maxmind_db\" id=\"maxmind_db\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, (isset($context["maxmind_db"]) ? $context["maxmind_db"] : null), "html", null, true);
        echo "\" />
                            </label>
                            <br />
                            <label>
                                ";
        // line 84
        if ((isset($context["maxmind_db"]) ? $context["maxmind_db"] : null)) {
            // line 85
            echo "                                    ";
            echo $this->env->getExtension('translate')->transFilter("or <em>replace</em> the existing database:");
            echo "
                                ";
        } else {
            // line 87
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("or upload a new database:"), "html", null, true);
            echo "
                                ";
        }
        // line 89
        echo "                                <input type=\"file\" name=\"maxmind_db_file\" id=\"madmind_db_file\" />
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th scope=\"row\">
                            ";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("IPv6 Country Database"), "html", null, true);
        echo "
                        </th>
                        <td>
                            <label>
                                ";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("File Location:"), "html", null, true);
        echo "
                                <input type=\"text\" name=\"maxmind_db_v6\" id=\"maxmind_db_v6\" value=\"";
        // line 101
        echo twig_escape_filter($this->env, (isset($context["maxmind_db_v6"]) ? $context["maxmind_db_v6"] : null), "html", null, true);
        echo "\" />
                            </label>
                            <br />
                            <label>
                                ";
        // line 105
        if ((isset($context["maxmind_db_v6"]) ? $context["maxmind_db_v6"] : null)) {
            // line 106
            echo "                                    ";
            echo $this->env->getExtension('translate')->transFilter("or <em>replace</em> the existing database:");
            echo "
                                ";
        } else {
            // line 108
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("or upload a new database:"), "html", null, true);
            echo "
                                ";
        }
        // line 110
        echo "                                <input type=\"file\" name=\"maxmind_db_v6_file\" id=\"madmind_db_v6_file\" />
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Alert Settings"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Display Alert"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"radio\" name=\"alert_show\" value=\"auto\" ";
        // line 127
        if (((isset($context["alert_show"]) ? $context["alert_show"] : null) == "auto")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Automatic"), "html", null, true);
        echo "
                        </label>
                        <label>
                            <input type=\"radio\" name=\"alert_show\" value=\"manual\" ";
        // line 131
        if (((isset($context["alert_show"]) ? $context["alert_show"] : null) == "manual")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Manually"), "html", null, true);
        echo "
                        </label>
                        <span class=\"description\">(";
        // line 134
        echo $this->env->getExtension('translate')->transFilter("See <strong>Help</strong> how to display the alert.");
        echo ")</span>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Implied Consent"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"implied_consent\" ";
        // line 144
        if ((isset($context["implied_consent"]) ? $context["implied_consent"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("If the visitor ignores the displayed alert, imply the visitor has opted in"), "html", null, true);
        echo "
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Alert Content"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"radio\" name=\"alert_content_type\" value=\"default\" ";
        // line 156
        if (((isset($context["alert_content_type"]) ? $context["alert_content_type"] : null) == "default")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Default"), "html", null, true);
        echo "
                        </label>
                        <label>
                            <input type=\"radio\" name=\"alert_content_type\" value=\"custom\" ";
        // line 160
        if (((isset($context["alert_content_type"]) ? $context["alert_content_type"] : null) == "custom")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Custom"), "html", null, true);
        echo "
                        </label>

                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 169
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Alert Styling"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"radio\" name=\"alert_style\" value=\"default\" ";
        // line 173
        if (((isset($context["alert_style"]) ? $context["alert_style"] : null) == "default")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Default"), "html", null, true);
        echo "
                        </label>
                        <label>
                            <input type=\"radio\" name=\"alert_style\" value=\"custom\" ";
        // line 177
        if (((isset($context["alert_style"]) ? $context["alert_style"] : null) == "custom")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Custom"), "html", null, true);
        echo "
                        </label>
                    </td>
                </tr>

                <tr class=\"alert_custom_style_extra\">
                    <th scope=\"row\">
                        ";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Custom Alert Style"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <p>";
        // line 188
        echo $this->env->getExtension('translate')->transFilter("Use <abbr title=\"Cascading Style Sheet\">CSS</abbr> to style your alert:");
        echo "</p>
                        <label>
                            <textarea class=\"code\" name=\"alert_custom_style\" id=\"alert_custom_style\">";
        // line 190
        echo twig_escape_filter($this->env, (isset($context["alert_custom_style"]) ? $context["alert_custom_style"] : null), "html", null, true);
        echo "</textarea>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Content"), "html", null, true);
        echo "</h3>
        <table class=\"form-table alert_normal\">
            <tbody>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 202
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Alert Heading"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"text\" name=\"alert_heading\" id=\"alert_heading\" value=\"";
        // line 206
        echo twig_escape_filter($this->env, (isset($context["alert_heading"]) ? $context["alert_heading"] : null), "html", null, true);
        echo "\" />
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Alert Text"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <textarea name=\"alert_content\" id=\"alert_content\">";
        // line 217
        echo twig_escape_filter($this->env, (isset($context["alert_content"]) ? $context["alert_content"] : null), "html", null, true);
        echo "</textarea>
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 224
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Opt-In Button"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"text\" name=\"alert_ok\" id=\"alert_ok\" value=\"";
        // line 228
        echo twig_escape_filter($this->env, (isset($context["alert_ok"]) ? $context["alert_ok"] : null), "html", null, true);
        echo "\" />
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Opt-Out Button"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"text\" name=\"alert_no\" id=\"alert_no\" value=\"";
        // line 239
        echo twig_escape_filter($this->env, (isset($context["alert_no"]) ? $context["alert_no"] : null), "html", null, true);
        echo "\" />
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class=\"form-table alert_custom\">
            <tbody>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 250
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Custom Alert Code"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <p>";
        // line 253
        echo $this->env->getExtension('translate')->transFilter("Use <abbr title=\"Hypertext Markup Language\">HTML</abbr> to create your own custom alert:");
        echo "</p>
                        <label>
                            <textarea class=\"code\" name=\"alert_custom_content\" id=\"alert_custom_content\">";
        // line 255
        echo twig_escape_filter($this->env, (isset($context["alert_custom_content"]) ? $context["alert_custom_content"] : null), "html", null, true);
        echo "</textarea>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class=\"form-table\">
            <tbody>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 266
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("\"Required\" Cookie Text"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"text\" name=\"required_text\" id=\"required_text\" value=\"";
        // line 270
        echo twig_escape_filter($this->env, (isset($context["required_text"]) ? $context["required_text"] : null), "html", null, true);
        echo "\" />
                        </label>
                        <span class=\"description\">";
        // line 272
        echo $this->env->getExtension('translate')->transFilter("This text is used to indicate required cookies when using the <code>[cookillian cookies]</code> shortcode");
        echo "</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>";
        // line 278
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("JavaScript"), "html", null, true);
        echo "</h3>
        <table class=\"form-table script_header_footer\">
            <tbody>
                <tr>
                    <th></th>
                    <td>
                        <p>";
        // line 284
        echo $this->env->getExtension('translate')->transFilter("The following JavaScript will <em>only</em> be loaded in the page header and/or footer when cookies are permitted. This could be used for scripts that set 3rd party cookies, such as Google Analytics. See <strong>Help</strong> for complex JavaScript use.");
        echo "</p>
                    </td>
                </tr>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 289
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Header"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <textarea class=\"code\" name=\"script_header\" id=\"script_header\">";
        // line 293
        echo twig_escape_filter($this->env, (isset($context["script_header"]) ? $context["script_header"] : null), "html", null, true);
        echo "</textarea>
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 300
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Footer"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <textarea class=\"code\" name=\"script_footer\" id=\"script_footer\">";
        // line 304
        echo twig_escape_filter($this->env, (isset($context["script_footer"]) ? $context["script_footer"] : null), "html", null, true);
        echo "</textarea>
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 311
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("JavaScript Tags"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"js_wrap\" ";
        // line 315
        if ((isset($context["js_wrap"]) ? $context["js_wrap"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 316
        echo $this->env->getExtension('translate')->transFilter("Automatically wrap header and footer in <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags");
        echo "
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>";
        // line 323
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Advanced Options"), "html", null, true);
        echo "</h3>
        <table id=\"advanced_options\" class=\"form-table\">
            <tbody>
                <tr>
                    <th scope=\"row\">
                        ";
        // line 328
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Auto-add Cookies"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"auto_add_cookies\" ";
        // line 332
        if ((isset($context["auto_add_cookies"]) ? $context["auto_add_cookies"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 333
        echo $this->env->getExtension('translate')->transFilter("Automatically add new/unknown cookies to the <em>Cookies</em> list.");
        echo "
                        </label>

                        <label>
                            (";
        // line 337
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Detect at most"), "html", null, true);
        echo "
                            <input type=\"number\" min=\"0\" id=\"max_new_cookies\" name=\"max_new_cookies\" value=\"";
        // line 338
        echo twig_escape_filter($this->env, (isset($context["max_new_cookies"]) ? $context["max_new_cookies"] : null), "html", null, true);
        echo "\">
                            ";
        // line 339
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("new cookies"), "html", null, true);
        echo ")
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 346
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Root Cookies"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"delete_root_cookies\" ";
        // line 350
        if ((isset($context["delete_root_cookies"]) ? $context["delete_root_cookies"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 351
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Delete root cookies in addition to local cookies"), "html", null, true);
        echo "
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 358
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Delete cookies"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"radio\" name=\"delete_cookies\" value=\"before_optout\" ";
        // line 362
        if (((isset($context["delete_cookies"]) ? $context["delete_cookies"] : null) == "before_optout")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 363
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Before, or "), "html", null, true);
        echo "
                        </label>
                        <label>
                            <input type=\"radio\" name=\"delete_cookies\" value=\"after_optout\" ";
        // line 366
        if (((isset($context["delete_cookies"]) ? $context["delete_cookies"] : null) == "after_optout")) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 367
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("After"), "html", null, true);
        echo "
                        </label>
                        ";
        // line 369
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter(" opt out"), "html", null, true);
        echo "
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 375
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Scrub Cookies"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"scrub_cookies\" ";
        // line 379
        if ((isset($context["scrub_cookies"]) ? $context["scrub_cookies"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 380
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Periodically attempt to clean cookies set by JavaScript and other sources"), "html", null, true);
        echo "
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 387
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("PHP Sessions"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"php_sessions_required\" ";
        // line 391
        if ((isset($context["php_sessions_required"]) ? $context["php_sessions_required"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 392
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Do not destroy cookie-based PHP sessions"), "html", null, true);
        echo "
                            <span class=\"description\">(";
        // line 393
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Required by some plugins, such as WP e-Commerce"), "html", null, true);
        echo ")</span>
                        </label>
                    </td>
                </tr>

                ";
        // line 398
        if ((!(isset($context["has_caching"]) ? $context["has_caching"] : null))) {
            // line 399
            echo "                <tr>
                    <th scope=\"row\">
                        ";
            // line 401
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Non-JavaScript Support"), "html", null, true);
            echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"noscript_tag\" id=\"noscript_tag\" ";
            // line 405
            if ((isset($context["noscript_tag"]) ? $context["noscript_tag"] : null)) {
                echo "checked=\"checked\"";
            }
            echo " />
                            ";
            // line 406
            echo $this->env->getExtension('translate')->transFilter("Provide a dynamic <code>&lt;noscript&gt;</code> section containing the alert for non-JavaScript browsers");
            echo "
                        </label>
                        <span class=\"description\">(";
            // line 408
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Recommended, except when using caching plugins"), "html", null, true);
            echo ")</span>
                    </td>
                </tr>
                ";
        }
        // line 412
        echo "
                <tr>
                    <th scope=\"row\">
                        ";
        // line 415
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Geolocation Cache"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            ";
        // line 419
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Keep geolocation lookups in cache for up to"), "html", null, true);
        echo "
                            <input type=\"number\" step=\"60\" id=\"geo_cache_time\" name=\"geo_cache_time\" value=\"";
        // line 420
        echo twig_escape_filter($this->env, (isset($context["geo_cache_time"]) ? $context["geo_cache_time"] : null), "html", null, true);
        echo "\"/>
                            ";
        // line 421
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("minutes."), "html", null, true);
        echo "
                        </label>
                        <input type=\"submit\" class=\"button button-action\" name=\"clear-geo-cache\" id=\"clear_geo_cache\" value=\"";
        // line 423
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clear cache now"), "html", null, true);
        echo "\" />
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 429
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Geolocation Backup Service"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"geo_backup_service\" ";
        // line 433
        if ((isset($context["geo_backup_service"]) ? $context["geo_backup_service"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 434
        echo $this->env->getExtension('translate')->transFilter("Use a backup geoloaction service, provided by <a href=\"http://freegeoip.net/\" target=\"_blank\">freegeoip.net</a>, if the default geolocation service has failed.");
        echo "
                        </label>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 441
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Asynchronous AJAX"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"async_ajax\" ";
        // line 445
        if ((isset($context["async_ajax"]) ? $context["async_ajax"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 446
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Initialize using asynchronous AJAX"), "html", null, true);
        echo "
                        </label>
                        <span class=\"description\">(";
        // line 448
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Increases speed, but requires JavaScript variables to be accessed via events"), "html", null, true);
        echo ")</span>
                    </td>
                </tr>

                <tr>
                    <th scope=\"row\">
                        ";
        // line 454
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Debug Mode"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" name=\"debug_mode\" ";
        // line 458
        if ((isset($context["debug_mode"]) ? $context["debug_mode"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            ";
        // line 459
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enable debug mode"), "html", null, true);
        echo "
                        </label>
                        <span class=\"description\">(";
        // line 461
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("An alert will always be shown to any logged-in user, and debug details can be seen using the JavaScript console"), "html", null, true);
        echo ")</span>
                    </td>
                </tr>
            </tbody>
        </table>

        ";
        // line 467
        echo (isset($context["submit_button"]) ? $context["submit_button"] : null);
        echo "

    </form>

    <div id=\"my_footer\">
        <img src=\"";
        // line 472
        echo twig_escape_filter($this->env, (isset($context["plugin_base_url"]) ? $context["plugin_base_url"] : null), "html", null, true);
        echo "resources/images/myatus_logo_white.png\" alt=\"Myatu's\"/><br>
        <span>
            <a href=\"";
        // line 474
        echo twig_escape_filter($this->env, (isset($context["plugin_home"]) ? $context["plugin_home"] : null), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, (isset($context["plugin_name"]) ? $context["plugin_name"] : null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["plugin_version"]) ? $context["plugin_version"] : null), "html", null, true);
        echo "</a> |
            <a href=\"#\" id=\"footer_debug_link\">";
        // line 475
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Debug"), "html", null, true);
        echo "</a> |
            <a href=\"http://wordpress.org/extend/plugins/cookillian/\" target=\"_blank\">";
        // line 476
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Rate It"), "html", null, true);
        echo "</a> |
            <a href=\"http://wordpress.org/support/plugin/cookillian\" target=\"_blank\">";
        // line 477
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Forum"), "html", null, true);
        echo "</a> |
            <a href=\"http://pledgie.com/campaigns/16906\" target=\"_blank\">";
        // line 478
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Donate"), "html", null, true);
        echo "</a>
        </span>
    </div>

    <div id=\"footer_debug\" style=\"display:none;\">
        <table class=\"form-table\">
            <tbody>
                ";
        // line 485
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
        foreach ($context['_seq'] as $context["debug_name"] => $context["debug_value"]) {
            // line 486
            echo "                <tr>
                    <th scope=\"row\" style=\"font-weight: bold;\">";
            // line 487
            echo twig_escape_filter($this->env, (isset($context["debug_name"]) ? $context["debug_name"] : null), "html", null, true);
            echo ":</th>
                    <td>";
            // line 488
            echo twig_escape_filter($this->env, (isset($context["debug_value"]) ? $context["debug_value"] : null), "html", null, true);
            echo "</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['debug_name'], $context['debug_value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 491
        echo "            </tbody>
        </table>
    </div>
</div> ";
    }

    public function getTemplateName()
    {
        return "settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  974 => 491,  965 => 488,  961 => 487,  958 => 486,  954 => 485,  944 => 478,  940 => 477,  936 => 476,  932 => 475,  924 => 474,  919 => 472,  911 => 467,  902 => 461,  897 => 459,  891 => 458,  884 => 454,  875 => 448,  870 => 446,  864 => 445,  857 => 441,  847 => 434,  841 => 433,  834 => 429,  825 => 423,  820 => 421,  816 => 420,  812 => 419,  805 => 415,  800 => 412,  793 => 408,  788 => 406,  782 => 405,  775 => 401,  771 => 399,  769 => 398,  761 => 393,  757 => 392,  751 => 391,  744 => 387,  734 => 380,  728 => 379,  721 => 375,  712 => 369,  707 => 367,  701 => 366,  695 => 363,  689 => 362,  682 => 358,  672 => 351,  666 => 350,  659 => 346,  649 => 339,  645 => 338,  641 => 337,  634 => 333,  628 => 332,  621 => 328,  613 => 323,  603 => 316,  597 => 315,  590 => 311,  580 => 304,  573 => 300,  563 => 293,  556 => 289,  548 => 284,  539 => 278,  530 => 272,  525 => 270,  518 => 266,  504 => 255,  499 => 253,  493 => 250,  479 => 239,  472 => 235,  462 => 228,  455 => 224,  445 => 217,  438 => 213,  428 => 206,  421 => 202,  413 => 197,  403 => 190,  398 => 188,  392 => 185,  382 => 178,  376 => 177,  370 => 174,  364 => 173,  357 => 169,  346 => 161,  340 => 160,  334 => 157,  328 => 156,  321 => 152,  311 => 145,  305 => 144,  298 => 140,  289 => 134,  284 => 132,  278 => 131,  272 => 128,  266 => 127,  259 => 123,  251 => 118,  241 => 110,  235 => 108,  229 => 106,  227 => 105,  220 => 101,  216 => 100,  209 => 96,  200 => 89,  194 => 87,  188 => 85,  186 => 84,  179 => 80,  175 => 79,  168 => 75,  160 => 70,  149 => 62,  145 => 61,  139 => 60,  132 => 56,  124 => 50,  114 => 46,  106 => 45,  102 => 43,  98 => 42,  93 => 40,  87 => 37,  80 => 32,  73 => 30,  69 => 28,  67 => 27,  63 => 26,  58 => 24,  50 => 23,  46 => 21,  42 => 20,  36 => 17,  28 => 12,  23 => 10,  20 => 9,  17 => 7,);
    }
}
