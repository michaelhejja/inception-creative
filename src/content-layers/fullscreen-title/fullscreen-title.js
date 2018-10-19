import { scrollTo } from '../../util/scrollTo';

export default class FullscreenTitle {
  constructor(el) {
    this.el = el;
    this.button = el.querySelector('.fullscreen-title__scroll-button');
    this.bg = el.querySelector('.fullscreen-title__image');

    this.onBtnClick = this.onBtnClick.bind(this);
    this.checkScrollPosition = this.checkScrollPosition.bind(this);

    this.button.addEventListener('mousedown', this.onBtnClick);

    window.requestAnimationFrame(this.checkScrollPosition);

    this.texts = el.querySelectorAll('.fullscreen-title__text');

    let t = 300;
    this.texts.forEach((text) => {
      setTimeout(() => {
        text.classList.add('visible');
      }, t);
      t += 100;
    });
  }

  onBtnClick() {
    const scrollPos = this.el.offsetTop + this.el.clientHeight;
    scrollTo(scrollPos, 800);
  }

  checkScrollPosition() {
    window.requestAnimationFrame(this.checkScrollPosition);

    const rect = this.el.getBoundingClientRect();

    if (rect.bottom > 0) {
      const offset = 0 - (rect.top * 0.5);
      this.bg.style.transform = `translateY(${offset}px) translateZ(0)`;
    }
  }
}
