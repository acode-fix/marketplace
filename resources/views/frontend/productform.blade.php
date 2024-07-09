<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/start_selling.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">

    <style>

    </style>

</head>
<body>
    <form id="myForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="condition" id="condition" value="new">

        <!-- Category Selection -->
        <h5>Select product category</h5>
        <div class="category_mobile">
            <div class="image2" onclick="selectCategory(this, 1)">
                <img src="innocent/assets/image/category 1.png">
                <div class="text2">Gadgets</div>
                <div class="checked-icon">✅️</div>
            </div>
            <!-- Add other categories as needed -->
        </div>

        <!-- File Upload -->
        <div class="product_upload">
            <input type="file" id="fileInput" name="image_url[]" accept="image/*" style="display: none;" multiple>
            <div id="imageContainer">
                <div id="uploadButton">
                    <img src="innocent/assets/image/upload.png" alt="Upload">
                    <p>maximum picture size: 5mb<br>supported format: Jpg & Png</p>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <input type="text" placeholder="Product Title" name="title" required>
        <textarea placeholder="Product Description" name="description" required></textarea>
        <input type="text" placeholder="Main Price" name="actual_price" required>
        <input type="text" placeholder="Promo Price (optional)" name="promo_price">
        <input type="text" placeholder="Quantity in Stock" name="quantity" required>
        <input type="hidden" name="category_id" id="category_id" required>
        <input type="text" name="location" id="location" required>

        <!-- Condition Toggle -->
        <div>
            <button type="button" onclick="toggleCondition('new')">New</button>
            <button type="button" onclick="toggleCondition('used')">Used</button>
        </div>

        <!-- Submit Button -->
        <button type="submit">Upload your Product</button>
    </form>





    <script src="{{ asset('innocent/assets/js/start_selling.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/upload_image.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Create FormData object
    let formData = new FormData(this);

    // Axios POST request
    axios({
        method: "post",
        url: "/api/products",
        data: formData,
        headers: { "Content-Type": "multipart/form-data" },
    })
    .then(function(response) {
        // Handle success
        console.log(response);
        alert('Product uploaded successfully!');
    })
    .catch(function(error) {
        // Handle error
        console.log(error);
        alert('An error occurred while uploading the product.');
    });
});

function selectCategory(element, categoryId) {
    document.getElementById('category_id').value = categoryId;
    document.querySelectorAll('.image2').forEach(img => {
        img.classList.remove('selected');
    });
    element.classList.add('selected');
}

function toggleCondition(condition) {
    document.getElementById('condition').value = condition;
    document.querySelectorAll('.button').forEach(btn => {
        btn.classList.remove('selected');
    });
    document.querySelector(`.button.${condition}`).classList.add('selected');
}

document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function() {
    let files = this.files;
    let imageContainer = document.getElementById('imageContainer');
    imageContainer.innerHTML = '';

    for (let i = 0; i < files.length; i++) {
        let file = files[i];
        let reader = new FileReader();

        reader.onload = function(e) {
            let img = document.createElement('img');
            img.src = e.target.result;
            imageContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
    }
});



    </script>
</body>
</html>
