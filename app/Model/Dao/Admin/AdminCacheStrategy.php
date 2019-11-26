<?php


namespace App\Model\Dao\Admin;


interface AdminCacheStrategy
{
    /**
     * @param string $key
     * @param array $adminData
     */
    function save(string $key,array  $adminData);


    /**
     * @param string $key
     * @return array
     */
    function get(string $key):array ;
}
