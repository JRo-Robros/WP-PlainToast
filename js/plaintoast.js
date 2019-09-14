window.addEventListener('DOMContentLoaded', e => {
  const toast = document.querySelector('[data-toast]');
  if (!toast) {
    return null;
  }
  const close = document.createElement('p');
  close.style.position = 'absolute';
  close.style.top = '5px';
  close.style.right = '5px';
  close.style.fontSize = 'x-large';
  close.style.cursor = 'pointer';
  close.style.color = 'red';
  close.innerHTML = '&times;';
  close.style.zIndex = '4000000';
  close.addEventListener('click', e => {
    toast.style.transform = 'translateY(0px)';
  });
  toast.querySelector('div').appendChild(close);
  setTimeout(() => {
    toast.style.transform = 'translateY(-100%)';
  }, 6000);
});
