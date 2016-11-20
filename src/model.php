<?php

namespace CubePHP;


/**
 * Model Base Class
 *
 * @package    CubePHP
 * @author     JasyDong
 * @copyright  (c) 2016 CubePHP
 */
class Model {

	/**
	 * Factory
	 */
	public static function factory($name='')
	{

        if (!empty($name)) {
            $className = "Model\\".ucwords($name);
            $class = new $className;

            return $class;
        }

		return null;
	}

}
