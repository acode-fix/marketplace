
function selectPlan(plan) {
  const monthRadio = document.getElementById('flexRadioDefault1');
  const yearRadio = document.getElementById('flexRadioDefault2');
  const monthDiv = document.querySelector('.month');
  const yearDiv = document.querySelector('.year');

  if (plan === 'month') {
    monthRadio.checked = true;
    monthDiv.classList.add('selected');
    yearDiv.classList.remove('selected');
  } else if (plan === 'year') {
    yearRadio.checked = true;
    yearDiv.classList.add('selected');
    monthDiv.classList.remove('selected');
  }
}

function selectPlan2(plan) {
  const monthRadio = document.getElementById('flexRadioDefault3');
  const yearRadio = document.getElementById('flexRadioDefault4');
  const monthDiv = document.querySelector('.month2');
  const yearDiv = document.querySelector('.year2');

  if (plan === 'month2') {
    monthRadio.checked = true;
    monthDiv.classList.add('selected');
    yearDiv.classList.remove('selected');
  } else if (plan === 'year2') {
    yearRadio.checked = true;
    yearDiv.classList.add('selected');
    monthDiv.classList.remove('selected');
  }
}
