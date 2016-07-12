<?php

namespace Tasker;

use Nette\DI\CompilerExtension;

class TaskerExtension extends CompilerExtension
{

	public $defaults = [
		'group' => 'task'
	];


	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig($this->defaults);

		$builder->addDefinition($this->prefix('runner'))
			->setClass('Tasker\TaskRunner')
			->addSetup('$group', [$config['group']]);
	}

}
