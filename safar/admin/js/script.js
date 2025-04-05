document.getElementById('addPackageForm').addEventListener('submit', function(e) {
    const name = document.getElementById('name').value.trim();
    const description = document.getElementById('description').value.trim();
    const price = document.getElementById('price').value.trim();
    const image = document.getElementById('image').files[0];

    if (!name || !description || !price || !image) {
        alert('Please fill all fields and select an image.');
        e.preventDefault();
    }
});
