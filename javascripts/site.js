(function () {
  "use strict";

  var year = document.getElementById("year");
  if (year) {
    year.textContent = String(new Date().getFullYear());
  }

  function copyText(value) {
    var input = document.createElement("textarea");
    input.value = value;
    input.setAttribute("readonly", "");
    input.style.position = "fixed";
    input.style.opacity = "0";
    document.body.appendChild(input);
    input.select();

    var copied = false;
    try {
      copied = document.execCommand("copy");
    } catch (error) {
      copied = false;
    }
    document.body.removeChild(input);
    return copied;
  }

  var buttons = document.querySelectorAll("[data-copy]");
  for (var i = 0; i < buttons.length; i += 1) {
    buttons[i].addEventListener("click", function () {
      var button = this;
      var value = button.getAttribute("data-copy") || "";

      var original = button.textContent;
      if (copyText(value)) {
        button.textContent = "Copied";
        window.setTimeout(function () {
          button.textContent = original;
        }, 1600);
      } else {
        button.textContent = "Select & copy";
      }
    });
  }
}());
