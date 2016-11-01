
##Requirements analysis
###Client Requirements:  
- User identification: by a mobile phone or by a tag (QR, RFID, beacon,...)  
- Link social profiles. (Fetch user information from facebook, twitter etc.)  
- Get preferences from social profiles.   
- Recommend in a smart way resources of interest, nearly available (e.g., shops, parks, railway stations, memorials, etc.)  

##Project description
Application will be a Web suite (platform + client) able to expose and recommend
in a smart way resources of interest, nearly available – examples: known people + FOAF graph, common places 
(e.g., shops, parks, railway stations, memorials, etc.), guiding info, 
and many others. Each user will be uniquely identified by a personal device (e.g., mobile phone), by a tag (QR, RFID, beacon,...) or 
by social network profiles.
	The system will use different modules (extensions, micro-services) in order to expand 
its capabilities – examples: a module for sending alerts about the availability of a table at the favorite 
restaurant in the neighborhood, a module which signals the presence of a group of 
friends/colleagues in the same shopping center, a module able to call cheap taxis or show 
tram routes based on previous experience with public transportation, etc. 
 
Various queries will be performed via a SPARQL endpoint (e.g knowledge sources like DBpedia and/or Wikidata).

## Diagrams
### State Chart
![State Chart](/diagrams/state-chart.png)

### Activity Chart
![Activity Chart](/diagrams/activity-chart.png)

### Class Char
![Class Chart](/diagrams/class_diagram_urer.png)

### Deployment Char
![Deployment Diagram](/diagrams/deployment_diagram.png)

### Usecase Char Register
![Usecase Diagram](/diagrams/register_use_case_diagram.jpg)

### Usecase Char Login
![Usecase Diagram](/diagrams/login_use_case_diagram.jpg)