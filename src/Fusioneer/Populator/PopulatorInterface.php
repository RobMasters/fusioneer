<?php

namespace Fusioneer\Populator;

interface PopulatorInterface
{
    /**
     * @abstract
     * @return mixed
     */
    public function load();
}