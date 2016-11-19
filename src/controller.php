<?php

namespace CubePHP;


/**
 * Controller Base Class
 *
 * @package    CubePHP
 * @author     JasyDong
 * @copyright  (c) 2016 CubePHP
 */
class Controller {

	/**
	 * Factory
	 */
	public static function factory($name='')
	{

        if (!empty($name)) {
            $className = "Controller\\".ucwords($name);
            $class = new $className;

            return $class;
        }

		return null;
	}

}
