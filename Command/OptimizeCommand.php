<?php

namespace sk\ImageOptimizerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class OptimizeCommand
 * @package sk\ImageOptimizerBundle\Command
 */
class OptimizeCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('sk:image-optimizer:optimize')
            ->setDescription('Optimize an image file')
            ->setHelp('Optimize an image to make the file smaller')
            ->addArgument('input', InputArgument::REQUIRED, 'The input file path')
            ->addArgument('output', InputArgument::OPTIONAL, 'The output file path (optionnal)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $iputFile = $input->getArgument('input');
        $outputFile = $input->getArgument('output');

        $this->getContainer()->get("sk_image_optimizer.basic")->optimize($iputFile, $outputFile);
    }
}