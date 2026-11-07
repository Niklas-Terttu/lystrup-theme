document.addEventListener('DOMContentLoaded', function () {
  var wrapper = document.querySelector('.lystrup-mobile-nav');
  var button = wrapper && wrapper.querySelector('.lystrup-menu-toggle');
  if (!wrapper || !button) return;
  button.addEventListener('click', function () {
    var expanded = wrapper.classList.toggle('is-open');
    button.setAttribute('aria-expanded', expanded ? 'true' : 'false');
  });
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      wrapper.classList.remove('is-open');
      button.setAttribute('aria-expanded', 'false');
    }
  });
});
