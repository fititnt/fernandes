.h1 Reposorio de trabalho para testes com Twitter Bootstrap

.h2 Acesso a maquina local de testes

Rede local: http://192.168.1.5/f/ (IP fixo, depende apenas da maquina estar ligada, e computador estar dentro da rede local)

Rede externa : http://201.37.65.126:5581/f/ (IP dinamico porem a porta é a mesma, alterar conforme o caso. Depende de desbloquear o Firewall local)

.h2 Ferramentas para análise automática
Usar modo de acesso do tipo rede externa

.h3 Validação HTML, versão 5
http://validator.w3.org

Idealmente, não deve haver erros de validação do documento HTML 

.h3 Validação CSS, versão 3
http://jigsaw.w3.org/css-validator/

Infelizmente, as CSS do Twitter Boostrap geram invalidação de diversas regras de CSS3, também em função de fallback. *Um exemplo de tal quantidade 
é 691*. Procurar não gerar erros adicionais aos que a própria biblioteca já gera

.h3 Google Rich Snippet Tool (Ferramenta de teste de dados estruturados)
http://www.google.com/webmasters/tools/richsnippets

.h3 Validador de Marcação do Bing
http://www.bing.com/toolbox/markup-validator (Requer registro)

.h3 Structured Data on the Web, Tool
http://linter.structured-data.org

.h3 Live Microdata
http://foolip.org/microdatajs/live/

.h2 Referências pertinentes

.h3 Schema.org
http://schema.org/

.h3 WebSchemas
http://www.w3.org/wiki/WebSchemas

.h3 Structured Data on the Web
http://structured-data.org

Otimos recursos sobre o tema

.h3 Microdata
http://diveintohtml5.info/extensibility.html

"The chapter on Microdata in the Dive into HTML5 book is a good introduction to the next generation of Microformats. Microdata is the newest addition to the structured data markup technologies, created in 2009, and is supported in HTML5."

.h3 Microformats
http://microformats.org/about

"The Microformats website is a good place to learn about the basics of the simplest way of publishing structured data on the Web. Microformats have been under development since 2004. The markup works in all versions of HTML and allows you to mark up basic concepts like people, places, events, recipes, and audio."

