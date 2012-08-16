<?php

namespace Fusioneer\Grid;

use Fusioneer\Populator\PopulatorInterface;

interface GridInterface
{
    const DIRECTION_VERTICAL = 'v';
    const DIRECTION_HORIZONTAL = 'h';

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
    public function populate(PopulatorInterface $populator);

    /**
     * @abstract
     * @return array
     */
    public function getCells();

    /**
     * @abstract
     * @param $value
     * @param $direction
     * @return boolean
     */
    public function contains($value, $direction);
}