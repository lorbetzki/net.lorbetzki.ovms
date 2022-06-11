<?php

// array, Topicpath, Description, Datatype, SymconProfile
$DP = array(
    array('metric/m/freeram','Total amount of free RAM in bytes', 'INT', 'OVMS_byte'),
    array('metric/m/hardware','Base module hardware info', 'STRING', ''),
    array('metric/m/monotonic','Uptime', 'INT', '~UnixTimestampTime'),
    array('metric/m/net/mdm/iccid','SIM ICCID', 'INT', ''),
    array('metric/m/net/mdm/model','Modem module hardware info', 'STRING', ''),
    array('metric/m/net/mdm/network','Current GSM network provider', 'STRING', ''),
    array('metric/m/net/mdm/sq','Current GSM network provider signal quality', 'INT', 'OVMS_dBm'),
    array('metric/m/net/provider','Current primary network provider', 'STRING', ''),
    array('metric/m/net/sq','Current primary network provider signal quality', 'INT', 'OVMS_dBm'),
    array('metric/m/net/type','Current primary network provider type (none/modem/wifi)', 'STRING', ''),
    array('metric/m/net/wifi/network','Current Wifi network SSID', 'STRING', ''),
    array('metric/m/net/wifi/sq','Current Wifi network signal quality', 'INT', 'OVMS_dBm'),
    array('metric/m/serial','Reserved for module serial no.', 'STRING', ''),
    array('metric/m/tasks','Task count (use module tasks to list)', 'INT', ''),
    array('metric/m/time/utc','UTC time in seconds', 'INT', '~UnixTimestamp'),
    array('metric/m/version','Firmware version', 'STRING', ''),
    array('metric/m/egpio/input','EGPIO input port state (ports 0…9, present=high)', 'INT', ''),
    array('metric/m/egpio/monitor','EGPIO input monitoring ports', 'INT', ''),
    array('metric/m/egpio/output','EGPIO output port state', 'INT', ''),
    array('metric/s/v2/connected','V2 (MP) server connected', 'BOOL', 'OVMS_yesno'),
    array('metric/s/v2/peers','V2 clients connected', 'INT', ''),
    array('metric/s/v3/connected','V3 (MQTT) server connected', 'BOOL', 'OVMS_yesno'),
    array('metric/s/v3/peers','V3 clients connected', 'INT', ''),
    array('metric/v/b/12v/current','Auxiliary 12V battery momentary current', 'FLOAT', '~Ampere'),
    array('metric/v/b/12v/voltage','Auxiliary 12V battery momentary voltage', 'FLOAT', '~Volt'),
    array('metric/v/b/12v/voltage/alert','auxiliary battery under voltage alert', 'BOOL', '~Battery'),
    array('metric/v/b/12v/voltage/ref','Auxiliary 12V battery reference voltage', 'FLOAT', '~Volt'),
    array('metric/v/b/c/temp','Cell temperatures', 'FLOAT', '~Temperature'),
    array('metric/v/b/c/temp/alert','Cell temperature deviation alert level [0=normal, 1=warning, 2=alert]', 'INT', ''),
    array('metric/v/b/c/temp/dev/max','Cell maximum temperature deviation observed', 'FLOAT', '~Temperature'),
    array('metric/v/b/c/temp/max','Cell maximum temperatures', 'FLOAT', '~Temperature'),
    array('metric/v/b/c/temp/min','Cell minimum temperatures', 'FLOAT', '~Temperature'),
    array('metric/v/b/c/voltage','Cell voltages', 'FLOAT', '~Volt'),
    array('metric/v/b/c/voltage/alert','Cell voltage deviation alert level [0=normal, 1=warning, 2=alert]', 'INT', ''),
    array('metric/v/b/c/voltage/dev/max','Cell maximum voltage deviation observed', 'FLOAT', '~Volt'),
    array('metric/v/b/c/voltage/max','Cell maximum voltages', 'FLOAT', '~Volt'),
    array('metric/v/b/c/voltage/min','Cell minimum voltages', 'FLOAT', '~Volt'),
    array('metric/v/b/cac','Calculated battery pack capacity', 'FLOAT', 'OVMS_AH'),
    array('metric/v/b/consumption','Main battery momentary consumption', 'FLOAT', '~Electricity.Wh'),
    array('metric/v/b/coulomb/recd','Main battery coulomb recovered on trip/charge', 'FLOAT', 'OVMS_AH'),
    array('metric/v/b/coulomb/recd/total','Main battery coulomb recovered total (life time)', 'FLOAT', 'OVMS_AH'),
    array('metric/v/b/coulomb/used','Main battery coulomb used on trip', 'FLOAT', 'OVMS_AH'),
    array('metric/v/b/coulomb/used/total','Main battery coulomb used total (life time)', 'FLOAT', 'OVMS_AH'),
    array('metric/v/b/current','Main battery momentary current (output=positive)', 'FLOAT', '~Ampere'),
    array('metric/v/b/energy/recd','Main battery energy recovered on trip/charge', 'FLOAT', '~Electricity'),
    array('metric/v/b/energy/recd/total','Main battery energy recovered total (life time)', 'FLOAT', '~Electricity'),
    array('metric/v/b/energy/used','Main battery energy used on trip', 'FLOAT', '~Electricity'),
    array('metric/v/b/energy/used/total','Main battery energy used total (life time)', 'FLOAT', '~Electricity'),
    array('metric/v/b/health','General textual description of battery health', 'STRING', ''),
    array('metric/v/b/p/level/avg','Cell level - pack average', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/b/p/level/max','Cell level - strongest cell in pack', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/b/p/level/min','Cell level - weakest cell in pack', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/b/p/level/stddev','Cell level - pack standard deviation', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/b/p/temp/avg','Cell temperature - pack average', 'FLOAT', '~Temperature'),
    array('metric/v/b/p/temp/max','Cell temperature - warmest cell in pack', 'FLOAT', '~Temperature'),
    array('metric/v/b/p/temp/min','Cell temperature - coldest cell in pack', 'FLOAT', '~Temperature'),
    array('metric/v/b/p/temp/stddev','Cell temperature - current standard deviation', 'FLOAT', '~Temperature'),
    array('metric/v/b/p/temp/stddev/max','Cell temperature - maximum standard deviation observed', 'FLOAT', '~Temperature'),
    array('metric/v/b/p/voltage/avg','Cell voltage - pack average', 'FLOAT', '~Volt'),
    array('metric/v/b/p/voltage/grad','Cell voltage - gradient of current series', 'FLOAT', '~Volt'),
    array('metric/v/b/p/voltage/max','Cell voltage - strongest cell in pack', 'FLOAT', '~Volt'),
    array('metric/v/b/p/voltage/min','Cell voltage - weakest cell in pack', 'FLOAT', '~Volt'),
    array('metric/v/b/p/voltage/stddev','Cell voltage - current standard deviation', 'FLOAT', '~Volt'),
    array('metric/v/b/p/voltage/stddev/max','Cell voltage - maximum standard deviation observed', 'FLOAT', '~Volt'),
    array('metric/v/b/power','Main battery momentary power (output=positive)', 'FLOAT', '~Electricity'),
    array('metric/v/b/range/est','Estimated range', 'FLOAT', 'OVMS_KM'),
    array('metric/v/b/range/full','Ideal range at 100% SOC & current conditions', 'FLOAT', 'OVMS_KM'),
    array('metric/v/b/range/ideal','Ideal range', 'FLOAT', 'OVMS_KM'),
    array('metric/v/b/range/speed','Momentary ideal range gain/loss (charge/discharge) speed', 'FLOAT', 'OVMS_KM'),
    array('metric/v/b/soc','State of charge', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/b/soh','State of health', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/b/temp','Main battery momentary temperature', 'FLOAT', '~Temperature'),
    array('metric/v/b/voltage','Main battery momentary voltage', 'FLOAT', '~Volt'),
    array('metric/v/c/12v/current','Output current of DC/DC-converter', 'FLOAT', '~Volt'),
    array('metric/v/c/12v/power','Output power of DC/DC-converter', 'FLOAT', '~Watt'),
    array('metric/v/c/12v/temp','Temperature of DC/DC-converter', 'FLOAT', '~Temperature'),
    array('metric/v/c/12v/voltage','Output voltage of DC/DC-converter', 'FLOAT', '~Volt'),
    array('metric/v/c/charging','currently charging', 'BOOL', 'OVMS_yesno'),
    array('metric/v/c/climit','Maximum charger output current', 'FLOAT', '~Ampere'),
    array('metric/v/c/current','Momentary charger output current', 'FLOAT', '~Ampere'),
    array('metric/v/c/duration/full','Estimated time remaing for full charge', 'INT', ''),
    array('metric/v/c/duration/range','Estimated time remaing for sufficient range', 'INT', ''),
    array('metric/v/c/duration/soc','Estimated time remaing for sufficient SOC', 'INT', ''),
    array('metric/v/c/efficiency','Momentary charger efficiency', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/c/kwh','Energy sum for running charge', 'FLOAT', '~Electricity'),
    array('metric/v/c/kwh/grid','Energy drawn from grid during running session', 'FLOAT', '~Electricity'),
    array('metric/v/c/kwh/grid/total','Energy drawn from grid total (life time)', 'FLOAT', '~Electricity'),
    array('metric/v/c/limit/range','Sufficient range limit for current charge', 'FLOAT', 'OVMS_KM'),
    array('metric/v/c/limit/soc','Sufficient SOC limit for current charge', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/c/mode','standard, range, performance, storage', 'STRING', ''),
    array('metric/v/c/pilot','Pilot signal present', 'BOOL', 'OVMS_yesno'),
    array('metric/v/c/power','Momentary charger input power', 'FLOAT', '~Power'),
    array('metric/v/c/state','charging, topoff, done, prepare, timerwait, heating, stopped', 'STRING', ''),
    array('metric/v/c/substate','scheduledstop, scheduledstart, onrequest, timerwait, powerwait, stopped, interrupted', 'STRING', ''),
    array('metric/v/c/temp','Charger temperature', 'FLOAT', '~Temperature'),
    array('metric/v/c/time','Duration of running charge', 'FLOAT', ''),
    array('metric/v/c/timermode','timer enabled', 'BOOL', 'OVMS_yesno'),
    array('metric/v/c/timerstart','Time timer is due to start, seconds since midnight UTC', 'INT', '~UnixTimestampTime'),
    array('metric/v/c/type','undefined, type1, type2, chademo, roadster, teslaus, supercharger, ccs', 'STRING', ''),
    array('metric/v/c/voltage','Momentary charger supply voltage', 'FLOAT', '~Volt'),
    array('metric/v/d/cp','Charge port open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/d/fl','Front left door open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/d/fr','Front right door open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/d/hood','Hood/frunk open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/d/rl','Rear left door open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/d/rr','Rear right door open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/d/trunk','Trunk open', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/alarm','Alarm currently sounding', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/aux12v','12V auxiliary system is on (base system awake)', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/awake','Vehicle is fully awake (switched on by the user)', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/c/config','ECU/controller in configuration state', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/c/login','Module logged in at ECU/controller', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/cabintemp','Cabin temperature', 'FLOAT', '~Temperature'),
    array('metric/v/e/cabinfan','Cabin fan', '', 'FLOAT'),
    array('metric/v/e/cabinsetpoint','Cabin set point', 'FLOAT', '~Temperature'),
    array('metric/v/e/cabinintake','Cabin intake type (fresh, recirc, etc)', 'STRING', ''),
    array('metric/v/e/cabinvent','Cabin vent type (comma-separated list of feet, face, screen, etc)', 'STRING', ''),
    array('metric/v/e/charging12v','12V battery is charging', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/cooling','Cooling', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/drivemode','Active drive profile code (vehicle specific)', 'FLOAT', ''),
    array('metric/v/e/drivetime','Seconds driving (turned on)', 'INT', '~UnixTimestampTime'),
    array('metric/v/e/footbrake','Brake pedal state [%]', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/e/gear','Gear/direction', ' negative=reverse, 0=neutral', 'INT'),
    array('metric/v/e/handbrake','Handbrake engaged', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/headlights','Headlights on', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/heating','Heating', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/hvac','HVAC active', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/locked','Vehicle locked', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/on','Vehicle is in “ignition” state (drivable)', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/parktime','Seconds parking (turned off)', 'INT', '~UnixTimestampTime'),
    array('metric/v/e/regenbrake','Regenerative braking active', 'BOOL', 'OVMS_yesno'),
    array('metric/v/e/serv/range','Distance to next scheduled maintenance/service [km]', 'INT', 'OVMS_KM'),
    array('metric/v/e/serv/time','Time of next scheduled maintenance/service [Seconds]', 'INT', '~UnixTimestampTime'),
    array('metric/v/e/temp','Ambient temperature', 'FLOAT', '~Temperature'),
    array('metric/v/e/throttle','Drive pedal state [%]', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/e/valet','Valet mode engaged', 'BOOL', 'OVMS_yesno'),
    array('metric/v/g/generating','currently delivering power', 'BOOL', 'OVMS_yesno'),
    array('metric/v/g/climit','Maximum generator input current (from battery)', 'FLOAT', '~Ampere'),
    array('metric/v/g/current','Momentary generator input current (from battery)', 'FLOAT', '~Ampere'),
    array('metric/v/g/duration/empty','Estimated time remaining for full discharge', 'INT', ''),
    array('metric/v/g/duration/range','Estimated time remaining for range limit', 'INT', ''),
    array('metric/v/g/duration/soc','Estimated time remaining for SOC limit', 'INT', ''),
    array('metric/v/g/efficiency','Momentary generator efficiency', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/g/kwh','Energy sum generated in the running session', 'FLOAT', '~Electricity'),
    array('metric/v/g/kwh/grid','Energy sent to grid during running session', 'FLOAT', '~Electricity'),
    array('metric/v/g/kwh/grid/total','Energy sent to grid total', 'FLOAT', '~Electricity'),
    array('metric/v/g/limit/range','Minimum range limit for generator mode', 'FLOAT', 'OVMS_KM'),
    array('metric/v/g/limit/soc','Minimum SOC limit for generator mode', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/g/mode','Generator mode (TBD)', 'STRING', ''),
    array('metric/v/g/pilot','Pilot signal present', 'BOOL', 'OVMS_yesno'),
    array('metric/v/g/power','Momentary generator output power', 'FLOAT', '~Power'),
    array('metric/v/g/state','Generator state (TBD)', 'STRING', ''),
    array('metric/v/g/substate','Generator substate (TBD)', 'STRING', ''),
    array('metric/v/g/temp','Generator temperature', 'FLOAT', '~Temperature'),
    array('metric/v/g/time','Duration of generator running', 'INT', ''),
    array('metric/v/g/timermode','True if generator timer enabled', 'BOOL', 'OVMS_yesno'),
    array('metric/v/g/timerstart','Time generator is due to start', 'INT', '~UnixTimestampTime'),
    array('metric/v/g/type','Connection type (chademo, ccs, …)', 'STRING', ''),
    array('metric/v/g/voltage','Momentary generator output voltage', 'FLOAT', '~Volt'),
    array('metric/v/i/temp','Inverter temperature', 'FLOAT', '~Temperature'),
    array('metric/v/i/power','Momentary inverter motor power (output=positive)', 'FLOAT', '~Power'),
    array('metric/v/i/efficiency','Momentary inverter efficiency', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/m/rpm','Motor speed (RPM)', 'FLOAT', ''),
    array('metric/v/m/temp','Motor temperature', 'FLOAT', '~Temperature'),
    array('metric/v/p/acceleration','Vehicle acceleration', 'FLOAT', '~WindSpeed.ms'),
    array('metric/v/p/altitude','GPS altitude', 'FLOAT', ''),
    array('metric/v/p/direction','GPS direction', 'FLOAT', ''),
    array('metric/v/p/gpshdop','GPS horizontal dilution of precision (smaller=better)', 'FLOAT', ''),
    array('metric/v/p/gpslock','has GPS satellite lock', 'BOOL', 'OVMS_yesno'),
    array('metric/v/p/gpsmode','N/A/D/E (None/Autonomous/Differential/Estimated)', 'STRING'),
    array('metric/v/p/gpssq','GPS signal quality [%] (50 good, >80 excellent)', 'FLOAT', 'OVMS_LEVEL'),
    array('metric/v/p/gpsspeed','GPS speed over ground', 'FLOAT', '~WindSpeed.kmh'),
    array('metric/v/p/gpstime','Time (UTC) of GPS coordinates [Seconds]', 'INT', '~UnixTimestampTime'),
    array('metric/v/p/latitude','GPS latitude', 'FLOAT', ''),
    array('metric/v/p/location','Name of current location if defined', 'STRING', ''),
    array('metric/v/p/longitude','GPS longitude', 'FLOAT', ''),
    array('metric/v/p/odometer','Vehicle odometer', 'FLOAT', 'OVMS_KM'),
    array('metric/v/p/satcount','GPS satellite count in view', 'INT', ''),
    array('metric/v/p/speed','Vehicle speed', 'FLOAT', '~WindSpeed.kmh'),
    array('metric/v/p/trip','Trip odometer', 'FLOAT', 'OVMS_KM'),
    array('metric/v/t/alert','TPMS tyre alert levels [0=normal, 1=warning, 2=alert]', 'INT', ''),
    array('metric/v/t/health','TPMS tyre health states', 'STRING', ''),
    array('metric/v/t/pressure','TPMS tyre pressures', 'STRING', ''),
    array('metric/v/t/temp','TPMS tyre temperatures', 'STRING', ''),
    array('metric/v/type','Vehicle type code', 'STRING', ''),
    array('metric/v/vin','Vehicle identification number', 'STRING', ''),
    array('event','Event', 'STRING', ''),
    array('notify/alert/charge.stopped','Alert: charge stopped', 'STRING', ''),
    array('notify/alert/vehicle.idle','Alert: vehicle idle', 'STRING', ''),
    array('notify/alert/vehicle.lock','Alert: vehicle lock', 'STRING', ''),
    array('notify/info/charge.started','Info: charge stopped', 'STRING', ''),
    array('notify/info/ota.update','Info: OTA update for OVMS available', 'STRING', '')

    );
