<?php

namespace App\Exceptions;

use Exception;
/**
 * Parses and verifies the doc comments for files.
 *
 * PHP version 7.4
 *
 * @category  PHP
 * @package   None
 * @author    Miles Selim <milesbalata@gmail.com>
 * @copyright 2021-2021 Laravel Mock
 * @license   BSD Licence
 * @link      None
 */
class NotAuthorizedException extends Exception
{
    protected $route;
    /**
     * For not authorized exception redirect to route.
     *
     * @param null|string $route component
     *
     * @return route
     */
    public function redirectTo($route) 
    {
        $this->route = $route;
        
        return $this;
    }
    /**
     * For not authorized exception redirect to route.
     * 
     * @return route
     */
    public function route() 
    {
        return $this->route;
    }
}