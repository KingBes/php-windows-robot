#include <windows.h>

#ifndef KEYBOARD_H
#define KEYBOARD_H

#ifdef _WIN32
#define KEYBOARD_API __declspec(dllexport)
#else
#define KEYBOARD_API
#endif

extern "C"
{
    // 是否点击某按键
    KEYBOARD_API bool isKeyPressed(int key);
    // 默认点击了某按键
    KEYBOARD_API void simulateKeyPress(int keyCode);
}
#endif

// 是否点击某按键
bool isKeyPressed(int key)
{
    return GetAsyncKeyState(key) & 0x8000;
}

// 默认点击了某按键
void simulateKeyPress(int keyCode)
{
    WORD wKeyCode = static_cast<WORD>(keyCode);
    INPUT input;
    input.type = INPUT_KEYBOARD;
    input.ki.wScan = 0;
    input.ki.time = 0;
    input.ki.dwExtraInfo = 0;

    input.ki.wVk = wKeyCode;
    input.ki.dwFlags = 0;
    SendInput(1, &input, sizeof(INPUT));

    input.ki.dwFlags = KEYEVENTF_KEYUP;
    SendInput(1, &input, sizeof(INPUT));
}