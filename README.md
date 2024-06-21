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