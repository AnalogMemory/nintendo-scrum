import { throttle } from 'frame-throttle'

(function () {
  const headerEl = document.querySelector('.header')

  const headerClassToggle = function () {
    const headerHeight = headerEl.offsetHeight
    const scrollTop = window.scrollY
    if (scrollTop > headerHeight) {
      headerEl.classList.add('collapsed')
    } else {
      headerEl.classList.remove('collapsed')
    }
  }

  if (headerEl) {
    headerClassToggle()
    const throttledCallback = throttle(headerClassToggle)
    window.addEventListener('scroll', throttledCallback)
  }
})()
