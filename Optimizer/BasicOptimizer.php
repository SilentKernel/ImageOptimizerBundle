<?php

namespace sk\ImageOptimizerBundle\Optimizer;

use Spatie\ImageOptimizer\OptimizerChainFactory as BaseOptimizerChainFactory;

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
        $this->optimizerChain = BaseOptimizerChainFactory::create();
    }

    /**
     * @param string $pathToImage
     * @param string|null $pathToOutput
     * @return boolean
     */
    public function optimize(string $pathToImage, string $pathToOutput = null)
    {
        if (file_exists($pathToImage)){
            $this->optimizerChain->optimize($pathToImage, $pathToOutput);
            return true;
        }
        return false;
    }

    /**
     * @param int $timeoutInSeconds
     * @return \Spatie\ImageOptimizer\OptimizerChain
     */
    public function setTimeout(int $timeoutInSeconds)
    {
        return $this->optimizerChain->setTimeout($timeoutInSeconds);
    }

    /**
     * @return \Spatie\ImageOptimizer\OptimizerChain
     */
    public function getOptimizerChain()
    {
        return $this->optimizerChain;
    }
}