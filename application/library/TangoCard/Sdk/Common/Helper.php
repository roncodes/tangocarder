<?php
/**
 * Common extension file Helper.php
 * 
 */
 
/**
 * 
 * Copyright (c) 2012 Tango Card, Inc
 * All rights reserved.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions: 
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software. 
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * PHP Version 5.3
 * 
 * @category    TangoCard
 * @package     SDK
 * @version     $Id: Helper.php 2012-10-05 12:00:00 PST $
 * @copyright   Copyright (c) 2012, Tango Card (http://www.tangocard.com)
 * 
 */ 

namespace TangoCard\Sdk\Common;

/**
 * Helper is a sample support extension class
 *
 * @package TangoCard_PHP_SDK
 * @access  public
 */
class Helper
{
    /**
     * Checks if string is either null or empty
     *
     * @param string    $string to be validated
     * 
     * @return boolean   true if string is null or empty
     * 
     * @access public
     */
    public static function isNullOrEmptyString($string)
    { 
        return ( is_null($string) || (is_string($string) === false) || (trim($string) === '') ); 
    } 
}