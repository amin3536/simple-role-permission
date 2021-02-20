<?php

namespace Amin3536\SimpleRolePermission\roleModule;

use BenSampo\Enum\FlaggedEnum;

/**
 * @method static static Reed()
 * @method static static Editor()
 * @method static static Creator()
 * @method static static All()
 */
final class Permissions extends FlaggedEnum
{
    const Read = 1 << 0;
    const Write = 1 << 1;
    const Edit = 1 << 2;
    const Delete = 1 << 3;
    const Reader = self::Read;
    const Creator = self::Reader | self::Write;
    const Editor = self::Creator | self::Edit;
    const All = self::Creator | self::Delete;

}
