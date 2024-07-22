module main

import vrobot
import keys
import time

struct Pos {
	x int
	y int
}

// 鼠标指针位置
@[export: 'mouse_pos']
fn mouse_pos() Pos {
	p := vrobot.mouse_pos()
	return Pos{p.x, p.y}
}

// 鼠标单击 left right middle
@[export: 'mouse_click']
fn mouse_click(button &char) {
	vrobot.click(unsafe { button.vstring() })
}

// 鼠标双击 left right middle
@[export: 'mouse_double_click']
fn mouse_double_click(button &char) {
	vrobot.double_click(unsafe { button.vstring() })
}

// 将鼠标(左)拖动到指定位置。
@[export: 'mouse_left_drag']
fn mouse_left_drag(x int, y int) {
	vrobot.drag(x, y)
}

// 相对于当前位置拖动鼠标(左)。
@[export: 'mouse_drag_rel']
fn mouse_drag_rel(offset_x int, offset_y int) {
	vrobot.drag_rel(offset_x, offset_y)
}

// 移动鼠标到 x y
@[export: 'mouse_move_mouse']
fn mouse_move_mouse(x int, y int) {
	vrobot.move_mouse(x, y)
}

// 相对于当前位置移动鼠标。
@[export: 'move_mouse_rel']
fn move_mouse_rel(offset_x int, offset_y int) {
	vrobot.move_mouse_rel(offset_x, offset_y)
}

struct Color {
	r int
	g int
	b int
}

// 获取屏幕指定位置的颜色rgb
@[export: 'pixel_color']
fn pixel_color(x int, y int) Color {
	p := vrobot.pixel_color(x, y)
	return Color{p.r, p.g, p.b}
}

struct Size {
	width  int
	height int
}

// 获取屏幕大小
@[export: 'screen_size']
fn screen_size() Size {
	s := vrobot.screen_size()
	return Size{s.width, s.height}
}

// 鼠标平滑移动
@[export: 'move_mouse_smooth']
fn move_mouse_smooth(x int, y int, duration_ms int, tween &char) {
	t := unsafe { cstring_to_vstring(tween) }
	vrobot.move_mouse_smooth(x, y, duration_ms, t)
}

@[export: 'move_mouse']
fn move_mouse(x int, y int) {
	vrobot.move_mouse(x, y)
}

@[export: 'factor']
fn factor(tween &char, i int,steps int) f64 {
	n := vrobot.normalize(i, 0, steps)
	t := unsafe { cstring_to_vstring(tween) }
	m := match t {
		'linear' { n }
		'ease_in_quad' { vrobot.ease_in_quad(n) }
		'ease_out_quad' { vrobot.ease_out_quad(n) }
		'ease_in_out_quad' { vrobot.ease_in_out_quad(n) }
		'ease_in_cubic' { vrobot.ease_in_cubic(n) }
		'ease_out_cubic' { vrobot.ease_out_cubic(n) }
		'ease_in_out_cubic' { vrobot.ease_in_out_cubic(n) }
		'ease_in_quart' { vrobot.ease_in_quart(n) }
		'ease_out_quart' { vrobot.ease_out_quart(n) }
		'ease_in_out_quart' { vrobot.ease_in_out_quart(n) }
		'ease_in_quint' { vrobot.ease_in_quint(n) }
		'ease_out_quint' { vrobot.ease_out_quint(n) }
		'ease_in_out_quint' { vrobot.ease_in_out_quint(n) }
		'ease_in_sine' { vrobot.ease_in_sine(n) }
		'ease_out_sine' { vrobot.ease_out_sine(n) }
		'ease_in_out_sine' { vrobot.ease_in_out_sine(n) }
		'ease_in_expo' { vrobot.ease_in_expo(n) }
		'ease_out_expo' { vrobot.ease_out_expo(n) }
		'ease_in_out_expo' { vrobot.ease_in_out_expo(n) }
		'ease_in_circ' { vrobot.ease_in_circ(n) }
		'ease_out_circ' { vrobot.ease_out_circ(n) }
		'ease_in_out_circ' { vrobot.ease_in_out_circ(n) }
		'ease_in_elastic' { vrobot.ease_in_elastic(n) }
		'ease_out_elastic' { vrobot.ease_out_elastic(n) }
		'ease_in_out_elastic' { vrobot.ease_in_out_elastic(n) }
		'ease_in_back' { vrobot.ease_in_back(n) }
		'ease_out_back' { vrobot.ease_out_back(n) }
		'ease_in_out_back' { vrobot.ease_in_out_back(n) }
		'ease_in_bounce' { vrobot.ease_in_bounce(n) }
		'ease_out_bounce' { vrobot.ease_out_bounce(n) }
		'ease_in_out_bounce' { vrobot.ease_in_out_bounce(n) }
		else { panic('Tween not found') }
	}
	// println("m:${m}")
	// TODO there must be better way to do this
	return m
}

/* fn move_mouse_smooth(x int, y int, duration_ms int)
{
	start_pos := mouse_pos()
	dist_x := f64(x) - start_pos.x
	dist_y := f64(y) - start_pos.y

	// dist := math.sqrt(math.pow(x - start_pos.x, 2) + math.pow(y - start_pos.y, 2))
	steps := int(math.max(50.0, duration_ms * 1000 / 5))
	dt := int(f64(duration_ms * 1000) / f64(steps))
} */

fn main() {
	vrobot.move_mouse_smooth(0, 0, 3000, 'linear')
	/* for {
		onkey := keys.is_key_pressed(65)
		if onkey > 0 {
			println('A key')
		} else {
			println('not A key')
		}
		time.sleep(1000 * time.millisecond)
	} */
}
