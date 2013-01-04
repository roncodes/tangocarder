<?php
/**
 * SystemErrorResponse.php
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
 * @version     $Id: SystemErrorResponse.php 2012-10-14 00:06:00 PST $
 * @copyright   Copyright (c) 2012, Tango Card (http://www.tangocard.com)
 * 
 */    

namespace TangoCard\Sdk\Response\Failure;

/**
 * This response type indicates that there was an error internal to the 
 * TangoCard service.
 *
 * @package TangoCard_PHP_SDK
 * @access  public
 */
class SystemErrorResponse extends FailureResponse
{
    /**
     * @ignore
     */
    private $_errorCode;
    
    /**
     * Construct a new SystemError failure type.
     * @param object $responseJson The parsed (JSON) object returned from the 
     *       Tango Card services.
     */
    public function __construct($responseJson)
    {
        $this->_errorCode = $responseJson->errorCode;
    }
    
    /**
     * Get the error code returned by Tango Card's services.
     * @return string An error code that can be used when talking to 
     *        Tango Card's technical support team to describe the 
     *        specific problem area.
     */
    public function getErrorCode()
    {
        return $this->_errorCode;
    }

    /**
     * Get error message for this failure response.
     * @return string
     */
    public function getMessage()
    {
        return sprintf("Error Code: %s", $this->_errorCode);
    }
}