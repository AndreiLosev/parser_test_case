<?php

namespace Sotbit\Parsertest\Commands;

use Error;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Sotbit\Parsertest\Helprer\ColorMessTrait;
use Symfony\Component\Console\Helper\ProgressBar;

class HelloWorldCommand extends Command
{
    use ColorMessTrait;

    protected function configure()
    {
        $this->setName('hello-world')
            ->setDescription('Prints Hello-World!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('username', InputArgument::REQUIRED, 'Pass the username.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $max = 500;
        $progressBar = new ProgressBar($output, $max);

        $progressBar->start();

        $i = 0;
        while ($i++ < $max-20) {
            $progressBar->advance();
        }

        $progressBar->finish();

        $mes = $this->questionMess(sprintf('Hello World!, %s', $input->getArgument('username')));
        $output->writeln($mes);
        return 1;
    }
}