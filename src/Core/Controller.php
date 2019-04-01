<?php
namespace CubePHP\Core;

/**
 * Controller Class
 *
 * @package    Core
 * @author     JasyDong
 * @copyright  (c) 2019 CubePHP
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
            $className = "CubePHP\\Controller\\".ucwords($name);
            $object = new $className;

            return $object;
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
            require ROOT_PATH.'/'.$this->viewPath.'/'.$name.'.php';
        }

        return $this;
    }
}
