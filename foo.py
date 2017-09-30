#!/usr/bin/python
import gtk.gdk 
import urllib 
from pymouse import PyMouse
import pyautogui

def screen(path):
	w = gtk.gdk.get_default_root_window()
	size = gtk.gdk.get_default_root_window().get_size()
	pb = gtk.gdk.Pixbuf(gtk.gdk.COLORSPACE_RGB,False,8,size[0],size[1])
	pb = pb.get_from_drawable(w,w.get_colormap(),0,0,0,0,size[0],size[1])
	pb.save(path,"png")

def click(linkx,linky,n,button):#button=1(left),2(right),3(middle)
	m = PyMouse()
	x = int(urllib.urlopen(linkx).read())
	y = int(urllib.urlopen(linky).read())
	m.move(x,y)
	for i in range(0, n):
		m.click(x,y,button)

def write(textpath):
	pyautogui.typewrite(urllib.urlopen(textpath).read())

def shiftandclick(linkx,linky,n):
	pyautogui.keyDown("shift")
	click(linkx,linky,n)
	pyautogui.keyUp("shift")
