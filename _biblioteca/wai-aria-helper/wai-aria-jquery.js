
var WaiAria = {};
/**
 * Classe de ajuda para adicionar WAI-ARIA roles em documentos
 * 
 * @example
 * @code
 * $(document).ready(function() {
 *   WaiAria.roles({'#topo':'banner', '#conteudo': 'main'})
 * });
 * @endcode
 **/
WaiAria = (function () {
  'use strict';

  // Private variables
  var $ = window.jQuery;

  // Public
  return {
    /**
     * Define atributo ROLE de um elemento baseado em ID ou um seletor jQuery
     * @param  string  el    Seletor jQuery do elemento
     * @param  string  role  WAI-ARIA role
     * 
     * @example
     * @code
     * WaiAria.role('#topo', 'banner')
     * @endcode
     */
    role: function (el, role) {
      $(el).attr("role", role);
    },
    
    /**
     * Define atributo ROLE de uma coleção de elementos baseado em ID ou um seletor jQuery
     * @param  object  elsRoles  Object contendo padrao seletor jQuery igual a WAI-ARIA role
     * @example
     * @code
     * WaiAria.roles({'#topo':'banner', '#conteudo': 'main'})
     * @endcode
     */
    roles: function (elsRoles) {
      $.each(elsRoles, function(el, role) {
        WaiAria.role(el, role);
      });
    }
  };
}());