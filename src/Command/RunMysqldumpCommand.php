<?php

declare(strict_types=1);

/*
 * This file is part of VyfonyMysqldumpBundle project.
 *
 * (c) Anton Dyshkant <vyshkant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vyfony\Bundle\MysqldumpBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Vyfony\Bundle\MysqldumpBundle\Dumper\DumperInterface;

/**
 * @author Anton Dyshkant <vyshkant@gmail.com>
 */
final class RunMysqldumpCommand extends Command
{
    /**
     * @var DumperInterface
     */
    private $dumper;

    /**
     * @param DumperInterface $dumper
     */
    public function __construct(DumperInterface $dumper)
    {
        parent::__construct();
        $this->dumper = $dumper;
    }

    protected function configure(): void
    {
        $this
            ->setName('vyfony:mysqldump:dump-to-file')
            ->setDescription('Dump the database using "mysqldump" command')
            ->addArgument('dump-file', InputArgument::REQUIRED, 'Path to a file where you want to save the dump')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $dumpResult = $this->dumper->dumpAndWriteToFile($input->getArgument('dump-file'));

        $style = new SymfonyStyle($input, $output);

        $dumpResult->isSuccessful()
            ? $style->success('"Mysqldump" command has been successfully executed')
            : $style->error(sprintf('Cannot execute "mysqldump" command. Exit code: "%d"', $dumpResult->getExitCode()));

        return $dumpResult->getExitCode();
    }
}
