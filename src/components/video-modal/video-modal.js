import Player from '@vimeo/player';

export default class VideoModal {
  constructor(el) {
    this.el = el;
    this.btnClose = el.querySelector('.video-modal__close');
    this.fade = el.querySelector('.video-modal__fade');

    this.onBtnClick = this.onBtnClick.bind(this);

    this.btnClose.addEventListener('mousedown', this.onBtnClick);
    this.fade.addEventListener('mousedown', this.onBtnClick);
  }

  onBtnClick() {
    this.el.classList.remove('visible');
    window.player.destroy();
  }

  static openModal(videoUrl) {
    const modal = document.querySelector('.video-modal');
    const container = modal.querySelector('.video-modal__container');

    window.player = new Player('vimeo-player', {
      id: videoUrl,
      width: container.clientWidth,
      muted: true,
      playsinline: false,
    });

    window.player.play();

    // video.src = videoUrl;
    // video.load();
    modal.classList.add('visible');
  }
}
