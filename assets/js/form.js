// Enquiry forms: pre-select the enquiry type from the link (?enquiry=freight) and send without leaving the page.
const wanted = new URLSearchParams(window.location.search).get('enquiry');

document.querySelectorAll('.enquiry-form').forEach((form) => {
  const select = form.elements.enquiry_type;
  const status = form.querySelector('.form-status');
  const button = form.querySelector('button[type="submit"]');

  const match = [...select.options].find((option) => option.dataset.key === wanted);
  if (match) select.value = match.value;

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    button.disabled = true;
    status.className = 'form-status';
    status.textContent = 'Sending…';

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: { Accept: 'application/json' },
      });
      const result = await response.json();
      if (!result.success) throw new Error(result.message);

      form.reset();
      status.classList.add('is-success');
      status.textContent = 'Thank you! Your message has been sent. We will get back to you shortly.';
    } catch {
      status.classList.add('is-error');
      status.textContent = 'Sorry, something went wrong. Please try again or email us directly.';
    } finally {
      button.disabled = false;
    }
  });
});
