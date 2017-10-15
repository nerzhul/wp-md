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
            'filename' => null,
        ), $params));

        if ($filename === null) {
            return "Unknown markdown file";
        }

        $upload_dir = wp_upload_dir();
        if (count($upload_dir) == 0) {
            return "No Wordpress upload directory found.";
        }

        $filename = $upload_dir['basedir']."/md-articles/".$filename.".md";
        $file = file_get_contents($filename);
        if (!$file) {
            return "Unable to read file $filename";
        }

        return (new Parsedown())->text($filename);

    }

    add_shortcode('wp-md', 'WordpressMarkdownShortCode');
?>
