<?php

declare(strict_types=1);

namespace App\Shared\Domain\Helper;

final class CommonHelper
{
    /**
     * @throws \Throwable
     */
    public static function retry(int $attempts, callable $callback, int $sleepSeconds = 0)
    {
        startRetry:

        --$attempts;

        try {
            return $callback($attempts);
        } catch (\Throwable $e) {
            if ($attempts === 0) {
                throw $e;
            }

            if ($sleepSeconds) {
                sleep($sleepSeconds);
            }

            goto startRetry;
        }
    }
}
