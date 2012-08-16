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
     * @var array
     */
    protected $cells = array();

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
     * @throws \RuntimeException
     * @return GridInterface
     */
    public function populate(PopulatorInterface $populator)
    {
        if (empty($this->width) || empty($this->height)) {
            throw new \RuntimeException("Width and height must be specified before populating the grid");
        }

        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                $value = $populator->load();
                $this->cells[$i][$j] = $value;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getCells()
    {
        return $this->cells;
    }

    /**
     * @param $value
     * @param $direction
     * @throws \InvalidArgumentException
     * @return bool|void
     */
    public function contains($value, $direction)
    {
        $chars = str_split($value);

        switch ($direction) {
            case self::DIRECTION_HORIZONTAL:
                $out = $this->containsHorizontal($chars);
                break;

            case self::DIRECTION_VERTICAL:
                $out = $this->containsVertical($chars);
                break;

            default:
                throw new \InvalidArgumentException("Unknown direction: `$direction`");
        }

        return $out;
    }

    /**
     * @param array $chars
     * @return bool
     */
    private function containsHorizontal(array $chars)
    {
        if (count($chars) <= $this->width) {
            $currentCharIndex = 0;

            for ($i = 0; $i <= $this->height; $i++) {
                for ($j = 0; $j <= $this->width; $j++) {
                    if ($this->cells[$i][$j] === $chars[$currentCharIndex]) {
                        $currentCharIndex++;

                        if ($currentCharIndex === count($chars)) {
                            // Word found!
                            return true;
                        }
                    } else {
                        $currentCharIndex = 0;
                        if (count($chars) > ($this->width + $j)) {
                            // Not enough space in the row. Move to the next
                            break;
                        }
                    }
                }
            }
        }

        return false;
    }

    /**
     * @param array $chars
     * @return bool
     */
    private function containsVertical(array $chars)
    {

        return false;
    }
}

 
