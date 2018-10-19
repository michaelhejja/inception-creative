// import `.scss` files
import './styles/index.scss';

// Import polyfill
import 'nodelist-foreach-polyfill';

import SiteHeader from './components/site-header';
import VideoModal from './components/video-modal';
import FullscreenTitle from './content-layers/fullscreen-title';
import Contact from './content-layers/contact';
import VideoGallery from './content-layers/video-gallery';

const header = document.querySelector('.site-header');
(() => new SiteHeader(header))();

const vidmodal = document.querySelector('.video-modal');
(() => new VideoModal(vidmodal))();

// Custom Content Layers
const fullscreenNodeList = document.querySelectorAll('.fullscreen-title');
let i = 0;

for (i = 0; i < fullscreenNodeList.length; i += 1) {
  /* eslint-disable-next-line no-loop-func */
  (() => new FullscreenTitle(fullscreenNodeList[i]))();
}

const contactNodeList = document.querySelectorAll('.contact');
let j = 0;

for (j = 0; j < contactNodeList.length; j += 1) {
  /* eslint-disable-next-line no-loop-func */
  (() => new Contact(contactNodeList[j]))();
}

const videoGalleryNodeList = document.querySelectorAll('.video-gallery');
let k = 0;

for (k = 0; k < videoGalleryNodeList.length; k += 1) {
  /* eslint-disable-next-line no-loop-func */
  (() => new VideoGallery(videoGalleryNodeList[k]))();
}
