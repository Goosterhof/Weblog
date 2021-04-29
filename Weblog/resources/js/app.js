require('./bootstrap');

document.getElementsByClassName('category')[0].addEventListener('click', getByCat);

function getByCat() {
  axios
    .get('/post/category/:id', {
      params: {
        id: document.getElementsByClassName('category')[0].value,
      },
      timeout: 5000
    })
    .then(res => showOutput(res))
    .catch(err => console.error(err));
}

function showOutput(res) {
  document.getElementsByClassName('res')[0].innerHTML = `
  <div class="card mt-3">
    <div class="card-header">
      Results
    </div>
    <div class="card-body">
      <pre>${JSON.stringify(res.data, null, 1)}</pre>
    </div>
  </div>
`;
}
