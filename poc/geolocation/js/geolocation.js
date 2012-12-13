/**
 * Classe para gerenciar geolocalização
 * Sem dependências com bibliotecas externas
 * @author: Emerson Rocha Luiz
 * 
 * @example
 * @code
 * Geolocation.init();
 * console.log(Geolocation.pos()); // Retorna um objeto com dados da localização
 * @endcode
 */

var Geolocation = {};

Geolocation = (function () {
  'use strict';

  // Private variables
  var data = {}, // Geoposition Coordinates Object
  opt = {},
        
  getCurrentPosition = function() {
    navigator.geolocation.getCurrentPosition(setPosition,setError);
  },
        
  setError = function(error) {
    var result = null;
    switch(error.code) 
    {
      case error.PERMISSION_DENIED:
        result = "User denied the request for Geolocation."
        break;
      case error.POSITION_UNAVAILABLE:
        result = "Location information is unavailable."
        break;
      case error.TIMEOUT:
        result = "The request to get user location timed out."
        break;
      case error.UNKNOWN_ERROR:
        result = "An unknown error occurred."
        break;
    }
    if(result) {
      data.error.exist = true;
      data.error.description = result;
    }
  },
  setPosition = function(pos) {
    data.position = pos.coords;
    data.ok = true;
  }
  ;
        
  opt.cache = 0; // 0 nao inicializado, -1 nunca cachear, 1 forcar cache
  data.position = {};
  data.error = {};
  data.loop = 0;
        
  // Private methods

  //public
  return {
    
    /**
     * Inicializa
     */
    init: function () {
      getCurrentPosition();
      if (opt.cache !== -1) {
        opt.cache = 1;
      }
    },
    
    /**
     * Retorna false se nao houve erros, e uma string com descricao de erro caso exista
     */
    error: function () {
      if (!data.error.exists) {
        return false;
      } else {
        return data.error.description;
      }
    },
    
    /**
     * Retorna posicao
     */
    pos: function () {
      var start = null, loop = 0, i = 0;
      // Caso nao tenha sido inicializado, ou haja interesse em nao cachear
      if (opt.cache < 1) {
        Geolocation.init();
      }

      // Sleep forcado. Normalmente nao deveria ser chamado pos sem garantir que esteja ok
      while (!data.ok && data.loop < 10) {
        start = new Date().getTime();
        for (i = 0; i < 1e7; i += 1) {
          if ((new Date().getTime() - start) > 200){
            break;
          }
        }
        data.loop += 1;
      }
      data.loop = 0;
      
      return data.position;
    },
    /**
     * Retorna false se nao houve erros, e uma string com descricao de erro caso exista
     */
    status: function () {
      if (data.ok) {
        return 1; // Resultado esta pronto
      } else if (data.error.exists) {
        return -1; // Houve algum erro
      } else {
        return 0; // Aguardando resultado
      }
    }
  };
}());

