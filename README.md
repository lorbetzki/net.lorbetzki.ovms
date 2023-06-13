# OVMS


### Inhaltsverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)

### 1. Funktionsumfang
OVMS - open vehicle monitoring system - ist ein quelloffenes Fahrzeug-Fernüberwachungs-, Diagnose- und Steuerungssystem, ein Symcon-Modul zur Protokollierung, Überwachung und Steuerung Ihres Fahrzeugs. Dieses Modul nutzt die V.3 API = MQTT, wenn Ihr OVMS Modul nur die V2 API beherrscht, benötigen Sie stattdessen das Modul "OVMS native"

### 2. Voraussetzungen

- IP-Symcon ab Version 6.3

- ein OVMS Modul für das Fahrzeug nebst passender OBD Verbindung und Firmware. Weitere Informationen gibt es hier: https://www.openvehicles.com/ 

Im OVMS Modul muss:
unter config → vehicle eine Vehicle ID eingetragen sein.

![grafik](https://github.com/net.lorbetzki.ovms/docs/mqtt.png)

### 3. Software-Installation

* Über den Module Store das 'OVMS'-Modul installieren.
* Alternativ über das Module Control folgende URL hinzufügen https://github.com/lorbetzki/net.lorbetzki.ovms.git

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'OVMS'-Modul mithilfe des Schnellfilters gefunden werden.  
	- Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

Man kann OVMS zudem mitteilen, nicht alle Daten zu senden. Dazu lest euch bitte hier ein :https://github.com/openvehicles/Open-Vehicle-Monitoring-System-3/blob/master/docs/source/userguide/components.rst

__Konfigurationsseite__:

Name          				     | Beschreibung
-------------------------------- | -------------------------------------------------------


### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

#### Statusvariablen

Name                          							| Typ     | Beschreibung
----------------------------- 							| ------- | ------------


#### Profile

Name                    | Typ
------------------------| -------

### 6. WebFront

Name                          							| Typ     | Beschreibung
--------------------------------------------------------| ------- | ------------


