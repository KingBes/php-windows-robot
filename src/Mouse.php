<?php

declare(strict_types=1);

namespace KingBes\PhpRobot;

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

    /**
     * 鼠标平滑移动指定位置 function
     *
     * @param integer $x
     * @param integer $y
     * @param integer $duration_ms 毫秒
     * @param string $tween 预览补间
     * @return self
     */
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

    /**
     * 当前平滑移动鼠标 function
     *
     * @param integer $offset_x
     * @param integer $offset_y
     * @param integer $duration_ms 毫秒
     * @param string $tween 预览补间
     * @return self
     */
    public function move_mouse_smooth_rel(int $offset_x, int $offset_y, int $duration_ms, string $tween): self
    {
        $start_pos = $this->ffi->mouse_pos();
        $dest_x = $offset_x + $start_pos->x;
        $dest_y = $offset_y + $start_pos->y;
        $this->move_mouse_smooth($dest_x, $dest_y, $duration_ms, $tween);
        return $this;
    }

    /**
     * 鼠标按下 function
     *
     * @param string $button left right middle
     * @return self
     */
    public function mouse_down(string $button): self
    {
        $this->ffi->mouse_down($button);
        return $this;
    }

    /**
     * 鼠标弹起 function
     *
     * @param string $button left right middle
     * @return self
     */
    public function mouse_up(string $button): self
    {
        $this->ffi->mouse_up($button);
        return $this;
    }
}
