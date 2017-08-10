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
    private $OptimizerChainFactory;

    /**
     * Optimizer constructor.
     */
    public function __construct()
    {
        $this->OptimizerChainFactory = BaseOptimizerChainFactory::create();
    }

    /**
     * @param string $pathToImage
     * @param string|null $pathToOutput
     */
    public function optimize(string $pathToImage, string $pathToOutput = null)
    {
        $this->OptimizerChainFactory->optimize($pathToImage, $pathToOutput);
    }

    /**
     * @param int $timeoutInSeconds
     */
    public function setTimeout(int $timeoutInSeconds)
    {
        $this->OptimizerChainFactory->setTimeout($timeoutInSeconds);
    }
}