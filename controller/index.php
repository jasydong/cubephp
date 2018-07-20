<?php

namespace Controller;

use CubePHP\Controller;

/**
 * Index Controller
 *
 * @package    Controller
 * @author     JasyDong
 * @copyright  (c) 2016 CubePHP
 */
class Index extends Controller {

	/**
	 * Index Action
	 */
	public function index()
	{
        $this->loadView('index/index');
	}

}
