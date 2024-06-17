
const states = [
  'Abakaliki', 'Aba', 'Abeokuta', 'Abuja', 'Ado Ekiti', 'Akure', 'Asaba', 'Awka', 'Bauchi', 'Benin City', 
  'Birnin Kebbi', 'Calabar', 'Damaturu', 'Delta', 'Dutse', 'Edo', 'Ekiti', 'Enugu', 'Gombe', 'Gusau', 'Ibadan',
  'Ikeja', 'Ilorin', 'Imo', 'Jalingo', 'Jos', 'Kaduna', 'Kano', 'Katsina', 'Lafia', 'Lagos', 'Lokoja', 'Maiduguri',
  'Makurdi', 'Minna', 'Ogun', 'Owerri', 'Owere', 'Port Harcourt', 'Sokoto', 'Umuahia', 'Uyo', 'Yenagoa', 'Yola', 'Zaria'
];

// location for home page
function filterStates(value) {
  const filteredStates = states.filter(state => state.toLowerCase().startsWith(value.toLowerCase()));
  const stateSelection = document.getElementById('stateSelection');
  stateSelection.innerHTML = '';
  if (filteredStates.length > 0) {
    filteredStates.forEach(state => {
      const p = document.createElement('p');
      p.textContent = state;
      p.setAttribute('data-bs-dismiss', 'modal');
      p.setAttribute('aria-label', 'Close');
      p.addEventListener('click', () => changeLocation(state));
      stateSelection.appendChild(p);
    });
  } else {
    const p = document.createElement('p');
    p.textContent = 'State not found';
    stateSelection.appendChild(p);
  }
}

function changeLocation(location) {
  document.getElementById('clickMe').textContent = location;
  document.querySelector(".locationInput").value = location;
}

// location for mobile view serch page
function filterStates2(value) {
  const filteredStates = states.filter(state => state.toLowerCase().startsWith(value.toLowerCase()));
  const stateSelection = document.getElementById('stateSelection2');
  stateSelection.innerHTML = '';
  if (filteredStates.length > 0) {
    filteredStates.forEach(state => {
      const p = document.createElement('p');
      p.textContent = state;
      p.setAttribute('data-bs-dismiss', 'modal');
      p.setAttribute('aria-label', 'Close');
      p.addEventListener('click', () => changeLocation2(state));
      stateSelection.appendChild(p);
    });
  } else {
    const p = document.createElement('p');
    p.textContent = 'State not found';
    stateSelection.appendChild(p);
  }
}

function changeLocation2(location) {
  document.getElementById('clickMe2').textContent = location;
  document.querySelector(".locationInput2").value = location;
} 


//category images
const leftArrow = document.getElementById('leftArrow');
const rightArrow = document.getElementById('rightArrow');
const imageGallery = document.getElementById('imageGallery');

leftArrow.style.display = 'none'; // Initially hide left arrow

imageGallery.addEventListener('scroll', () => {
    if (imageGallery.scrollLeft <= 0) {
        leftArrow.style.display = 'none'; // Hide left arrow when at left extreme
    } else {
        leftArrow.style.display = 'block'; // Show left arrow when not at left extreme
    }

    if (imageGallery.scrollLeft + imageGallery.clientWidth >= imageGallery.scrollWidth) {
        rightArrow.style.display = 'none'; // Hide right arrow when at right extreme
    } else {
        rightArrow.style.display = 'block'; // Show right arrow when not at right extreme
    }
});

leftArrow.addEventListener('click', () => {
    imageGallery.scrollLeft -= 800;
});

rightArrow.addEventListener('click', () => {
    imageGallery.scrollLeft += 800;
});