<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Adds context (magento instance) to the list of available contexts.
 */
namespace Magento\Console\Command\Context;

use Magento\Console\Command\Context;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Add extends Context
{
    protected function configure()
    {
        $this->addArgument('name', \Symfony\Component\Console\Input\InputArgument::REQUIRED);
        $this->addArgument('url', \Symfony\Component\Console\Input\InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $contexts = $this->contextList->read();

        $contexts[$input->getArgument('name')] = ['url' => $input->getArgument('url')];
        $this->contextList->write($contexts);
    }
}