// 鼠标
typedef struct
{
    int x;
    int y;
} Pos;
Pos mouse_pos();
void mouse_click(const char *button);
void mouse_double_click(const char *button);
void mouse_left_drag(int x, int y);
void mouse_drag_rel(int offset_x, int offset_y);
void mouse_move_mouse(int x, int y);
void move_mouse_rel(int offset_x, int offset_y);

// 屏幕
typedef struct  {
	int r;
	int g;
	int b;
}Color;
Color pixel_color(int x,int y);
typedef struct {
    int width;
    int height;
}Size;
Size screen_size();