#Contao Modul-Entwicklung

Dies ist eine Art `learning by doing` dummy Modul. In allen Dateien sind Kommentare vorhanden, die wichtige Strukturen beschreiben und weiterhelfen. Fragen dazu könnt ihr gerne im [Forum](https://community.contao.org/de/) oder direkt bei mir stellen. Bitte beachtet das dieses Modul ein Dummy ist. Es ist wichtig dass ihr PHP beherrscht oder zumindest versteht um die Logik in Klassen zu verstehen und selbst zu entwickeln. [Mehr im Wiki](https://github.com/Sioweb/ContaoDummy/wiki)

- [Facebook](https://www.facebook.com/sioweb)
- [Twitter](https://twitter.com/Sioweb)
- [Webseite](http://www.sioweb.de)

##Inhaltsverzeichnis

- [Persönliche Anforderungen](#persönliche-anforderungen)
- [Anmerkung](#anmerkung)
- [Verzeichnisse](#verzeichnisse)
- [Genereller Ablauf](#genereller-ablauf)


##Persönliche Anforderungen 

- PHP >= 5.3 Kentnisse
- SQL (MySqli)
- XML, HTML, CSS, Javascript

##Anmerkung

Die meisten Funktionen, die man entwickeln will, gibt es schon in irgendeiner Form im Core bzw. in einem Modul. Ich selbst kopiere gerne die DCA-Elemente, Config.php oder eben Snippets die immer wieder vorkommen aus vorhandenen Elementen. Das Rad muss nicht jedes Mal neu erfunden werden (Auch wenn ich schon Module entwickelt habe die es so schon gab ._.)

##Verzeichnisse

Ein Modul liegt in dem Verzeichnis /system/modules/(Modulname) und kann folgende Struktur enthalten.

- assets
- classes
- config
- dca
- languages
	- de
	- en
- modules
- elements
- library
  - foldername
- models
- widgets
- templates
	- beliebige unterverzeichnisse

###Assets

In `assets` speichern wir Javascript, CSS Bilder und ggf. eine Art Favicon für die Backend-Navigation. Wichtig hier ist die .htaccess aus dem Modul-Dummy.

###classes, elements, modules

Diese Verzeichnisse enthalten je nach dem was entwickelt werden soll Inhaltselemente oder Module. Das Verzeichnis `classes` sind Hilfsklassen die nicht ausgegeben werden können. Wird ein Inhaltselement entwickelt, speichert man die Klasse in `elements` und ein Modul liegt in `modules`.

`classes` kann zudem auch Klassen enthalten die hauptsächlich im Backend benötigt werden. Als Beispiel könnte man eine Seite mit eigenem Contao-Unabhängigem HTML ausgeben.

- Ein Modul braucht auf jeden Fall die Datei tl_module.php im DCA-Verzeichnis.
- Ein Element braucht auf jeden Fall die Datei tl_content.php im DCA-Verzeichnis.

###Config

`config` muss in jedem Modul vorhanden sein. Es speichert die config.php die steuert, welche Klassen welchen Effekt für die Seite erzeugen. Außerdem bekommt der Autoloader hier mitgeteilt, wo die Klassen liegen und welche anderen Erweiterungen dringend benötigt werden für die entwickelte Erweiterung.

###DCA

Die DCA kopiert man am Besten aus bestehenden Modulen die am ehesten mit der eigenen Erweiterung übereinstimmen. Alles was Entwickelt wird, gibt es auch schon irgendwo im Core, ich selbst kopiere viel aus dem Core.

Die DCA steuert die Ausgabe der Daten im Backend, kurz sie gibt an ob Daten als Liste oder Seitenbaum ausgeben werden soll und definiert das Formular mit dem ein Datensatz ausgegeben werden soll.

###languages

`languages`enthält Verzeichnisse mit den zweistelligen Ländercodes, als Beispiel `de`und `en`. In früheren Versionen von Contao, wurden einfache PHP-Files generiert, die die Variable $GLOBALS um Sprach-Strings erweitert haben. Moderne Erweiterungen sollten aber auf die xlf-Dateien setzen, die einfach aus einem der Core-Module kopiert und überschrieben werden können.

###Models

Nutzt eine Erweiterung eigene Tabellen in der Datenbank oder müssen Tabellenoperationen aus anderen Modulen überschrieben bzw. erweitert werden, speichert man eine Model-Datei in das Verzeichnis Models. Als Beispiel: `TabellenNameModels.php` - Siehe Core.

###Widgets

Contao bietet eine vielzahl von Eingabetypen im Backend. Neben einfachen Textfeldern, Selectboxen und Checkboxen auch ein Element um Seiten aus der Seitenstruktur zu wählen. Sollte das zu entwickelnde Modul einen speziellen Eingabetyp benötigen, wird ein neues Widget in `widgets`gespeichert.

###templates

Templates können hier einfach überschrieben werden. Contao sucht in der Regel nach einem Prefix. Als Beispiel sucht es nach allen Templates mit dem Prefix `news_`, will man ein neues Template anlegen ohne ein bestehendes zu überschreiben, muss es einfach nur `news_irgendEinBegriff_archive` genannt werden und schon kann es in den News-Modulen ausgewählt werden.

Moderne Templates bekommen die Endung `.html5`.

##Genereller Ablauf

Contao öffnet als erstes die Dateien im `config`-Verzeichnis. Autoload.ini gibt an, welche Module dringend benötigt werden. `autoload.php` übermittelt dem Autoloader von Contao wo sich  welche Klassen befinden und welchen Namespace sie verwenden.

Als nächstes öffnet Contao die `config.php` und ermittelt welche Klassen im Front- oder Backend ausgeführt wird und ob es sich um ein Modul, Widget oder Inhaltselement handelt. Hier werden auch Assets wie Javascript, Assets und Image-Dateien geladen.

Zusätzlich kann die `config.php`genutzt werden, um Konfigurationen zu notieren, die sonst X-Fach im ganzen Modul angegeben werden müssten.

Im Fronten sucht sich Contao nun heraus, ob ein Modul oder Inhaltselement gespeichert wurde und welche Klasse in der `config.php` für dieses Element vorgesehen ist. Die Klasse wird ausgeführt.

###Backend

Im Backend können die Seiten entweder via DCA definiert werden, oder als eigenes Template. Eigene Templates machen z. B. Sinn, wenn ein CSV-Uploader gebraucht wird. Man lädt die CSV hoch und die selbe Klasse die für die Seite zuständig ist, bearbeitet die Eingabe.

Am besten schaut man sich hierfür die Erweiterung `repositories` oder im Core `maintanance` an. Beide laden nicht die DCA sondern überschreiben die Seite in der `config.php` durch die Angabe `callback => Klassenname `. 

###Frontend

Im Frontend gibt es zwei typen von Ausgabeelementen. Inhaltselemente und Module. Inhaltselemente werden direkt in die Artikel geschrieben, während Module erst in den Layouts definiert werden müssen, um sie im Layout bzw. in einem Artikel einbinden zu können. Beispiele für Module sind die News und die Navigation.

Generell sollte man sich überlegen, ob ein Element oder eher ein Modul sinn macht, dass hängt von verschiedenen Faktoren ab, wie zum Beispiel die Eingabemaske im Backend oder wie der Benutzer später weniger Probleme haben wird, den Inhalt auf die Seite zu bringen. Will man dem Benutzer wirklich zutrauen, erstmal ein Modul anlegen zu müssen? Oder ist die Ausgabe zu flexibel und muss als Inhaltselement ausgegeben werden?

###Namespace

Ich verwende gerne Namespaces. Damit ich in allen Projekten auch außerhalb von Contao eine einheitliche Struktur habe. Meine Namespaces richten sich entweder nach der Verzeichnisstruktur oder eben `namespace \firmenname\cms-name\extension\erweiterungsname`. Wichtig ist dann auch direkt darunter zu definieren `use \Contao`. Alle externen Klassen die keinen Namespace haben müssen dann auch entsprechen mit Backslash definiert werden `new \TCPDF();`

