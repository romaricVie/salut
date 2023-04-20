

window.addEventListener("DOMContentLoaded", function() {
  let header = document.querySelector("#main__header"), sideMenu = document.querySelector("#sideMenu");
  if (header) {
    header.parentNode.removeChild(header);
  }
  if (sideMenu) {
    sideMenu.parentNode.removeChild(sideMenu);
  }
});