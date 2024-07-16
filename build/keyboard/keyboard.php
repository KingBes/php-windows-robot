<?php

class Keyboard
{
    public FFI $ffi;

    public function __construct()
    {
        if (PHP_OS_FAMILY != "Windows") {
            throw new \Exception("The OS must be windows!");
        }
        $header = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "keyboard_php.h");
        $this->ffi = FFI::cdef($header, __DIR__ . DIRECTORY_SEPARATOR . "keyboard.dll");
    }

    public function isKeyPressed(int $key): bool
    {
        return $this->ffi->isKeyPressed($key);
    }

    public function onClickKey(int $key): void
    {
        $this->ffi->simulateKeyPress($key);
    }
}

$Keyboard = new Keyboard;

/* while (true) {
    if ($Keyboard->isKeyPressed(65)) {
        echo "'A'";
    }
    usleep(100);
} */

sleep(5);

$Keyboard->onClickKey(65);