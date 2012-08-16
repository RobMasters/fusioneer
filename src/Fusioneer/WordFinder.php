<?php

namespace Fusioneer;

use Fusioneer\Grid\GridInterface;

class WordFinder
{
    /**
     * @var Grid\GridInterface
     */
    protected $grid;

    /**
     * @var array
     */
    protected $words = array();


    /**
     * @param Grid\GridInterface $grid
     */
    public function __construct(GridInterface $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @param string $dictionaryFilePath
     * @throws \InvalidArgumentException
     */
    public function loadDictionary($dictionaryFilePath)
    {
        if (!file_exists($dictionaryFilePath)) {
            throw new \InvalidArgumentException("Dictionary file does not exist: `$dictionaryFilePath`");
        }

        $handle = fopen($dictionaryFilePath, "r");
        while (!feof($handle)) {
           $this->words[] = fgets($handle);
        }
        fclose($handle);
    }

    /**
     * @return array
     */
    public function getResults()
    {
        $horizontalMatches = $verticalMatches = array();

        foreach ($this->words as $word) {
            if ($this->grid->contains($word, GridInterface::DIRECTION_HORIZONTAL)) {
                $horizontalMatches[] = $word;
            }
            if ($this->grid->contains($word, GridInterface::DIRECTION_VERTICAL)) {
                $verticalMatches[] = $word;
            }
        }

        return array(
            'Horizontal' => $horizontalMatches,
            'Vertical' => $verticalMatches
        );
    }
}
 
