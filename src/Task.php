<?php

namespace Tasker;

use Tasker\Utils\OutputPrinter;

abstract class Task implements ITask
{

	/** @var OutputPrinter */
	protected $output;


	public function run(array $options = null)
	{
		$this->output = new OutputPrinter();
		$this->execute($options ? $options : []);
		$this->output->end();
	}


	protected function execute(array $options)
	{
		// implement in child
	}

}