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
    
    protected $_controller = 'index';
    
    protected $_action = 'index';


	/**
	 * Create A Request Object
	 */
	public static function factory($uri='')
	{
		$request = new Request($uri);

		return $request;
	}

	/**
	 * contruction
	 */
	public function __construct($uri='')
	{
        $this->parseUri($uri);
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
	 * parseUri
	 */
	public function parseUri($uri='')
	{
        $parts = array();

        if (empty($uri)) {
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        }

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $parts = explode(".", $_GET['action']);
        } else if (!empty($uri)) {print_r($parts);
            preg_match('/\/(\w+)(?:\/(\w+))?/i', $uri, $matches);
            if (isset($matches[1])) {
                $parts[] = $matches[1];
            }
            if (isset($matches[2])) {
                $parts[] = $matches[2];
            }
        }

        if ($parts[0]) {
            $this->_controller = $parts[0];
        }

        if ($parts[1]) {
            $this->_action = $parts[1];
        }

		return $this;
	}

    /**
	 * getController
	 */
	public function getController()
	{
		return $this->_controller;
	}

    /**
	 * getAction
	 */
	public function getAction()
	{
		return $this->_action;
	}

    /**
	 * Execute
	 */
	public function execute()
	{
        try {
            return $this;
            
        } catch (Exception $e) {

        }

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
