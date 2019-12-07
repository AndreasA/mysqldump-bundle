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
interface DumpResultInterface
{
    public function getExitCode(): int;

    public function getOutput(): string;

    public function getErrorOutput(): string;

    public function isSuccessful(): bool;
}
