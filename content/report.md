Redovisning
=========================

##Kmom01

###Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.
Tittar jag tillbaka på översikten av PHP The Right Way så är det första jag tänker på testning. Vi gjorde det lite i föregående kurs, men jag känner att det är inget jag har särskilt bra koll på.

Säkerhet är en del jag skulle kunna förstärka. Jag känner ändå att jag ungefär vet vad som behöver göras för att det ska vara någorlunda säkert, men exakt hur man gör det är en annan fråga. Andra saker jag känner skulle behöva övas mer på är bland annat - dependency injection, servers and deployment, virtualization och caching.

Databaser och att använda PDO känns ändå som jag har ganska bra koll på. Det känns iallafall inte så hemskt att jobba med det. Templating känner jag nog att jag vet hur det fungerar. Det går även här att bli bättre, men jämfört med tidigare nämnda saker så har jag bättre koll på templating.

###Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?
Jag började med att göra en enkel google-sökning på “php framework”. De två översta resultaten var inga ramverk utan sidor som jämförde olika ramverk. Däremot var redan det tredje sökresultat ett ramverk, Laravel. Slim Framework och Symfony dök även upp längre ner på sidan.

På Google Trends är resultat också väldigt tydligt, Laravel är överlägset mest populärt. Därefter kommer Symfony och Codeigniter väldigt nära varandra. Efter det kommer CakePHP och sedan Zend.

På Coderseye.com gjorde de en undersökning bland sina prenumeranter där de fick över 7500 svar. Resultatet här stämde ganska bra överens med Google Trends. Laravel i toppen följt av Codeigniter och Symfony. Däremot kom Zend mycket högre upp här än i Google Trends. Yii 2 var här också nästan lika populärt som CakePHP.

Resultat verkar ganska tydligt, de tre mest populära ramverken är Laravel i toppen, följt av Codeigniter och Symfony. Resultatet stärks även av fler andra sidor som rangordnar ramverken likadant.

[Google Trends](https://trends.google.com/trends/explore?date=today%205-y&q=laravel,Symfony,Codeigniter,CakePHP,Zend)
[Coderseye.com](https://coderseye.com/best-php-frameworks-for-web-developers/)

###Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.
Jag har en väldigt bra erfarenhet av opensource-communities trots att jag själv kanske inte är den mest aktiva. Jag upplever att människor är väldigt hjälpsamma, vill dela med sig av sin kod och kunskap. En bra och stark community är viktigt för att ett opensource-projekt verkligen ska lyckas och inte dö ut.

Dbwebb är ju faktiskt ett exempel på en bra community. Du kan snabbt få hjälp via chatt eller forum. Dbwebb är nog en community jag själv kommer fortsätta att vara kvar i även efter avslutade studier.

###Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?
Jag gillar begreppet “en ramverkslös värld”, att slippa “stänga in dig” i ett ramverk där det finns alldeles för många moduler som du kanske inte använder. Däremot ser jag inget fel med att använda ramverk. Att ha allt “färdigt” från början gör ju faktiskt ditt jobb mycket enklare och bekvämare. Du slipper göra vissa val om vad du ska göra och hur du ska göra det.

Som sagt jag gillar begreppet, men samtidigt gillar ramverks-idén. Välj väg utifrån det som passar dig och ditt projekt.

###Hur gick dina förberedelser inför kommentarssystemet?
Jag har förberett mig mentalt och tänkt lite på databasstrukturen till ett Stackoverflow-system. En fråga skapas. En fråga kan ha flera kommentarer. Någon kopplingstabell mellan fråga och kommentarer. Frågor kan även ha svar och svaren kan ha kommentarer. En användare kopplas till varje fråga, svar och kommentar. Det är väl grundstrukturen till systemet. Sedan lite andra små saker runt omkring som till exempel kategorier, poäng, med mera. Jag har gamla moduler för användare och login som nog går att återanvända. Däremot skulle jag vilja skriva om och fixa till dem lite.



---



##Kmom02

###Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC? Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?
Kan inte säga att jag har några erfarenheter av MVC. Har hört talas om det innan och vetat på ett ungefär vad det innebär, dock aldrig använt det själv. Förutom artikeln på dbwebb, som jag tyckte var bra för att visa hur det fungerar inom webb-världen, så läste jag även en artikel på sitepoint.com. En helt okej artikel, men tycker den på dbwebb var bättre.

Den största fördelen jag ser är att det blir mycket lättare att dela upp koden för dig och/eller ditt team. Jag känner också att det faktiskt blir lättare att förstå, i alla fall när du väl har kommit in i tänket och lärt dig hur det fungerar.

###Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?
Det börjar klarna mer och mer. En artikel på https://scotch.io hjälpte mig att förstå det mer än bara videon och Wikipedia. Får fortsätta läsa om det och implementera det själv när jag kodar.

Som jag har förstått det så handlar SOLID om att skriva kod som är lättare att förstå, underhålla och utöka. Det ska vara många små klasser som endast har en uppgift och som är oberoende av varandra.

###Gick arbetet med REM servern bra och du lyckades integrera den i din me-sida?
Arbetet med REM-servern var inga problem. Tycker det var lätt att få den att fungera i min egna installation av Anax. Trots att det var en lätt uppgift så var den ändå bra. Den gav en ganska god inblick i hur man skriver i MVC-format, vilket underlättade kommentarsuppgfiten.

###Berätta om arbetet med din kommentarsmodul, hur långt har du kommit och hur tänker du?
För tillfället har jag gjort en prototyp där man kan skapa, redigera och ta bort kommentarer. Jag valde att jobba med sessions och inte direkt gå på databaser. Tar ett steg i taget då jag har en del andra saker att göra samtidigt. Jag fixade även till stylen lite det här kursmomentet då jag lade ner väldigt lite tid på det i föregående moment. Kanske inte syns så mycket, men det är en helt annan och bättre grund nu.




---



##Kmom03

Redovisningstext här.



---



##Kmom04

Redovisningstext här.



---



##Kmom05

Redovisningstext här.



---



##Kmom06

Redovisningstext här.



---



##Kmom10

Redovisningstext här.
