let container = document.getElementById("card-container");
let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

let selectedProduct = null;

async function loadProducts() {
    try {
        const res = await fetch("./api/product.php");
        const data = await res.json();

        data.forEach(item => {
            const card = `
            <div class="bg-white shadow rounded overflow-hidden product-card cursor-pointer"
                    data-name="${item.Nama}"
                    data-price="${item.Harga}"
                    data-img="${item.Gambar}">
                    
                    <img src="${item.Gambar}" class="w-full h-48 object-cover">
            
                    <div class="p-4">
                        <h4 class="font-semibold mb-2">${item.Nama}</h4>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded add-to-cart-btn"
                                onclick="event.stopPropagation();">
                            Add to Cart
                        </button>
                    </div>
                </div>
            `;
            container.innerHTML += card;
            
            
        });

        

        addAddToCartEvents();  // ⭐ Event listener setelah elemen muncul
        addCardClickEvents();

    } catch (error) {
        console.error("Error fetching API:", error);
    }
}

function addAddToCartEvents() {
    const buttons = document.querySelectorAll(".add-to-cart-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", function () {
            const productName = this.parentElement.querySelector("h4").innerText;

            cartItems.push(productName);
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
            updateCartBadge();
        });
    });
}

function updateCartBadge() {
    document.getElementById("cart-badge").innerText = cartItems.length;
}


function addCardClickEvents(){
    const cards = document.querySelectorAll(".product-card");
    

    cards.forEach(card => {
        card.addEventListener("click", function () {

            selectedProduct = {
                name: this.dataset.name,
                price: this.dataset.price,
                img: this.dataset.img
            };
            
            console.log(selectedProduct);

            document.getElementById("modal-img").src = selectedProduct.img;
            document.getElementById("modal-name").innerText = selectedProduct.name;
            document.getElementById("modal-price").innerText = "Harga: " + selectedProduct.price;

            document.getElementById("product-modal").classList.remove("hidden");
        });
    });

}
// CLOSE MODAL
document.getElementById("close-modal").onclick = () => {
    document.getElementById("product-modal").classList.add("hidden");
};

// ADD TO CART FROM POPUP
document.getElementById("modal-add-cart").onclick = () => {
    cartItems.push(selectedProduct.name);
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartBadge();
    alert("Produk ditambahkan ke keranjang!");
};



loadProducts();
updateCartBadge();
