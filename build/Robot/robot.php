<?php

declare(strict_types=1);

// use FFI;

class Robot
{
    public FFI $ffi;

    public function __construct()
    {
        if (PHP_OS_FAMILY != "Windows") {
            throw new Exception("The OS must be windows!");
        }
        $header = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "robot_php.h");
        $this->ffi = FFI::cdef($header, "robot.dll");
    }
}

/**
 * 鼠标 class
 */
class Mouse extends Robot
{
    /**
     * 鼠标指针位置 function
     *
     * @return array
     */
    public function mouse_pos(): array
    {
        $pos = $this->ffi->mouse_pos();
        return ["x" => $pos->x, "y" => $pos->y];
    }

    /**
     * 鼠标单击 function
     *
     * @param string $button left right middle
     * @return self
     */
    public function mouse_click(string $button): self
    {
        $this->ffi->mouse_click($button);
        return $this;
    }

    /**
     * 鼠标双击 function
     *
     * @param string $button left right middle
     * @return self
     */
    public function mouse_double_click(string $button): self
    {
        $this->ffi->mouse_double_click($button);
        return $this;
    }

    /**
     * 将鼠标(左)拖动到指定位置。 function
     *
     * @param integer $x
     * @param integer $y
     * @return self
     */
    public function mouse_left_drag(int $x, int $y): self
    {
        $this->ffi->mouse_left_drag($x, $y);
        return $this;
    }

    /**
     * 相对于当前位置拖动鼠标(左)。 function
     *
     * @param integer $offset_x
     * @param integer $offset_y
     * @return self
     */
    public function mouse_drag_rel(int $offset_x, int $offset_y): self
    {
        $this->ffi->mouse_drag_rel($offset_x, $offset_y);
        return $this;
    }

    /**
     * 移动鼠标到 x y function
     *
     * @param integer $x
     * @param integer $y
     * @return self
     */
    public function mouse_move_mouse(int $x, int $y): self
    {
        $this->ffi->mouse_move_mouse($x, $y);
        return $this;
    }

    /**
     * 相对于当前位置移动鼠标。 function
     *
     * @param integer $offset_x
     * @param integer $offset_y
     * @return self
     */
    public function move_mouse_rel(int $offset_x, int $offset_y): self
    {
        $this->ffi->move_mouse_rel($offset_x, $offset_y);
        return $this;
    }

    public function move_mouse_smooth(int $x, int $y, int $duration_ms, string $tween): self
    {
        $start_pos = $this->ffi->mouse_pos();
        $dist_x = $x - $start_pos->x;
        $dist_y = $y - $start_pos->y;
        $steps = intval(max(50, ($duration_ms) / 10));
        $dt = intval(($duration_ms) / $steps);
        $i = 0;
        $factor = 0.0;
        while ($i < $steps) {
            $factor = $this->ffi->factor($tween, $i, $steps);
            $current_x = intval($start_pos->x + $factor * $dist_x);
            $current_y = intval($start_pos->y + $factor * $dist_y);
            $this->ffi->move_mouse($current_x, $current_y);
            usleep($dt);
            $i++;
        }

        return $this;
    }

    public function mouse_down(string $button): self
    {
        $this->ffi->mouse_down($button);
        return $this;
    }

    public function mouse_up(string $button): self
    {
        $this->ffi->mouse_up($button);
        return $this;
    }
}

/**
 * 屏幕 class
 */
class Screen extends Robot
{
    /**
     * 获取屏幕指定位置的颜色rgb function
     *
     * @param integer $x
     * @param integer $y
     * @return array
     */
    public function pixel_color(int $x, int $y): array
    {
        $rgb = $this->ffi->pixel_color($x, $y);
        return [
            "r" => $rgb->r,
            "g" => $rgb->g,
            "b" => $rgb->b
        ];
    }

    /**
     * 获取屏幕大小 function
     *
     * @return array
     */
    public function screen_size(): array
    {
        $size = $this->ffi->screen_size();
        return [
            "width" => $size->width,
            "height" => $size->height
        ];
    }
}

$Mouse = new Mouse();
sleep(3);
$Mouse->mouse_down("left");

sleep(3);
$Mouse->mouse_up("left");

// var_dump($size);
