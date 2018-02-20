(function () {
  const menuContainer = document.querySelector('.main-navigation')
  const mobileMenuButton = menuContainer.querySelector('button')
  const menu = menuContainer.querySelector('#menu-primary')

  const toggleMenu = function (e) {
    e.preventDefault()
    const mobileMenu = this
    if (mobileMenu.classList.contains('toggled')) {
      menu.classList.remove('active')
      mobileMenu.classList.remove('toggled')
    } else {
      menu.classList.add('active')
      mobileMenu.classList.add('toggled')
    }
  }
  mobileMenuButton.addEventListener('click', toggleMenu)
})()
