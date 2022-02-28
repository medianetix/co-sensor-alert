import network
import time
import urequests
import machine
import sensor_config as cfg

     
do_connect(); # from boot.py

led = machine.Pin(2, machine.Pin.OUT)
led.value(0)
sensor_name = 'sensor1'
sensor_value = 0.0
while sensor_value < 12.0:
    led.value(1)
    sensor_value += 1.0
    url = cfg.cfg['request_url']+'/'+sensor_name+'/'+str(sensor_value)
    response = urequests.get(url)
    print(sensor_value, response.status_code)
    response.close()
    led.value(0)
    time.sleep(5)
    