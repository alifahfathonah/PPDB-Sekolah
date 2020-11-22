const more = document.getElementById("more");
const sidebar = document.getElementById("sidebar");
const sidebarOverlay = document.getElementById("sidebar-overlay");

more.onclick = (e) => {
  const sidebarActive = sidebar.className.match("active");
  const sidebarOverlayActive = sidebarOverlay.className.match("active");

  if (!sidebarActive && !sidebarOverlayActive) {
    sidebar.classList.add("active");
    sidebarOverlay.classList.add("active");
  }
};

// dismiss.onclick = (e) => {
//     const sidebarActive = sidebar.className.match("active");
//     const sidebarOverlayActive = sidebarOverlay.className.match("active");

//     if (sidebarActive && sidebarOverlayActive) {
//         sidebar.classList.remove("active");
//         sidebarOverlay.classList.remove("active");
//     }
// };

sidebarOverlay.onclick = () => {
  const sidebarActive = sidebar.className.match("active");
  const sidebarOverlayActive = sidebarOverlay.className.match("active");

  if (sidebarActive && sidebarOverlayActive) {
    sidebar.classList.remove("active");
    sidebarOverlay.classList.remove("active");
  }
};

