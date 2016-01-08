<?php

/**
 * MagentoAuth.php
 *
 * Magento External Auth Functions
 *
 * @category   MagentoAuth
 * @package    MagentoAuth
 * @author     Adrián Barrio Andrés
 * @copyright  2016 Adrián Barrio Andrés
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    1.0
 * @link       https://statickidz.com
 */

if (!class_exists('Mage')) {
    require_once '../app/Mage.php';
    Mage::app();
}

class MagentoAuth
{
    
    /**
     * loginCustomer()
     *
     * Login user in Magento system
     *
     * @param (string) username
     * @param (string) password
     * @return (boolean) if login success or failed
     */
    public static function loginCustomer($username, $password) {
        Mage::getSingleton('core/session', array('name' => 'frontend'));
        $session = Mage::getSingleton('customer/session');
        try {
            $session->login($username, $password);
            $session->setCustomerAsLoggedIn($session->getCustomer());
            return true;
        }
        catch(Mage_Core_Exception $e) {
            return false;
        }
    }
    
    /**
     * logoutCustomer()
     *
     * Logout user out of Magento
     *
     */
    public static function logoutCustomer() {
        Mage::getSingleton('customer/session')->logout()->renewSession();
    }
    
    /**
     * getLoggedCustomer()
     *
     * Retrieves current user logged in
     *
     * @return (Customer Magento Object)
     */
    public static function getLoggedCustomer() {
        Mage::getSingleton('core/session', array('name' => 'frontend'));
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer->getId()) {
            return $customer;
        } 
        else {
            return false;
        }
    }
    
    /**
     * isLoggedIn()
     *
     * Check if user is logged in on Magento
     *
     * @return (boolean)
     */
    public static function isLoggedIn() {
        Mage::getSingleton('core/session', array('name' => 'frontend'));
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer->getId()) {
            return true;
        } 
        else {
            return false;
        }
    }
}
