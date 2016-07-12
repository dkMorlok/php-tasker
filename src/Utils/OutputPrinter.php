<?php

namespace Tasker\Utils;

class OutputPrinter
{

	private $indent = 0;


	public function begin()
	{
		$this->indent++;
	}


	public function end()
	{
		$this->indent--;
		echo '<br/>';
	}


	public function start($title)
	{
		echo "<h1>$title</h1>\n";
		echo '<br/>';
	}


	public function writeln($text)
	{
		$text = preg_replace('/\[([^\]]*)\]/', '<b>$1</b>', $text);
		echo "<span style='padding-left: " . ($this->indent * 40) . "px'>$text</span><br/>\n";
		return $this;
	}

}