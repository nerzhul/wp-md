<?php
    /*
    Plugin Name: Wordpress Markdown
    Plugin URI: https://github.com/nerzhul/wp-md
    Description: a plugin to use markdown in articles
    Version: 0.1
    Author: Loic Blot
    Author URI: https://www.unix-experience.fr
    License: GPL3
    */

    require_once __DIR__ . '/vendor/autoload.php';

    function WordpressMarkdownShortCode($params = array()) {
        extract(shortcode_atts(array(
            'file' => null,
        ), $params));

        if ($md_file === null) {
            return "Unknown markdown file";
        }

        $Parsedown = new Parsedown();

        return $Parsedown->text('Hello _Parsedown_!');
    }

    add_shortcode('wp-md', 'WordpressMarkdownShortCode');
?>
