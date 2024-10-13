class Spriteelement {
	constructor(id, off_x, off_y, off_w, off_h, on_x,  on_x_r, on_y,  on_y_r, on_w, on_h, anim_s, fadeState){
        this.id = id;
        this.off_x = off_x;
        this.off_y = off_y;
        this.off_w = off_w;
        this.off_h = off_h;
        this.on_x = on_x;
        this.on_y= on_y;
        this.on_y_r = on_y_r;
        this.on_x_r = on_x_r;
        this.on_w = on_w;
        this.on_h = on_h;
        this.anim_s = anim_s;
        this.fadeState = fadeState;
    }
    
    
    disapear(){
    }
    fadeState(){
    }	
    anim(){
    }	
}