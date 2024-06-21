<?php

declare(strict_types=1);

namespace KingBes\PhpRobot;

use FFI;

class Robot
{
    public FFI $ffi;

    public function __construct()
    {
        if (PHP_OS_FAMILY != "Windows") {
            throw new \Exception("The OS must be windows!");
        }
        $header = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "robot_php.h");
        $this->ffi = FFI::cdef($header, __DIR__ . DIRECTORY_SEPARATOR . "robot.dll");
    }
}
