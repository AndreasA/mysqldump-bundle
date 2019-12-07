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

namespace Vyfony\Bundle\MysqldumpBundle\DumpResult;

/**
 * @author Anton Dyshkant <vyshkant@gmail.com>
 */
final class DumpResult implements DumpResultInterface
{
    /**
     * @var int
     */
    private $exitCode;

    /**
     * @var string
     */
    private $output;

    /**
     * @var string
     */
    private $errorOutput;

    public function __construct(int $exitCode, string $output, string $errorOutput)
    {
        $this->exitCode = $exitCode;
        $this->output = $output;
        $this->errorOutput = $errorOutput;
    }

    public function getExitCode(): int
    {
        return $this->exitCode;
    }

    public function getOutput(): string
    {
        return $this->output;
    }

    public function getErrorOutput(): string
    {
        return $this->errorOutput;
    }

    public function isSuccessful(): bool
    {
        return 0 === $this->exitCode;
    }
}
