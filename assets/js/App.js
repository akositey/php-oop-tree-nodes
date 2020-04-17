document.getElementById('btn-create-root').addEventListener('click', (e) => {
  console.info('Creating tree root...');

  const url = '/scripts/createRoot.php';
  fetch(url, {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
  })
    .then((response) => response.json())
    .then((result) => {
      if (result.status) {
        window.location.reload();
      } else {
        document.getElementById('error-message').innerText = result.error;
      }
    });
});
