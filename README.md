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


.h2 Referências pertinentes

.h3 Schema.org
http://schema.org/