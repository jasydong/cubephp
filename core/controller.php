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
	 * @var $viewPath View Path
	 */
	public $viewPath = 'view';

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

    public function setViewPath($path='') {
        if (!empty($path)) {
            $this->viewPath = $path;
        }

        return $this;
    }

    public function loadView($name='') {
        if (!empty($name)) {
            require APPROOT.'/'.$this->viewPath.'/'.$name.'.php';
        }

        return $this;
    }
}
