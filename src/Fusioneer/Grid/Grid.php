<?php

namespace Fusioneer\Grid;

use Fusioneer\Populator\PopulatorInterface;

class Grid implements GridInterface
{
    /**
     * @var
     */
    protected $width;

    /**
     * @var
     */
    protected $height;

    /**
     * @var PopulatorInterface
     */
    protected $populator;

    /**
     * @param $width
     * @throws \InvalidArgumentException
     * @return GridInterface
     */
    public function setWidth($width)
    {
        if (!is_numeric($width)) {
            throw new \InvalidArgumentException("Width must be numeric");
        }

        if ((int) $width <= 0) {
            throw new \InvalidArgumentException("Width must be greater than 0");
        }

        $this->width = $width;

        return $this;
    }

    /**
     * @param $height
     * @throws \InvalidArgumentException
     * @return GridInterface
     */
    public function setHeight($height)
    {
        if (!is_numeric($height)) {
            throw new \InvalidArgumentException("Height must be numeric");
        }

        if ((int) $height <= 0) {
            throw new \InvalidArgumentException("Height must be greater than 0");
        }

        $this->height = $height;

        return $this;
    }

    /**
     * @param \Fusioneer\Populator\PopulatorInterface $populator
     * @return GridInterface
     */
    public function setPopulator(PopulatorInterface $populator)
    {
        $this->populator = $populator;

        return $this;
    }

    protected function populate()
    {

    }
}

 
