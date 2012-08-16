<?php

namespace Fusioneer\Grid;

use Fusioneer\Populator\PopulatorInterface;

interface GridInterface
{
    /**
     * @abstract
     * @param $width
     * @return GridInterface
     */
    public function setWidth($width);

    /**
     * @abstract
     * @param $height
     * @return GridInterface
     */
    public function setHeight($height);

    /**
     * @abstract
     * @param \Fusioneer\Populator\PopulatorInterface $populator
     * @return GridInterface
     */
    public function setPopulator(PopulatorInterface $populator);
}