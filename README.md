# Pokédex-Projekt

**Die Demo ist hier zu finden: https://spielwiese.kuecheneisen.de/**

Beim Pokédex-Projekt handelt es sich um eine Enzyklopädie in Form einer responsive Web-App, in der Nutzer Informationen zu [Pokémon](https://www.youtube.com/watch?v=s2119-wrJo0) und deren Eigenschaften nachschlagen können.

Das Projekt wird zu Übungszwecken entwickelt und ist in HTML5, CSS3, PHP und JavaScript geschrieben. Darüber hinaus wird für den Web-Scraper [Guzzle](https://docs.guzzlephp.org/en/stable/) eingesetzt.

## Beschreibung

Derzeit werden beim Aufrufen des Web-Scrapers Daten von der Website www.bisafans.de extrahiert und in eine Datenbank geschrieben.
Ein Teil der Daten wird anschließend auf der index.php angezeigt. Über eine Suchfunktion in der Navigationsleiste kann gezielt nach Pokémon oder Typen gesucht werden.

Zukünftig soll noch eine genauere Ansicht der Pokémon per Klick und eine Bildersuche ermöglicht werden. Für die Bildersuche wird voraussichtlich eine geeignete KI eines Drittanbieter mit entsprechenden Bildern der jeweiligen Pokémon aus dem Web angelernt und dann per Schnittstelle angebunden.

## Pokédex mit Docker Compose starten

- Um den Pokédex lokal auf dem Rechner zu betreiben, muss [Docker Desktop](https://docs.docker.com/desktop/) und [Docker Compose](https://docs.docker.com/compose/install/) installiert sein.

- Der Quellcode zum Pokédex kann hier heruntergeladen werden: www.beispiel.de

- Sobald Docker Desktop gestartet wurde, navigiere mit dem Kommando `cd` im Terminal in den Dateipfad, wo der Quellcode des Pokédex' abgelegt wurde.
	Beispiel: `cd C:\Users\PC\Desktop\**dein-Pfad**`

- Mit dem Kommando `composer install` werden weitere notwendige Tools installiert, die in der Datei `composer.json` aufgelistet sind.

- Anschließend wird mit dem Kommando `docker-compose up` der Datenbankserver, der Webserver und das phpMyAdmin-Verwaltungssysteme konfiguriert und gestartet.

- Das Verwaltungssystem ist im Browser nun unter http://localhost:8081/ und die Web-App unter http://localhost:8080/ aufrufbar. Da die Datenbank noch nicht existiert, zeigt die Web-App folgende Meldung an:
	> Ungültige Abfrage: No database selected

## Daten zum Pokédex hinzufügen

- Damit der leere Pokédex mit Daten befüllt wird, muss folgende Webseite aufgerufen werden: http://localhost:8080/webscraper.php. Hier startet automatisch ein Vorgang, der Daten von www.bisafans.de extrahiert und in die Datenbank schreibt. Darüber hinaus werden die dazugehörigen Bilddateien im Order /assets/pokemon-img abgespeichert.

- Dieser Vorgang kann einige Zeit in Anspruch nehmen und schließt mit folgender Meldung ab:
	> Vorgang abgeschlossen!

- Anschließend werden die Pokémon auf http://localhost:8080/ angezeigt.

Zu Testzwecken kann der oben beschriebene Vorgang abgekürzt werden. Hierzu in der Datei `webscraper.php` in der folgenden Variable die Zahl herabsetzen, um die Anzahl der gescannten Pokémon zu verringern:
```php
$numberOfPokemon = 151;
```
