<?php
/**
 * 
 *
 *
 *
 * @copyright  Copyright (c) 2007-2013 ShopNC Inc. (http://www.cocogd.com.cn)
 * @license    http://www.cocogd.com.cn
 * @link       http://www.cocogd.com.cn
 * @since      File available since Release v1.1
 */

if (!defined('IN_IA')) {
    exit('Access Denied');
}
class YipinyimaMobile extends Plugin
{
    public function __construct()
    {
        parent::__construct('yipinyima');
    }
    public function index()
    {
        $this->_exec_plugin(__FUNCTION__, false);
    }
    public function api()
    {
        $this->_exec_plugin(__FUNCTION__, false);
    }
    public function lise()
    {
        $this->_exec_plugin(__FUNCTION__, false);
    }
    public function esd(){
      $this->_exec_plugin(__FUNCTION__, false);
}
}