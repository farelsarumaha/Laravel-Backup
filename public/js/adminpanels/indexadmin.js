const menuIconButton = document.querySelector("[menu-button]")
const sidebar = document.querySelector("[list-menu-btn]")

menuIconButton.addEventListener("click", () => {
  sidebar.classList.toggle("open")
})
