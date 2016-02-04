<?php
namespace app;

use webd\clustering\RnPoint as OriginalPoint;

class RnPoint extends OriginalPoint
{
    protected $label;

    public function setLabel($label)
    {
    	$this->label = $label;

    	return $this;
    }

    public function getLabel()
    {
    	return $this->label;
    }
}
