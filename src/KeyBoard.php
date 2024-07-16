<?php

declare(strict_types=1);

namespace KingBes\PhpRobot;

class Keyboard
{
    protected \FFI $ffi;

    public function __construct()
    {
        if (PHP_OS_FAMILY != "Windows") {
            throw new \Exception("The OS must be windows!");
        }
        $header = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "keyboard_php.h");
        $this->ffi = \FFI::cdef($header, __DIR__ . DIRECTORY_SEPARATOR . "keyboard.dll");
    }

    /**
     * 是否点击键盘某键 function
     *
     * @param integer $key
     * @return boolean
     */
    public function isKeyPressed(int $key): bool
    {
        return $this->ffi->isKeyPressed($key);
    }

    /**
     * 点击键盘某键 function
     *
     * @param integer $key
     * @return void
     */
    public function onClickKey(int $key): void
    {
        $this->ffi->simulateKeyPress($key);
    }
}
