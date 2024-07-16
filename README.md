# php-windows-robot
PHP Windows的桌面自动化

composer
```shell
composer require kingbes/phprobot
```

# 要求

php `>=8.1.0`

拓展 `FFI`

系统 `Windows`

# 文档

## 鼠标

```php
use KingBes\PhpRobot\Mouse;

$Mouse = new Mouse();
```

```php
/**
 * 鼠标指针位置 function
 *
 * @return array
 */
public function mouse_pos(): array
{}

/**
 * 鼠标单击 function
 *
 * @param string $button left right middle
 * @return self
 */
public function mouse_click(string $button): self
{}

/**
 * 鼠标双击 function
 *
 * @param string $button left right middle
 * @return self
 */
public function mouse_double_click(string $button): self
{}

/**
 * 将鼠标(左)拖动到指定位置。 function
 *
 * @param integer $x
 * @param integer $y
 * @return self
 */
public function mouse_left_drag(int $x, int $y): self
{}

/**
 * 相对于当前位置拖动鼠标(左)。 function
 *
 * @param integer $offset_x
 * @param integer $offset_y
 * @return self
 */
public function mouse_drag_rel(int $offset_x, int $offset_y): self
{}

/**
 * 移动鼠标到 x y function
 *
 * @param integer $x
 * @param integer $y
 * @return self
 */
public function mouse_move_mouse(int $x, int $y): self
{}

/**
 * 相对于当前位置移动鼠标。 function
 *
 * @param integer $offset_x
 * @param integer $offset_y
 * @return self
 */
public function move_mouse_rel(int $offset_x, int $offset_y): self
{}
```

## 屏幕

```php
use KingBes\PhpRobot\Screen;

$Screen = new Screen();
```

```php
/**
 * 获取屏幕指定位置的颜色rgb function
 *
 * @param integer $x
 * @param integer $y
 * @return array
 */
public function pixel_color(int $x, int $y): array
{}

/**
 * 获取屏幕大小 function
 *
 * @return array
 */
public function screen_size(): array
{}
```

## 键盘

```php
use KingBes\PhpRobot\Keyboard;

$Keyboard = new Keyboard;
```

```php
/**
 * 是否点击键盘某键 function
 *
 * @param integer $key 整数键码值
 * @return boolean
 */
public function isKeyPressed(int $key): bool
{}

/**
 * 点击键盘某键 function
 *
 * @param integer $key 整数键码值
 * @return void
 */
public function onClickKey(int $key): void
{}
```


# 实例一 `获取当前鼠标位置`

```php
// 引入
use KingBes\PhpRobot\Mouse;

// 实例
$Mouse = new Mouse();
// 获取鼠标当前指针位置
$pos = $Mouse->mouse_pos();

var_dump($pos);
```

# 实例二 `监听键盘A键`

```php
use KingBes\PhpRobot\Keyboard;

$Keyboard = new Keyboard;

while (true) {
    if ($Keyboard->isKeyPressed(65)) {
        echo "点击了键盘A \n";
    }
    usleep(100); // 减轻负担
}
```

# 实例三 `按下键盘A键`

```php
use KingBes\PhpRobot\Keyboard;

$Keyboard = new Keyboard;

sleep(5); //延迟5秒

$Keyboard->onClickKey(65)
```

# 键盘的整数键码值

在 Windows 操作系统中，键盘上的一些按键对应着特定的整数键码值（keyCode）。以下是一些常见的 win 键盘按键及其对应的十进制数字：
- **字母和数字键**：
    - `a`：65
    - `b`：66
    - `c`：67
    - `d`：68
    - `e`：69
    - `f`：70
    - `g`：71
    - `h`：72
    - `i`：73
    - `j`：74
    - `k`：75
    - `l`：76
    - `m`：77
    - `n`：78
    - `o`：79
    - `p`：80
    - `q`：81
    - `r`：82
    - `s`：83
    - `t`：84
    - `u`：85
    - `v`：86
    - `w`：87
    - `x`：88
    - `y`：89
    - `z`：90
    - `0`：48
    - `1`：49
    - `2`：50
    - `3`：51
    - `4`：52
    - `5`：53
    - `6`：54
    - `7`：55
    - `8`：56
    - `9`：57
- **控制键**：
    - `Backspace`：8
    - `Tab`：9
    - `Clear`：12
    - `Enter`：13
    - `Shift`：16
    - `Control`：17
    - `Alt`：18
    - `Caps Lock`：20
    - `Esc`：27
    - `Spacebar`：32
    - `Page Up`：33
    - `Page Down`：34
    - `End`：35
    - `Home`：36
    - `Left Arrow`：37
    - `Up Arrow`：38
    - `Right Arrow`：39
    - `Down Arrow`：40
    - `Insert`：45
    - `Delete`：46
    - `Num Lock`：144
- **数字键盘上的键**：
    - `0`：96
    - `1`：97
    - `2`：98
    - `3`：99
    - `4`：100
    - `5`：101
    - `6`：102
    - `7`：103
    - `8`：104
    - `9`：105
    - `*`：106
    - `+`：107
    - `Enter`：108
    - `-`：109
    - `.`：110
    - `/`：111
- **其他键**：
    - `Left Windows 键`：91
    - `Right Windows 键`：92
    - `Applications 键`（右 Ctrl 左边键，点击相当于点击鼠标右键，会弹出快捷菜单）：93
