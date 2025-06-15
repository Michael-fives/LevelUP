var carousel = document.querySelector('.carousel');
var items = carousel.querySelectorAll('.carousel-item');
var prevButton = document.querySelector('.prev-button');
var nextButton = document.querySelector('.next-button');

var index = 0;
var interval;

function showImage(i) {
  items.forEach((item, idx) => {
    item.classList.toggle('active', idx === i);
  });
  updateSidePreviews();
}

function nextImage() {
  index = (index + 1) % items.length;
  showImage(index);
}

function prevImage() {
  index = (index - 1 + items.length) % items.length;
  showImage(index);
}

function resetInterval() {
  clearInterval(interval);
  interval = setInterval(nextImage, 7000);
}

prevButton.addEventListener('click', () => {
  prevImage();
  resetInterval();
});

nextButton.addEventListener('click', () => {
  nextImage();
  resetInterval();
});

interval = setInterval(nextImage, 7000);
showImage(index); // Inicializar la primera imagen

function updateSidePreviews() {
  let prevIndex = (index - 1 + items.length) % items.length;
  let nextIndex = (index + 1) % items.length;

  let prevImgSrc = items[prevIndex].querySelector('img').getAttribute('src');
  let nextImgSrc = items[nextIndex].querySelector('img').getAttribute('src');

  let previewLeft = document.querySelector('.preview-left img');
  let previewRight = document.querySelector('.preview-right img');

  previewLeft.setAttribute('src', prevImgSrc);
  previewRight.setAttribute('src', nextImgSrc);
}