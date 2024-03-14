function toggleText() {
  var x = document.getElementById("toggle");
  var button = document.getElementsByTagName("button")[0];
  if (x.style.display === "none") {
    x.style.display = "block";
    button.innerHTML = "Weniger lesen";
  } else {
    x.style.display = "none";
    button.innerHTML = "Mehr lesen";
  }
}


// Function to get product details by ID using AJAX
function getProductDetails(productId) {
    // AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_product_info.php?id=" + productId, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Successful response
            var productInfo = JSON.parse(xhr.responseText);
            // Call function to display product details popup
            showDetailsPopup(productInfo);
        }
    };
    xhr.send(); // Send the request
}

// Function to display product details popup
function showDetailsPopup(productInfo) {
    // Find the popup element
    var popup = document.getElementById("popup");
    // Set the content of the popup with product details
    popup.innerHTML = `
        <div class="popup-content">
            <span class="close" onclick="closeDetailsPopup()">&times;</span>
            <h2>${productInfo.title}</h2>
            <p>${productInfo.description}</p>
            <p>&#8364;${productInfo.price}</p>
        </div>
    `;
    // Show the popup
    popup.style.display = "block";
}

// Function to close the details popup
function closeDetailsPopup() {
    document.getElementById("popup").style.display = "none";
}

