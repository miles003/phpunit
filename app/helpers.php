<?php
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
if (! function_exists('inertia')) {
    /**
     * Inertia helper.
     *
     * @param null|string $component component
     * @param array       $props     props
     *
     * @return \Inertia\ResponseFactory|\Inertia\Response
     */
    function inertia($component = null, $props = [])
    {
        $instance = \Inertia\Inertia::getFacadeRoot();

        if ($component) {
            return $instance->render($component, $props);
        }

        return $instance;
    }
}