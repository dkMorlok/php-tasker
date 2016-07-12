<?php

namespace Tasker;

use Nette\DI\Container;

class TaskRunner
{

	/** @var Container */
	private $context;

	/** @var string */
	public $group;


	public function __construct(Container $context, $group = 'task')
	{
		$this->context = $context;
		$this->group = $group;
	}


	/**
	 * Get task from context
	 * @param string $name
	 * @return ITask
	 * @throws \Exception when task is not runnable
	 */
	public function task($name)
	{
		$task = $this->context->getService($this->group . '.' . $name);
		if (!$task instanceof ITask) {
			throw new \Exception("Task is not instance of ITask.");
		}
		return $task;
	}


	/**
	 * @param string $name
	 * @param array|null $options
	 * @throws \Exception
	 */
	public function run($name, array $options = null)
	{
		$this->task($name)->run($options);
	}

}