<?php

Namespace app;

/**
* ObjectParser
*/
class ObjectParser
{
	protected $objects = [];

	function __construct(array $objects)
	{
		$this->objects = $objects;
	}

	public function getPoints()
	{
		$result = [];
		$count = 0;

		$main = $this->getMainVector();
		foreach ($this->objects as $object => $tags) {
			$vector = $this->getVector($main, $tags);

			$result[$count] = $this->getRnPoint($object, $vector);;
			
			$count++;
		}

		return $result;
	}

	protected function getMainVector()
	{
		$result = [];

		foreach ($this->objects as $object => $tags) {
			foreach ($tags as $t) {
				$result[$t] = 1;
			}
		}

		return $result;
	}

	public function getVector($main, $tags)
	{
		$result = [];

		$count = 0;
		foreach ($main as $key => $value) {
			$result[$count] = array_search($key, $tags) !== false ? 1 : 0;
			$count++;
		}
		return $result;
	}

	protected function getRnPoint($label, $vector)
	{
		$point = new RnPoint(array_merge($vector, []));
		$point->setLabel($label);
		return $point;
	}
}