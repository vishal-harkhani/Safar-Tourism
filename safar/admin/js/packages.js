// Function to create package cards
function createPackageCard(data) {
    const card = document.createElement('div');
    card.classList.add('package-card');

    // Image
    const img = document.createElement('img');
    img.classList.add('package-image');
    img.src = `images/${data.image}`;
    img.alt = data.name;
    card.appendChild(img);

    // Info
    const info = document.createElement('div');
    info.classList.add('package-info');

    const name = document.createElement('h2');
    name.textContent = data.name;
    info.appendChild(name);

    // Add rating, description, and other fields as needed

    const price = document.createElement('p');
    price.classList.add('package-price');
    price.textContent = `$${data.price}`;
    info.appendChild(price);

    card.appendChild(info);

    // Add a button for "Book Now"

    return card;
}

// Function to load packages from data (e.g., JSON file)
function loadPackages() {
    // Fetch package data from JSON or your data source
    fetch('packages/packages.json')
        .then(response => response.json())
        .then(packages => {
            const container = document.getElementById('package-container');

            // Clear existing content
            container.innerHTML = '';

            // Create cards for each package
            packages.forEach(packageData => {
                const card = createPackageCard(packageData);
                container.appendChild(card);
            });
        });
}

// Load packages on page load
loadPackages();