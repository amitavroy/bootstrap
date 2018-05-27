<?php

if (!function_exists('bs_config')) {
    /**
     * This function primarily uses the Laravel config function.
     * The basic idea is to build a wrapper of that function
     * and get all bootstrap related config easily using
     * this function only.
     *
     * @param $key
     * @return \Illuminate\Config\Repository|mixed
     */
    function bs_config ($key) {
        $key = 'bootstrap.' . $key;
        return config($key);
    }
}
