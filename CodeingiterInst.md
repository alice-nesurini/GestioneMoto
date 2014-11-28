

Codeigniter
==========

###Installazione

Scaricare codeingiter dal sito ufficiale http://www.codeigniter.com/ versione attuale 2.2.0.
Una volta scaricato estrarre i file e metterli nella cartella dove si vuole lavorare con codeigniter. Ad esempio se si usa <b>XAMPP</b> mettere i file nella cartella del proprio progetto in <i>htdocs</i>.

###Primo approcio
La struttura dei file è la seguente: 
<i>Application</i>

+ Controllers
+ Views
+ Models
+ Config

<b>Controllers</b>
```
Contiene tutti i controllers, un controller è quello che viene caricato con la pagina il suo compito e quello di prendere i dati grazie alla costruzione di modelli e caricarli in una view.
```
<b>Views</b>
```
Contiene tutte le views, una view è la parte dove si decide come disegnare su uno schermo i dati ricevuti da un controller.
```
<b>Models</b>
```
Contiene tutti i model, un model definisce un modello di come sono strutturati i dati, nel mio caso usando un database ho una struttura di dati che passo ai models dove sono presenti le funzioni SQL per prendere i dati.	
```
<b>Config</b>
```
Contiene tutti i file di configurazione, i più importanti sono nel mio caso:
"database.php": che serve per impostare il database.
"routes.php": che serve per decidere le strade, i percorsi. Come ad esempio quello di default.

```

----------


<b>Alice Mariotti Nesurini</b> 
Data 18.11.14
