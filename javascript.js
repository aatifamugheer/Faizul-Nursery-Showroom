// JavaScript to load the plant details into the modal
const plantImages = document.querySelectorAll('[data-bs-toggle="modal"]');
const plantModal = document.getElementById('plantModal');
const plantName = document.getElementById('plantName');
const plantDescription = document.getElementById('plantDescription');
const plantPrice = document.getElementById('plantPrice');
const plantImage = document.getElementById('plantImage');

plantImages.forEach(image => {
    image.addEventListener('click', function() {
        const name = image.getAttribute('data-name');
        const description = image.getAttribute('data-description');
        const price = image.getAttribute('data-price');
        const imgSrc = image.getAttribute('data-image');

        plantName.textContent = name;
        plantDescription.textContent = description;
        plantPrice.textContent = `Price: ${price}`;
        plantImage.src = imgSrc;
    });
});
