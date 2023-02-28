// document.addEventListener('DOMContentLoaded', function() {
    
//     eventListeners();
//     darkMode();
//     checkBlackBackground();
// }); 

// function darkMode() {
//     //Leer preferencias de usuario
//     const preferenciaDarkMode = window.matchMedia('(prefers-color-scheme)');

//     // console.log(preferenciaDarkMode.matches);
//     if (preferenciaDarkMode.matches) {
//         document.body.classList.add('darkMode');
//     } else {
//         document.body.classList.remove('darkMode');
//     }

//     // Leer preferencias desde el nivel de sistema operativo
//     preferenciaDarkMode.addEventListener('change', function()  {
//         if (preferenciaDarkMode.matches) {
//             document.body.classList.add('darkMode');
//         } else {
//             document.body.classList.remove('darkMode');
//         }    
//     });
//     /*********/

//     //Funcionalidad de boton dark mode
//    const botonDarkMode = document.querySelector('.dark-mode-btn');

//    botonDarkMode.addEventListener('click', function() {
//         document.body.classList.toggle('darkMode');
//    });
// }

// function eventListeners() {
//     const mobileMenu = document.querySelector('.mobile-menu');

//     mobileMenu.addEventListener('click', navResposive);
// }

// function navResposive() {
//     const navegacion = document.querySelector('.navegacion');

//     if(navegacion.classList.contains('mostrar')) {
//         navegacion.classList.remove('mostrar');

//     } else {
//         navegacion.classList.add('mostrar');
//     }
// }

(function () {
    "use strict";
   
    document.addEventListener("DOMContentLoaded", function () {
      eventListeners();
      checkBlackBackground();
   
      darkMode();
    });
   
    function eventListeners() {
      let mobileMenu = document.querySelector(".mobile-menu");
      mobileMenu.addEventListener("click", showNavPopUP);
    }
   
    function showNavPopUP() {
      let navigation = document.querySelector(".navigation");
   
      navigation.classList.toggle("show");
    }
   
    function darkMode() {
      let btnDarkMode = document.querySelector(".dark-mode-btn");
   
      btnDarkMode.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        toggleCookie();
      });
    }
   
    // cookies
    function checkBlackBackground() {
      if (getValueCookie() == "true") {
        document.body.classList.toggle("dark-mode");
      }
    }
   
    function toggleCookie() {
      // if exists
      if (document.cookie.match(/^(.*;)?\s*dark-mode\s*=\s*[^;]+(.*)?$/)) {
        // get values
        if (getValueCookie() == "true") {
          setCookie("dark-mode", false, 30);
        } else {
          setCookie("dark-mode", true, 30);
        }
      } else {
        // this means, is the first time u press the button, and white is default
        setCookie("dark-mode", true, 30);
      }
    }
   
    function setCookie(cName, cValue, expDays) {
      let date = new Date();
      date.setTime(date.getTime() + expDays * 24 * 60 * 60 * 1000);
      const expires = "expires=" + date.toUTCString();
      document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
    }
   
    function getValueCookie() {
      return (document.cookie.match(
        /^(?:.*;)?\s*dark-mode\s*=\s*([^;]+)(?:.*)?$/
      ) || [, null])[1];
    }
  })();
