// Mobile menu: the button opens and closes the nav, and keeps aria-expanded in sync for screen readers.
const toggle = document.querySelector('.nav-toggle');
const nav = document.getElementById('site-nav');

if (toggle && nav) {
  const setOpen = (open) => {
    nav.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
  };

  toggle.addEventListener('click', () => setOpen(!nav.classList.contains('is-open')));
  nav.addEventListener('click', (event) => event.target.closest('a') && setOpen(false));
  document.addEventListener('keydown', (event) => event.key === 'Escape' && setOpen(false));
}
