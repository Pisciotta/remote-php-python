#!/usr/bin/python
import gtk.gdk #for screenshots
import urllib #to read files content
from pymouse import PyMouse
import pyautogui #for writing
import time
import foo

ABSOLUTE_ADDRESS_OF_X="/opt/lampp/htdocs/py/x.txt"
ABSOLUTE_ADDRESS_OF_Y="/opt/lampp/htdocs/py/y.txt"
ABSOLUTE_ADDRESS_OF_CAM="/opt/lampp/htdocs/py/cam.py"
ABSOLUTE_ADDRESS_OF_COMMANDO="/opt/lampp/htdocs/py/commando.txt"
ABSOLUTE_ADDRESS_OF_SCREENSHOT="/opt/lampp/htdocs/py/screenshot.png"

while True:
	c = urllib.urlopen(ABSOLUTE_ADDRESS_OF_COMMANDO).read()
	if c=="1":
		#one left click
		foo.click(ABSOLUTE_ADDRESS_OF_X,ABSOLUTE_ADDRESS_OF_Y,1,1)
	if c=="2":
		#two left clicks
		foo.click(ABSOLUTE_ADDRESS_OF_X,ABSOLUTE_ADDRESS_OF_Y,2,1)
	if c=="3":
		#shit+left click
		foo.shiftandclick(ABSOLUTE_ADDRESS_OF_X,ABSOLUTE_ADDRESS_OF_Y,1)
	if c=="4":
		#one right click
		foo.click(ABSOLUTE_ADDRESS_OF_X,ABSOLUTE_ADDRESS_OF_X,1,2)
	if c=="5":
		#writing some text
		foo.write(ABSOLUTE_ADDRESS_OF_X)
	if c=="6":
		#taking image from the cam
		execfile(ABSOLUTE_ADDRESS_OF_CAM)

	#Now we will clear the content of .txt files
	open(ABSOLUTE_ADDRESS_OF_COMMANDO, 'w').close()
	open(ABSOLUTE_ADDRESS_OF_X, 'w').close() 
	open(ABSOLUTE_ADDRESS_OF_Y, 'w').close() 
	time.sleep(5)
	foo.screen(ABSOLUTE_ADDRESS_OF_SCREENSHOT)


