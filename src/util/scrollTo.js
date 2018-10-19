/* eslint-disable-next-line import/prefer-default-export */
export function scrollTo(scrollPos, scrollDuration) {
  const cosParameter = (window.pageYOffset - scrollPos) / 2;
  let scrollCount = 0;
  let oldTimestamp = window.performance.now();

  function step(newTimestamp) {
    let tsDiff = newTimestamp - oldTimestamp;
    const moveStep = Math.round(scrollPos + cosParameter + cosParameter * Math.cos(scrollCount));

    if (tsDiff > 100) {
      tsDiff = 30;
    }

    scrollCount += Math.PI / (scrollDuration / tsDiff);

    // As soon as we cross over Pi, we're about where we need to be
    if (scrollCount >= Math.PI) {
      window.scrollTo(0, scrollPos);
      return;
    }

    window.scrollTo(0, moveStep);
    oldTimestamp = newTimestamp;
    window.requestAnimationFrame(step);
  }

  window.requestAnimationFrame(step);
}
