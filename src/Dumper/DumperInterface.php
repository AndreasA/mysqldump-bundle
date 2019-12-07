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

namespace Vyfony\Bundle\MysqldumpBundle\Dumper;

use Vyfony\Bundle\MysqldumpBundle\DumpResult\DumpResultInterface;

/**
 * @author Anton Dyshkant <vyshkant@gmail.com>
 */
interface DumperInterface
{
    public function dumpAndWriteToFile(string $pathToDumpFile): DumpResultInterface;

    public function dump(): DumpResultInterface;
}
