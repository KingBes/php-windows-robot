<?php

declare(strict_types=1);

namespace KingBes\PhpRobot;

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
