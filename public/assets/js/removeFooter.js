window.addEventListener("DOMContentLoaded", function() {
  let footer = document.querySelector("#footer");
  if (footer) {
    footer.parentNode.removeChild(footer);
  }
});