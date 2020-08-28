<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('load_js')) {
    function load_js($assets = [], $name)
    {
        $CI = &get_instance();

        $asset = [];

        foreach ($assets as $key => $value) 
            $asset[$key] = sprintf("<script src="%s"></script>\n",base_url("dist/" . $value . ".js"));
        
        $CI->session->set_flashdata($name, $asset);
    }
}

if (!function_exists('print_assets')) {
    function print_assets($assets = [])
    {
        if (!empty($assets)) {
            foreach ($assets as $asset) {
                echo $asset;
            }
        }
    }
}
