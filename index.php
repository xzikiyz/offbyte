<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Modern</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-50">

  <!-- NAVBAR -->
  <nav class="bg-white shadow-lg fixed w-full top-0 z-10 h-16">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">

        <div class="flex items-center gap-2">
          <img src="app/img/logo.png" class="h-10 w-10 rounded-full" alt="logo">
          <h1 class="text-xl font-bold">Off-byte</h1>
        </div>

        <!-- Menu (Desktop) -->
        <div class="hidden md:flex space-x-8">
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">Home</a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">Photobooth</a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">Mech Product</a>
          <a href="#" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
        </div>

        <div class="relative hidden md:block">
          <a href="cart.php" class="text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" 
                stroke-width="1.5" stroke="currentColor" 
                class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M2.25 2.25h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 
                    0L6.75 12.75m-1.644-8.223h12.354c.936 
                    0 1.636.88 1.44 1.797l-1.29 5.995a1.5 
                    1.5 0 01-1.44 1.203H6.75m0 0L5.25 
                    6.75m1.5 6a2.25 2.25 0 
                    100 4.5 2.25 2.25 0 000-4.5zm10.5 
                    0a2.25 2.25 0 100 4.5 2.25 
                    2.25 0 000-4.5z" />
              </svg>
          </a>

          <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">3</span>
        </div>

        <!-- Hamburger -->
         <div class="mb-hidden">
          <button id="menu-btn" class="text-gray-800 text-3xl">
             ☰
          </button>
         </div>
      </div>
    </div>
    <!-- Menu (Mobile) -->
     <div id="mobile-menu" class="hidden md:hidden bg-white px-4 pb-4">
        <a href="#" class="block py-2 border-b"> Home </a>
        <a href="#" class="block py-2 border-b"> Photobooth </a>
        <a href="#" class="block py-2 border-b"> Mech Product </a>
        <a href="#" class="block py-2 border-b"> Contact </a>
     </div>
  </nav>

  <script>
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");

    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>

  <<section class="relative w-[1500px] h-[600px] mt-14 mx-auto">
  <!-- Background Image -->
      <img src="app/img/lagi.jpg" alt="Hero Image" class="w-full h-full object-cover">

      <!-- Overlay semi-transparan (opsional) -->
      <div class="absolute inset-0 bg-black bg-opacity-30"></div>

      <!-- Teks dan tombol di kiri bawah -->
      <div class="absolute bottom-8 left-6 text-white max-w-md">
        <h2 class="text-4xl font-bold mb-2">Selamat Datang di Off-byte!</h2>
        <p class="mb-4">Temukan produk photobooth dan mech terbaru kami.</p>
        <a href="#products" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg font-semibold transition">
          Lihat Produk
        </a>
      </div>
</section>

    <section class="max-w-7xl mx-auto px-4 py-12 grid sm:grid-cols-2 md:grid-cols-4 gap-6">
      <a href="#photobooth" class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition">
        <img src="app/img/logo.png" alt="Photobooth" class="w-full h-48 object-cover">
        <div class="p-4 text-center">
          <h3 class="text-lg font semi-bold"> Photobooth </h3>
        </div>
      </a>

      <a href="#CreativeMerch" class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition">
        <img src="app/img/logo.png" alt="Creative Merch" class="w-full h-48 object-cover">
        <div class="p-4 text-center">
          <h3 class="text-lg font semi-bold"> Creative Merch </h3>
        </div>
      </a>

      <a href="#CustomKeyChain" class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition">
        <img src="app/img/logo.png" alt="CustomChain" class="w-full h-48 object-cover">
        <div class="p-4 text-center">
          <h3 class="text-lg semi-bold"> Custom Key Chain </h3>
        </div>
      </a>

      <a href="#Sticker" class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition">
        <img src="app/img/logo.png" alt="Sticker" class="w-full h-48 object-cover">
        <div class="p-4 text-center">
          <h3 class="text-lg font semi-bold"> Sticker </h3>
        </div>
      </a>
    </section>

  <script>
  // Ambil cart dari localStorage, kalau belum ada buat array kosong
  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

  const cartBadge = document.querySelector('nav span');

  function updateCartBadge() {
    cartBadge.textContent = cartItems.length;
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
  }

  function addItemToCart(item) {
    cartItems.push(item);
    updateCartBadge();
  }

  updateCartBadge();
</script>

</body>
</html>
