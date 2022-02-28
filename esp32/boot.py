# This file is executed on every boot (including wake-boot from deepsleep)
#import esp
#esp.osdebug(None)
#import webrepl
#webrepl.start()

# connect to wifi network
def do_connect():
    
    import network
    import sensor_config as cfg
    
    sta_if = network.WLAN(network.STA_IF)
    if not sta_if.isconnected():
        print("Connecting to network...")
        sta_if.active(True)
        sta_if.connect(cfg.cfg['sta_if'], cfg.cfg['sta_pwd'])
        while not sta_if.isconnected():
            pass
    print("network config: ", sta_if.ifconfig())