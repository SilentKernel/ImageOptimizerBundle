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
     */
    public function optimize(string $pathToImage, string $pathToOutput = null)
    {
        $this->optimizerChain->optimize($pathToImage, $pathToOutput);
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