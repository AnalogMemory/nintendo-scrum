import Rellax from 'rellax'
import Enquire from 'enquire.js'

(function () {
  const parallaxImage = document.querySelector('.rellax')

  if (parallaxImage) {
    Enquire.register('screen and (min-width:640px)', {
      match: function () {
        const rellax = new Rellax('.rellax', { // eslint-disable-line no-unused-vars
          speed: -8
        })
      }
    })
  }
})()
