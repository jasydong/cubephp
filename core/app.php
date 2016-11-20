<?php

namespace CubePHP;

/**
 * App Class
 *
 * @package    CubePHP
 * @author     JasyDong
 * @copyright  (c) 2016 CubePHP
 */
class App {

	// Version
	public $version  = '1.0.0';

	/**
	 * @var $env Current Environment
	 */
	public $env = 'develop';

	/**
	 * @var $base_url BaseUrl
	 */
	public $baseUrl = '/';

	/**
	 * Initialize
	 */
	public function init($settings=array())
	{
		return $this;
	}

	/**
	 * Run
	 */
	public function run()
	{
		return $this;
	}

	/**
	 * getVer
	 */
	public function getVersion()
	{
		return $this->version;
	}
}
