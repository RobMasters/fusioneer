<?php

namespace Fusioneer\Populator;

class RandomLetterPopulator implements PopulatorInterface
{
    /**
     * @var array
     */
    protected $range;

    /**
     *
     */
    public function __construct(array $letters)
    {
        $this->range = $letters;
    }

    /**
     * @throws \RuntimeException
     * @return mixed
     */
    public function load()
    {
        $key = array_rand($this->range);

        return $this->range[$key];
    }
}