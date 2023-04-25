## Espiar als webmasters

Volem crear una aplicació web que serveixi per espiar les pàgines webs i els seus creadors. Utilitzarem el seguiment dels identificadors com Google Analytics, Google Adsense, urls indexades a Google i Bing, ips dels servidors per poder trobar vinculacions entre els propietaris de diferents webs.

**Idea:**

La idea és d’en Dídac Anton, un noi de 17 anys que ha creat una eina semblant pel seu ús propi.

[seo_torch](https://twitter.com/seo_torch)

**Tweets d’on trèiem les idees:**

[https://twitter.com/seo_torch/status/1637548580201267201](https://twitter.com/seo_torch/status/1637548580201267201)

[https://twitter.com/seo_torch/status/1637222090989248514](https://twitter.com/seo_torch/status/1637222090989248514)

**Reunió inicial:**

- Reunió entre els membres per definir el valor afegit que aportem, indicadors rellevant, possibles ampliacions.
- Elecció de les tecnologies.
- Creació dels equips. (No val els de l'última fila junts)

> Idea del profe: Penso en una web amb Laravel on puguem cercar el nom d’un domini o paraula clau que ens interessi. Que surti un llistat de dominis
Tota la informació de la web es crearà amb agents/scripts amb Python que aniran poblant i actualitzant la base de dades de la web utilitzant consultes a APIs sobre aquesta. Podem utilitzar màquines virtuals d'Izard per correr els scripts.
> 

**Indicadors**

“columnes de la taula de la DB”

```php
domain
adsense_code
analytics_code
whois_raw
expired_date
dns
domain_ip
discovered
cms_principal
```

[https://github.com/samu-am/espiar_websmasters](https://github.com/samu-am/espiar_websmasters)

# Tasques:

## Scrapejar competencia

Altres web utilitzen la mateixa metodologia que nosaltres, podem processar la seva informació.

[https://site-overview.com/website-report-search/google-adsense-id-acc/3344108075654010](https://site-overview.com/website-report-search/google-adsense-id-acc/3344108075654010)

### Crear backend

(Samuel, Oriol)

tindrà 3 taules

domain, analytics, adsense

### Crear API

- 2 endpoints per informar dels codis de adsense (Ivan)
    
    ```csharp
    POST domain.com/api/adsenserequest
    Response:
    		{"domain" : "levelup.com"}
    
    POST domain.com/api/adsenseupdate
    Request:
    {"domain": "levelup.com",
    	"adsense_code" : "ca-pub-9723404838950731"}
    ```
    
- 2 endpoints per informar dels codis de analytics (David)
    
    ```csharp
    POST domain.com/api/analiticsrequest
    Response:
    		{"domain" : "meneame.net"}
    
    POST domain.com/api/analiticsupdate
    Request:
    {"domain": "meneame.net",
    	"adsense_code" : "UA-229718-1"}
    ```
    
- 2 endpoints per guardar el raw del whois (Camilo)

```csharp
POST domain.com/api/whoisrequest
Response:
		{"domain" : "pepe.com"}

POST domain.com/api/whoisupdate
Request:
{"domain": "pepe.com",
	"whois_raw" : "BLOB"}
```

- 2 endpoints per preguntar la IP d’un domini (Jordi)

```csharp
POST domain.com/api/iprequest
Response:
		{"domain" : "pepe.com"}

POST domain.com/api/ipupdate
Request:
{"domain": "pepe.com",
	"ip" : "123.123.123.123"}
```

- 2 endpoints per detectar el CMS utilitzat (Kevin)

```csharp
POST domain.com/api/cmsrequest/2
Response:
		{"pepe.com","manolo.es"}

POST domain.com/api/cmsupdate
Request:
{"domain": "pepe.com",
	"cms" : "Wordpress",
	"version": "6.12"}
```

- 2 endpoints per detectar el plugins de Wordpress(Eric)

```csharp
POST domain.com/api/wordpressrequest
Response:
		{"pepe.com"}

POST domain.com/api/wordpressupdate
Request:
{"domain": "pepe.com",
	"cms" : "Wordpress",
	"theme" : "elementor-pro",
	"plugins" : "hellodolly","gutenberg"}
```

### Descobrir dominis

- Cercar a Google paraules a partir d’un diccionari. (Marc)
- 

### Descobrir codi analytics

- Obrir la pàgina inicial de la web i cercar si existeix un codi de Google analytics (Judit)

### Descobrir codi adsense

- Obrir la pàgina inicial de la web i cercar si existeix un codi de Google adsense (Anna)

### Guardar tot el Whois del domini

- Demanar el whois del domini i retornar-lo al servidor (Carlos)
- Extreure data d’expiració del domini (Daniel)

### Consultar IP del servidor

- Demanar el domini d’una web i consultar la IP del servidor (Lluis)
- Resoldre el DNS del domini (Xavier)

### Consultar el CMS

- Demanar un llistat de dominis, entre 1 i 10 i identificar els CMS principals i les seves versions.
- Identificar els CMS:
    - Wordpress(Joel)
    - Drupal(Aleix)
    - Joomla(Ashutosh)
    - Prestashop(Ernest)
    - itentificar plugins de Wordpress (Angel)
