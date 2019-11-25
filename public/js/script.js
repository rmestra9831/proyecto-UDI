/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// INICIA LA ANIMACIÓN DEL CAMPO CARGAR
$(document).ready(function () {
  bsCustomFileInput.init();
}); // activando tooltips

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
}); //imports

window.setTimeout(function () {
  $(".alert").fadeTo(500, 0).slideUp(500, function () {
    $(this).remove();
  });
}, 4000); //deshabilitar el modal delcard 

btn = $("[class*='.unrecive']");
btn.click(function () {
  //funciones para la seccion de ADMINISTRADOR
  if ($(this).attr("id") == $(this).attr("valid")) {
    $(this).addClass('hide');
  }
}); //validadcion del campo numerico numero

/* $('#number_contacto').keydown(function (e) {
   if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
     (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
     (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
     (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
     (e.keyCode >= 35 && e.keyCode <= 39)) {
     return;
   }

   if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
     e.preventDefault();
   }
 });*/
//formato del numero

var backspacePressedLast = false;
$(document).on('keydown', '#number_contacto', function (e) {
  var currentKey = e.which;

  if (currentKey === 8 || currentKey === 46) {
    backspacePressedLast = true;
  } else {
    backspacePressedLast = false;
  }
});
$(document).on('input', '#number_contacto', function (e) {
  if (backspacePressedLast) return;
  var $this = $(e.currentTarget),
      currentValue = $this.val(),
      newValue = currentValue.replace(/\D+/g, ''),
      formattedValue = formatToTelephone(newValue);
  $this.val(formattedValue);
});

function formatToTelephone(str) {
  var splitString = str.split(''),
      returnValue = '';

  for (var i = 0; i < splitString.length; i++) {
    var currentLoop = i,
        currentCharacter = splitString[i];

    switch (currentLoop) {
      case 0:
        returnValue = returnValue.concat('(');
        returnValue = returnValue.concat(currentCharacter);
        break;

      case 2:
        returnValue = returnValue.concat(currentCharacter);
        returnValue = returnValue.concat(') ');
        break;

      case 5:
        returnValue = returnValue.concat(currentCharacter);
        returnValue = returnValue.concat('-');
        break;

      default:
        returnValue = returnValue.concat(currentCharacter);
    }
  }

  return returnValue;
} //SETEAR EL CAMPO DEL TEXTAREA AL UN INPUT PARA ENVIAR LA INFORMACIÓN


$("#responText").keyup(function () {
  var texto = $(this).val();
  $('#btnedit').removeAttr('disabled');
  $('#seteoTextArea').val(texto);
}); //validacion del campo descripcion
// ***
// Limit input length if `data-word-limit` attr present.
// append a countdown block after input and record key inputs.
// retest count if delete press (keys 8 and 46).
// change color status as approach limit untill met then disable.
//

var wordLimit = function wordLimit(element) {
  var thisLimit = element.attr('data-word-limit');
  var thisParent = element.closest('div');
  var currentLetters = element.val().length ? element.val().length : 0;
  element.attr('maxlength', thisLimit);
  element.after('<div class="form__word-limit"><i>' + currentLetters + '</i>/' + thisLimit + '</div>');
  element.on('keypress', function (e) {
    if (currentLetters == thisLimit - 1) {
      thisParent.find('.form__word-limit').addClass('met');
      thisParent.find('.form__word-limit').removeClass('warn');
    } else if (currentLetters == thisLimit) {
      thisParent.find('.form__word-limit i').text(thisLimit);
      thisParent.find('.form__word-limit').removeClass('warn');
      thisParent.find('.form__word-limit').addClass('met');
      e.preventDefault();
      return;
    } else if (currentLetters > thisLimit / 5 * 4 && currentLetters < thisLimit) {
      thisParent.find('.form__word-limit').addClass('warn');
      thisParent.find('.form__word-limit').removeClass('met');
    }

    currentLetters = element.val().length + 1;
    thisParent.find('.form__word-limit i').text(currentLetters);
  });
  element.on('keyup', function (e) {
    if (e.keyCode == 8 || e.keyCode == 46) {
      if (currentLetters > 0) {
        currentLetters = element.val().length;
        thisParent.find('.form__word-limit i').text(currentLetters);
      }

      if (currentLetters > thisLimit / 5 * 4 && currentLetters < thisLimit) {
        thisParent.find('.form__word-limit').addClass('warn');
        thisParent.find('.form__word-limit').removeClass('met');
      } else {
        thisParent.find('.form__word-limit').removeClass('met');
        thisParent.find('.form__word-limit').removeClass('warn');
      }
    }
  });
};

$('input[data-word-limit], textarea[data-word-limit]').each(function () {
  wordLimit($(this));
}); //Seleccionando las opciones de select motivos para mostrar en asunto 

var asunto = document.getElementById('asunto');
var select_mot_type = document.getElementById('type_motivo');
var select_mot = document.getElementById('motivo_select');
$hidden = document.createAttribute('hidden');
$disabled = document.createAttribute('disabled');
/** select De los tipos de motivos */

/** ocultando el campo de motivos al no selecccionar nada */

$(select_mot_type).change(function (e) {
  var selectedOption_mot_type = this.options[select_mot_type.selectedIndex];

  if (selectedOption_mot_type.value != '') {
    $('#motivo_select').removeAttr('disabled');

    if (selectedOption_mot_type.value == 2) {
      select_mot.value = '';
      opt2 = $("[vtypemotivo='2']").show();
      opt1 = $("[vtypemotivo='1']").hide();
      asunto.value = '';
    } else {
      select_mot.value = '';
      opt1 = $("[vtypemotivo='1']").show();
      opt2 = $("[vtypemotivo='2']").hide();
      asunto.value = '';
    }
  } else {
    select_mot.value = 1;
    asunto.value = '';
    opt1 = $("[vtypemotivo='1']").hide();
    opt2 = $("[vtypemotivo='2']").hide();
    opt3 = $("[vtypemotivo='3']").hide();
    asunto.setAttributeNode($disabled);
    select_mot.setAttributeNode($disabled);
  }
});
/** Selec del motivo */

$(select_mot).change(function (e) {
  var selectedMotivoOption = this.options[select_mot.selectedIndex];

  if (selectedMotivoOption.value == 23) {
    asunto.value = '';
    $(asunto).removeAttr('disabled');
  } else {
    $disabled = document.createAttribute('disabled');
    asunto.setAttributeNode($disabled);
    asunto.value = '';
    asunto.value = selectedMotivoOption.text;
  }
}); //ACTIVANDO EL SPINNER AL GUARDAR UN RADICADO

$('form').submit(function (event) {
  $('.container_spinner').fadeIn();
  $('#exampleModal').hide();
  $('.modal-backdrop').hide();
  $('.container_spinner').removeAttr('hidden');
}); //activar el box-shadown de la cabecera

$('.cont-panel').scroll(function () {
  $scrolltop = $('.cont-panel').scrollTop();

  if ($scrolltop > 15) {
    $('.title-content').addClass('b-show-buttom');
  } else if ($scrolltop < 15) {
    $('.title-content').removeClass('b-show-buttom');
  }

  console.log($scrolltop);
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/script.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\proyecto-UDI\resources\js\script.js */"./resources/js/script.js");


/***/ })

/******/ });