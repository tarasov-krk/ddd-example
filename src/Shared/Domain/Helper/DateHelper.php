<?php

declare(strict_types=1);

namespace App\Shared\Domain\Helper;

final class DateHelper
{
    private const string POLICY_CREATE_TIMEZONE = 'Europe/Samara';

    public static function fetchTimeWithZone(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now', new \DateTimeZone(self::POLICY_CREATE_TIMEZONE));
    }
}
