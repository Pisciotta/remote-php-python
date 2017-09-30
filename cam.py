#SOURCE/AUTHOR of this script can be found at the following address:
#https://codeplasma.com/2012/12/03/getting-webcam-images-with-python-and-opencv-2-for-real-this-time/

import cv2
file = "/opt/lampp/htdocs/py/cam.png"
camera_port = 0 # Camera 0 is the integrated web cam on my netbook
ramp_frames = 30 #Number of frames to throw away while the camera adjusts to light levels

camera = cv2.VideoCapture(camera_port)
def get_image():
	retval, im = camera.read()
	return im
for i in xrange(ramp_frames):
	temp = get_image()
print("Taking image...")
camera_capture = get_image()
cv2.imwrite(file, camera_capture)
del(camera)
