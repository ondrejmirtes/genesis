<?php

namespace MyTest;


use Genesis;
use Genesis\Commands;


/**
 * @author Adam Bisek <adam.bisek@gmail.com>
 *
 * BuildTest
 */
class TestBuild extends Genesis\Build
{

	/**
	 * @var \ArrayObject
	 * @inject myService
	 */
	public $testService;

	/**
	 * @var \StdClass
	 * @inject myService2
	 */
	public $testService2;

	/**
	 * @var \ArrayObject
	 * @inject
	 */
	public $myService; // injected without definition


	/**
	 * My task description
	 * @return void
	 * @section mySection
	 */
	public function runInfo()
	{
		$this->logSection('This is Section with info.');
		$this->log('This is TestBuild.');
	}


	/**
	 * @section mySectionOnly
	 */
	public function runShowArguments()
	{
		$this->log(json_encode($this->getArguments()));
	}


	/**
	 * Description only
	 */
	public function runShowContainerValue($key) // this first parameter will be propagated from CLI
	{
		$this->log(json_encode($this->getContainer()->getParameter($key)));
	}


	public function runShowServiceClass()
	{
		$key = $this->getArguments()[1];
		$this->log(get_class($this->getContainer()->getService($key)));
	}


	public function runShowAutowiredClass()
	{
		$key = $this->getArguments()[1];
		$this->log(get_class($this->$key));
	}


	public function runError()
	{
		$this->error("This is error.");
	}


	public function runThrowUnexpectedException()
	{
		throw new \RuntimeException("UnexpectedException message");
	}

}