<?php

/**
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Xavier Hermans <xav.hermans@gmail.com>
 * @package Twig
 * @subpackage Twig-extensions
 */
class Twig_Extensions_Extension_Match extends Twig_Extension
{

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName()
    {
        return 'twig_match';
    }

    /**
     * Match function for twig extension
     * @param  string $value
     * @param  string $rule
     *
     * @return boolean
     */
    public function match($value, $rule) {
        $rule = '/' . $rule . '/';
        return preg_match($rule, $value);
        // return twig_match_filter($value, $rule);
    }

    public function getFilters()
    {
        return array_merge(parent::getFilters(), array(
            'match' => new Twig_Filter_Method($this, 'match')
        ));
    }

}