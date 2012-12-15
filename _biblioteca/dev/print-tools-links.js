/**
 * Arquivo que imprime aonde for adicionado uma lista de links para ferramentas que auditoria de código. Não possui dependências com bibliotecas
 * Javascript
 * @example
 * @code
 * <script src="../_biblioteca/dev/print-tools-links.js"></script>
 * @endcode
 */

document.write('<a target="_blank" href="http://www.google.com/webmasters/tools/richsnippets?url=' + location.href + '">Google Snippet</a>');
document.write(' | ');
document.write('<a target="_blank" href="http://gsnedders.html5.org/outliner/process.py?url=' + location.href + '">Outline</a>');
document.write(' | ');
document.write('<a target="_blank" href="http://validator.w3.org/check?uri=' + location.href + '">HTML</a>');
document.write(' | ');
document.write('<a target="_blank" href="http://jigsaw.w3.org/css-validator/validator?uri=' + location.href + '">CSS</a>');