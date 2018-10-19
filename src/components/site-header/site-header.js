import { scrollTo } from '../../util/scrollTo';

export default class SiteHeader {
  constructor(el) {
    this.document = document;
    this.el = el;
    this.buttons = el.querySelectorAll('.site-header__navigation-button');
    this.hasScrollCheck = false;
    this.hamburger = document.querySelector('.site-header__hamburger-btn');
    this.navigation = document.querySelector('.site-header__navigation');
    this.currentScrollPos = 0;

    this.buttons.forEach((button) => {
      button.addEventListener('mousedown', this.onBtnClick);
      if (button.getAttribute('data-target').substr(0, 1) === '#') {
        this.hasScrollCheck = true;
      }
    });

    // Binding methods to the class
    this.checkScrollPosition = this.checkScrollPosition.bind(this);
    this.toggleOpen = this.toggleOpen.bind(this);
    this.closeMenu = this.closeMenu.bind(this);

    if (this.hasScrollCheck) {
      window.requestAnimationFrame(this.checkScrollPosition);
    } else {
      this.el.classList.add('static');
    }

    this.hamburger.addEventListener('click', this.toggleOpen);
    // document.addEventListener('keydown', SiteHeader.onKeyDown);
  }

  onBtnClick() {
    this.classList.add('clicked');
    const target = this.getAttribute('data-target');

    if (target.substr(0, 1) === '#') {
      const domEl = document.querySelector(`${target}`);
      const yPos = domEl.offsetTop;
      scrollTo(yPos, 800);
    } else {
      window.location = target;
    }
  }

  static onKeyDown(e) {
    const keyCode = e.keyCode || e.which;
    if (keyCode === 9) {
      const buttons = document.querySelectorAll('.site-header__navigation-button');
      buttons.forEach((button) => {
        button.classList.remove('clicked');
      });
    }
  }

  checkScrollPosition() {
    window.requestAnimationFrame(this.checkScrollPosition);
    const top = window.pageYOffset || document.documentElement.scrollTop;

    if (top > 0) {
      /* eslint-disable-next-line no-lonely-if */
      if (!this.el.classList.contains('visible')) {
        this.el.classList.add('visible');
      }

      this.buttons.forEach((button) => {
        const target = button.getAttribute('data-target');
        if (target.substr(0, 1) !== '#') {
          return;
        }
        const domEl = document.querySelector(`${target}`);
        const rect = domEl.getBoundingClientRect();

        if (rect.top < 20) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }

        if (rect.bottom < 20) {
          button.classList.remove('active');
        }
      });
    } else {
      /* eslint-disable-next-line no-lonely-if */
      if (this.el.classList.contains('visible')) {
        this.el.classList.remove('visible');
      }
    }

    if (this.currentScrollPos !== top) {
      this.closeMenu();
    }

    this.currentScrollPos = top;
  }

  toggleOpen() {
    this.hamburger.classList.toggle('open');
    this.navigation.classList.toggle('open');
  }

  closeMenu() {
    this.hamburger.classList.remove('open');
    this.navigation.classList.remove('open');
  }
}
