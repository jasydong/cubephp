<?php

namespace CubePHP;

/**
 * Request Class
 *
 * @package    CubePHP
 * @author     JasyDong
 * @copyright  (c) 2016 CubePHP
 */
class Request {

	/**
	 * @var string the body
	 */
	protected $_body;


	/**
	 * Create A Request Object
	 */
	public static function factory($uri)
	{
		$request = new Request($uri);

		return $request;
	}

	/**
	 * contruction
	 */
	public function __construct($uri)
	{
		
	}

	/**
	 * setBody
	 */
	public function setBody($content='')
	{
		$this->_body = $content;

		return $this;
	}
	/**
	 * Render
	 */
	public function render()
	{
		$output = $this->_body;

		return $output;
	}

}
