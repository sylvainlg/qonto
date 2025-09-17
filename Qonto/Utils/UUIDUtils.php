<?php

namespace neyric\Qonto\Utils;

use Symfony\Component\Uid\Uuid;

/**
 * Class UUIDUtils
 * @package neyric\Qonto\Utils
 * @author MeilleursBiens
 */
class UUIDUtils {

    public static function v4(): string
    {
        return Uuid::v4()->toRfc4122();
    }

}