<?php
/**
 * InvalidCredentialsResponse.php
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
 * @version     $Id: InvalidCredentialsResponse.php 2012-10-05 12:00:00 PST $
 * @copyright   Copyright (c) 2012, Tango Card (http://www.tangocard.com)
 * 
 */   

namespace TangoCard\Sdk\Response\Failure;

/**
 * This response type indicates that the supplied login credentials were 
 * invalid.
 *
 * @package TangoCard_PHP_SDK
 * @access  public
 */
class InvalidCredentialsResponse extends FailureResponse
{
    /**
     * @ignore
     */
    private $_message;
    
    /**
     * Construct a new InvalidCredentials failure type.
     * @param object $responseJson The parsed (JSON) object returned from the 
     *       Tango Card services.
     */
    public function __construct($responseJson)
    {
        $this->_message = $responseJson->message;
    }
    
    /**
     * Get the detailed error message.
     * @return string A message from the Tango Card services indicating 
     *        what it thinks the problem is.
     */
    public function getMessage()
    {
        if ( 0 == strcmp($this->_message, "TCP:PNPA:1") )
        {
            return "The username not present.";
        }
        else if ( 0 == strcmp($this->_message, "TCP:PNPA:2") )
        {
            return "The password not present.";
        }
        else if ( 0 == strcmp($this->_message, "TCP:PNPA:3") )
        {
            return "The username or password you entered are incorrect.";
        }
        return $this->_message;
    }
}