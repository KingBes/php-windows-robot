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
}
