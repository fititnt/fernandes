# Pesquisa de técnicas aplicadas para projetos Web

## O que possui

### Pasta 3rd/
Pasta para conter exemplos de integração de plugins de terceiros

### Pasta backend/
Pasta para conter pacotes que requerem codigo para ser interpretado por um servidor e que servem como apoio para realizar tarefas que não são possíveis em HTML e Javascript puros

### Pasta exemplo/
Exemplos de projetos mais próximos do real usando técnicas estudadas

### Pasta ola/
Possui apenas um "ola mundo" em Twitter Boostrap

### Pasta poc/
Proof of concept (prova de conceito). Usada para demonstrar alguma capacidade ou habilidade geral. Geolocation, Offline, etc.

### Pasta public_html/
Pasta para conter arquivos que intencionalmente devem ficar disponibilizados de modo online

### Pasta refactoring/
Refratoração de projetos, isto é, reescrever de outro modo algo que já existe por questões didaticas ou de demonstrar para futura alteração

### Pasta schema/
Exemplos de Schemas do http://schema.org

### Pasta wai-aria/
Exemplos referentes a WAI-ARIA (Web Accessibility Initiative - Accessible Rich Internet Applications). Saiba mais em http://www.w3.org/WAI/intro/aria.php

## Acesso a maquina local de testes

Rede local: http://192.168.1.5/f/ (IP fixo, depende apenas da maquina estar ligada, e computador estar dentro da rede local)

Rede externa : http://201.37.65.126:5581/f/ (IP dinamico porem a porta é a mesma, alterar conforme o caso. Depende de desbloquear o Firewall local)

### Servidor de testes na web

Dominio http://fernandes.lab.fititnt.org ("privado", sem intenção de ser indexado), http://pub.lab.fititnt.org ("indexavel", pasta public_html), 

Usuario SSH: jflab

Senha usuario: hrtmP28C

## Ferramentas para análise automática
Usar modo de acesso do tipo rede externa

### Validação HTML, versão 5
http://validator.w3.org

Idealmente, não deve haver erros de validação do documento HTML 

### Validação CSS, versão 3
http://jigsaw.w3.org/css-validator/

Infelizmente, as CSS do Twitter Boostrap geram invalidação de diversas regras de CSS3, também em função de fallback. *Um exemplo de tal quantidade 
é 691*. Procurar não gerar erros adicionais aos que a própria biblioteca já gera

### Validação Cache Manifest
http://manifest-validator.com/

Validador de arquivo manifesto (para sites funcionarem offline)

### Validação WCAG 2.0 (AccessMonitor)

http://www.acessibilidade.gov.pt/accessmonitor/

### Validação WCAG 1.0 (eXaminator)
http://www.acessibilidade.gov.pt/webax/examinator.php

### Google Rich Snippet Tool (Ferramenta de teste de dados estruturados)
http://www.google.com/webmasters/tools/richsnippets

### Validador de Marcação do Bing
http://www.bing.com/toolbox/markup-validator (Requer registro)

### Structured Data on the Web, Tool
http://linter.structured-data.org

### Live Microdata
http://foolip.org/microdatajs/live/

## Referências pertinentes

### Schema.org
http://schema.org/

### WebSchemas
http://www.w3.org/wiki/WebSchemas

### Structured Data on the Web
http://structured-data.org

Otimos recursos sobre o tema

### Microdata
http://diveintohtml5.com.br/extensibility.html (em português) 

### Rich snippets (microdados, microformatos, RDFa, e marcador de dados)
http://support.google.com/webmasters/bin/answer.py?hl=pt-BR&answer=99170

"The chapter on Microdata in the Dive into HTML5 book is a good introduction to the next generation of Microformats. Microdata is the newest addition to the structured data markup technologies, created in 2009, and is supported in HTML5."

### Microformats
http://microformats.org/about

"The Microformats website is a good place to learn about the basics of the simplest way of publishing structured data on the Web. Microformats have been under development since 2004. The markup works in all versions of HTML and allows you to mark up basic concepts like people, places, events, recipes, and audio."

### WAI-ARIA
WAI-ARIA 1.0 Authoring Practices: http://www.w3.org/WAI/PF/aria-practices (Excelente, *deve* ser lido)

Infografo: http://www.w3.org/TR/wai-aria/rdf_model.svg

Exemplos de código acessível WAI-ARIA http://www.oaa-accessibility.org/examples/

Adding WAI-ARIA Landmarks to Joomla: http://pbwebdev.com/blog/adding-wai-aria-landmarks-to-joomla#.ULWmRod9I2w

Using WAI ARIA Landmark Roles: http://www.paciellogroup.com/blog/2010/10/using-wai-aria-landmark-roles/

