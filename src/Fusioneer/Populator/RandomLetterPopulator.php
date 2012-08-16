<?php

namespace Fusioneer\Populator;

class RandomLetterPopulator implements PopulatorInterface
{
    /**
     * @var array
     */
    protected $range;

    public function construct()
    {
        $this->range = range('a', 'z');
    }

    /**
     * @return mixed
     */
    public function load()
    {
        $key = array_rand($this->range);

        return $this->range[$key];
    }
}