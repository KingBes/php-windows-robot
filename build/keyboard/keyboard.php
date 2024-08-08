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

    public function pressKey(int $key): self
    {
        $this->ffi->pressKey($key);
        return $this;
    }

    public function releaseKey(int $key): self
    {
        $this->ffi->releaseKey($key);
        return $this;
    }
}

$Keyboard = new Keyboard;

sleep(3);
$Keyboard->pressKey(65);
sleep(3);
$Keyboard->releaseKey(65);
/* while (true) {
    if ($Keyboard->isKeyPressed(65)) {
        echo "'A'";
    }
    usleep(100);
} */

/* sleep(5);

$Keyboard->onClickKey(65); */
