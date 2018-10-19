export default class Contact {
  constructor(el) {
    this.el = el;
    this.bg = el.querySelector('.contact__image');

    this.checkScrollPosition = this.checkScrollPosition.bind(this);

    window.requestAnimationFrame(this.checkScrollPosition);
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
