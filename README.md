# OVMS

### Inhaltsverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Profile](#5-statusvariablen-und-profile)
6. [Befehlsreferenz](#6-befehlsreferenz)

### 1. Funktionsumfang

Dies ist ein Symcon-Modul zur Protokollierung, Überwachung und Steuerung Ihres Fahrzeugs mittels OVMS.

Das OVMS - open vehicle monitoring system - ist ein quelloffenes Fahrzeug-Fernüberwachungs-, Diagnose- und Steuerungssystem. Dabei sendet das OVMS Hardwaremodul jede Änderung, in einem einstellbaren Intervall, Werte, so genannte Metriken, an den Symcon eigenen MQTT Server. 

Dieses Modul nutzt die V.3 API = MQTT, wenn euer OVMS Modul nur die V2 API beherrscht, wird stattdessen das Modul [OVMS native](https://github.com/lorbetzki/net.lorbetzki.native.ovms) benötigt.

### 2. Voraussetzungen

- IP-Symcon ab Version 6.3
- min. 150 freie Variablen pro Instanz (Symcon Unlimited empfohlen)
- ein OVMS Modul für das Fahrzeug nebst passender OBD Verbindung und Firmware. Weitere Informationen gibt es hier: https://www.openvehicles.com/ 

### 3. Software-Installation

* Über den Module Store das 'OVMS'-Modul installieren.
* Alternativ über das Module Control folgende URL hinzufügen https://github.com/lorbetzki/net.lorbetzki.ovms.git

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'OVMS'-Modul mithilfe des Schnellfilters gefunden werden.  
 Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

__Vorarbeiten am OVMS Hardwaremodul__:

- Im OVMS Modul muss: unter _Config → Vehicle_ eine Vehicle ID eingetragen sein.

 ![grafik](docs/vehicle.png?raw=true)

- unter _Config → Server V3 (MQTT)_ konfiguriert sein.

 ![grafik](docs/mqtt.png?raw=true)

Dort gebt ihr als Server die IP oder den Hostnamen des Symconservers an, zudem muss der Username und das Passwort eingeben werden, welches wir nachher im MQTT Servers von Symcon benötigen. Optional kann man bei Topic Prefix eine andere als die Standardprefix nutzen, diese hier eingetragen werden.

__Wissenswertes!__:

Man kann dem OVMS Hardwaremodul mitteilen, nicht alle Daten zu senden. Dazu lest euch bitte hier ein :https://github.com/openvehicles/Open-Vehicle-Monitoring-System-3/blob/master/docs/source/userguide/components.rst

__Konfigurationsseite__:

Name          				     | Beschreibung
-------------------------------- | -------------------------------------------------------
Vehicle ID | Den Wert einfügen den man im OVMS Modul unter _Config -> Vehicle_ eingetragen hat
Benutzername | Den Wert einfügen den man im OVMS Modul unter _Config -> Server V3 (MQTT)_ eingetragen hat
Topic Prefix | Hier kann optinal ein eigener Topic eingetragen werden, der muss identisch mit _Config -> Server V3 (MQTT)_ bei "Topic Prefix" sein. 
erstelle und schreibe unbekannte Variable/Werte | Viele Einträge sind bereits in der Datenbank vorhanden, da aber am OVMS sehr viel weiterentwickelt wird, können durchaus dinge fehlen. Mit diesem Schalter wird alles übernommen. *ACHTUNG* es werden viele Variablen erstellt (>200)!

![grafik](docs/verw.png?raw=true)

### 5. Profile

Die Profile werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

#### Profile

Name                    | Typ    | Beschreibung |
------------------------| -------|--------------|
OVMS_yesno | boolean | Profile für Ja/Nein Variablen
OVMS_dBm | integer | Signal Qualität
OVMS_byte | integer | Datenmenge in byte 
OVMS_AH | float | Ampere pro Stunde
OVMS_KM | float | Kilometer
OVMS_LEVEL | float | % Wert
OVMS_Alarm | integer | Alarm 0=Normal, 1=Warnung, 2=Alarm
OVMS_LoadState | integer | diverse Ladestati 0=Fahrzeug lädt, 1=topoff, 2=fertig geladen, 3=Vorbereitung auf laden, 4=wartet auf Ladetimer, 5=Akku für Laden vorbereiten
OVMS_LoadSubState | integer | diverse unter-Ladestati 0=planmäßiger stop, 1=planmäßiger start, 2=bei Anforderung, 3=wartet auf Ladetimer, 4=wartet auf Betriebsspannung, 5=gestoppt, 6=unterbrochen
OVMS_CableType | integer | verbundener Kabeltyp 0=unbekannt, 1=Type 1, 2=Type 2, 3=Chademo, 4=Roadster, 5=Tesla US, 6=Supercharger, 7=CCS

### 6. Befehlsreferenz

`OVMS_requestReloadData(int $InstanceID);`

sendet eine Anforderung an das OVMS Hardwaremodul, das alle MQTT Daten erneut versenden soll.

`OVMS_sendCmd(int $InstanceID, string $Payload);`

sendet beliebige Daten an das OVMS Hardwaremodul, `OVMS_sendCmd(12345, "server v3 update all");` sendet deb Befehl _"server v3 update all"_ an das OVMS Modul welches im Anschluss alle Daten erneut senden wird. Im Prinzip kann der Payload das enthalten, was man in der OVMS Shell auch eingeben kann. Bspw. `OVMS_sendCmd(12345, "climatecontrol on");` um die Vorklimatisierung einzuschalten (sofern das Fahrzeug das unterstützt).

