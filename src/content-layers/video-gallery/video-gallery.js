/* eslint-disable class-methods-use-this */
import VideoModal from '../../components/video-modal';

export default class VideoGallery {
  constructor(el) {
    this.items = el.querySelectorAll('.video-gallery__item');
    this.titles = el.querySelectorAll('.video-gallery__title');

    this.items.forEach((item) => {
      item.addEventListener('mousedown', this.onBtnClick);
    });

    this.titles.forEach((title) => {
      title.addEventListener('mousedown', this.onBtnClick);
    });
  }

  onBtnClick() {
    const vidUrl = this.getAttribute('data-video');
    VideoModal.openModal(vidUrl);
  }
}
