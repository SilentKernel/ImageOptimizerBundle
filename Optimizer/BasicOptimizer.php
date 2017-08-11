<?php

namespace sk\ImageOptimizerBundle\Optimizer;

use Spatie\ImageOptimizer\OptimizerChainFactory;
use Spatie\ImageOptimizer\OptimizerChain;

/**
 * Class Optimizer
 * @package sk\ImageOptimizerBundle\Optimizer
 */
class BasicOptimizer
{
    /**
     * @var \Spatie\ImageOptimizer\OptimizerChain
     */
    private $optimizerChain;

    /**
     * Optimizer constructor.
     */
    public function __construct()
    {
        $this->optimizerChain = OptimizerChainFactory::create();
    }

    /**
     * @param string $pathToImage
     * @param string|null $pathToOutput
     * @return boolean
     */
    public function optimize(string $pathToImage, string $pathToOutput = null): bool
    {
        if (file_exists($pathToImage)) {
            $this->optimizerChain->optimize($pathToImage, $pathToOutput);
            return true;
        }
        return false;
    }

    /**
     * @param int $timeoutInSeconds
     * @return \Spatie\ImageOptimizer\OptimizerChain
     */
    public function setTimeout(int $timeoutInSeconds): OptimizerChain
    {
        return $this->optimizerChain->setTimeout($timeoutInSeconds);
    }

    /**
     * @return \Spatie\ImageOptimizer\OptimizerChain
     */
    public function getOptimizerChain(): OptimizerChain
    {
        return $this->optimizerChain;
    }
}