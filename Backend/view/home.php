   <main>
       <div class="slider w-full">
           <div class="slider relative">
               <img class="w-[80%] sm:w-[50%] absolute z-50
      top-[50%] left-[50%] transform -translate-x-1/2 -translate-y-1/2 
        " src="./Site/IMG/welcome.png" alt="" />

               <div class="swiper mySwiper ">
                   <div class="swiper-wrapper">
                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/bg-footer.jpg" alt="" />
                       </div>
                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/contact.jpg" alt="" />
                       </div>
                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/parallax.jpg" alt="" />
                       </div>

                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/slide-5.jpg" alt="" />
                       </div>

                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/slide-4.jpg" />
                       </div>

                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/slide-3.jpg" alt="" />
                       </div>

                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/slide-2.jpg" alt="" />
                       </div>

                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/slide-1.jpg" alt="" />
                       </div>

                       <div class="swiper-slide">
                           <img class="w-full h-full blur-sm" src="./Site/IMG/parallax.jpg" alt="" />
                       </div>
                   </div>
               </div>
           </div>
           <script>
               var swiper = new Swiper('.mySwiper', {
                   spaceBetween: 30,
                   centeredSlides: true,
                   autoplay: {
                       delay: 2500,
                       disableOnInteraction: false
                   },
                   pagination: {
                       el: '.swiper-pagination',
                       clickable: true
                   },
                   navigation: {
                       nextEl: '.swiper-button-next',
                       prevEl: '.swiper-button-prev'
                   }
               });
           </script>
       </div>
       <!-- End slider -->

       <div class="story px-5">
           <div class="w-full h-full 
                     flex justify-center items-center">
               <div class="text-2xl px-4 py-7  lg:px-80  lg:py-14 text-center">
                   <h1 class="mb-3 lg:text-3xl lg:leading-10  lg:mb-6">
                       PRODUCT UPDATE LATE FEBRUARY 2022
                   </h1>
                   <p class="mb-1 lg:mb-2 text-xs md:text-sm text-gray-500 leading-5 lg:leading-6 lg:text-base">
                       Here is the update for the next weeks. This can be in 1 week
                       or even over a month! Restock: TOFU 60% and 65% Cases PCB 60%
                       and 65% Plates 60% a...
                   </p>
                   <a href="index.php?action=allProducts" class="text-base font-medium text-orange-600 read-more-story" href="#">SHOP NOW</a>
               </div>
           </div>
       </div>
       <!-- End story -->

       <div class="products px-10">
           <h1 class="title__product text-center text-2xl lg:text-3xl">
               NEW ARRIVALS
           </h1>
           <p class="text-center mt-1">
               <a href="#" class="text-gray-500 text-sm hover:text-orange-500">SHOP NOW</a>
           </p>
           <div class="product__list-card mx-auto">
               <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4  gap-8 mt-7">
                   <?php foreach ($products_new as $product) {
                        extract($product); // extract() sẽ tạo ra các biến từ key của mảng - database
                        $productUrl = "index.php?action=productDetail&id=" . $id;
                        $imageSrc = $imageUrl . $image;
    echo '  <div  class="product__card p-3" style="border-radius: 30px;
background: #ffffff;
box-shadow:  20px 20px 60px #d9d9d9,
             -20px -20px 60px #ffffff;transform-style: preserve-3d;transform: perspective(1000px);">
                       <div style="transform: translateZ(20px);" class="product__card-img relative group hover:transition-all hover:duration-700 hover:ease-in-out">
                           <img   class="block mb-3 rounded-[10px]  group-hover:blur-[2.5px]" src="' . $imageSrc . '" alt="KeyBoard" />
                           <div  class="product__card-img__overlay absolute top-0 left-0 w-full h-full bg-transparent hidden group-hover:flex group-hover:animate-fade justify-center items-center">
                               <a class="text-black group-hover:animate-slideUP text-sm bg-white rounded-[5px] drop-shadow-2xl p-3 uppercase font-medium hover:transition-all hover:duration-700 hover:ease-in-out hover:bg-orange-600 hover:text-white"  href="' . $productUrl . '">MORE</a>
                           </div>
                       </div>
                       <div style="transform: translateZ(20px);" class="product__card-desc p-1">
                           <a style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
2; overflow: hidden;text-overflow: ellipsis;" href="' . $productUrl . '" class="product__card-title text-left text-s md:text-lg font-medium  hover:transition-all hover:duration-500 hover:ease-in-out hover:text-orange-600">
                                 ' . $product_name . '
                           </a>
                             <div class="price__addcart flex justify-between">
                    <p
                      class="product__card-price  text-xs md:text-base lg:text-base
                        text-gray-500 mt-2 hover:text-orange-500"
                    >
                        $' . $price . '
                    </p>
                    <div class="addcart__btn ml-4">
                     <form action="index.php?action=addCart" method="POST">
                      <input type="hidden" name="id" value="' . $id . '">
                      <input type="hidden" name="product_name" value="' . $product_name . '">
                      <input type="hidden" name="price" value="' . $price . '">
                      <input type="hidden" name="image" value="' . $image . '">
                        <input type="hidden" name="category_id" value="' . $category_id . '">
                        <input type="hidden" name="quantity" value="1">
                      <button type="submit" name="add_to_cart" class="addcart__btn__icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="icon lg:w-8 lg:h-8 text-gray-600"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                          />
                        </svg>
                      </button>
                      </form>
                    </div>
                  </div>
                       </div>
                       </div>';
                    } ?>
               </div>
           </div>
       </div>
       <!-- End products -->

       <div class="more-products mt-14 px-10">
           <h1 class="text-center text-3xl">TOP FAVORITE PRODUCTS</h1>
           <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4  mt-7">
               <?php foreach ($products_top as $product) {
                    extract($product); // extract() sẽ tạo ra các biến từ key của mảng - database
                    $productUrl = "index.php?action=productDetail&id=" . $id;
                    $imageSrc = $imageUrl . $image;
                    echo '<div
                class="product__card data-tilt shadow-xl p-3 rounded-[15px] "
              >
                <div
                  class="product__card-img relative group hover:transition-all hover:duration-700 hover:ease-in-out"
                >
                  <img
                    class="block mb-3 rounded-[10px]  group-hover:blur-[2.5px]"
                    src="' . $imageSrc . '"
                    alt="KeyBoard"
                  />
                  <div
                    class="product__card-img__overlay absolute top-0 left-0 w-full h-full bg-transparent hidden group-hover:flex group-hover:animate-fade justify-center items-center"
                  >
                    <a
                      class="text-black group-hover:animate-slideUP text-sm bg-white rounded-[5px] drop-shadow-2xl p-2 uppercase font-medium hover:transition-all hover:duration-700 hover:ease-in-out hover:bg-orange-600 hover:text-white"
                      href="' . $productUrl . '"
                      >MORE</a
                    >
                  </div>
                </div>
                <div class="product__card-desc p-1">
                  <a
                    href="' . $productUrl . '"
                    class="product__card-title text-[11px]   lg:text-base hover:transition-all hover:duration-500 hover:ease-in-out hover:text-orange-600"
                    style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
2; overflow: hidden;text-overflow: ellipsis;"
                  >
                    ' . $product_name . '
                  </a>
                  <div class="price__addcart flex justify-between">
                    <p
                      class="product__card-price  text-xs md:text-base lg:text-base
                        text-gray-500 mt-2 hover:text-orange-500"
                    >
                        $' . $price . '
                    </p>
                    <div class="addcart__btn ml-4">
                     <form action="index.php?action=addCart" method="POST">
                      <input type="hidden" name="id" value="' . $id . '">
                      <input type="hidden" name="product_name" value="' . $product_name . '">
                      <input type="hidden" name="price" value="' . $price . '">
                      <input type="hidden" name="image" value="' . $image . '">
                        <input type="hidden" name="category_id" value="' . $category_id . '">
                        <input type="hidden" name="quantity" value="1">
                      <button type="submit" name="add_to_cart" class="addcart__btn__icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          class="icon lg:w-8 lg:h-8 text-gray-600"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                          />
                        </svg>
                      </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              ';
                } ?>



           </div>
       </div>

       <!-- End more-products -->

       <div class="keybroad__combo mt-24">
           <h1 class="keybroad__combo-title text-center text-3xl">COMBO</h1>
           <div class="keybroad__combo-content px-10 mx-auto md:mb-10 lg:mb-16 mt-8">
               <div class="flex flex-col md:flex-row lg:flex-row justify-center gap-12">
                   <div class="keybroad__combo-content--img  basis-1/2 flex flex-col gap-2">
                       <video class="grid grid-cols-1" autoplay mute="1">
                           <source src="./Site/IMG/keybroad.mp4" type="video/mp4" />
                       </video>
                       <div class="small__combo-img grid grid-cols-3 gap-2">
                           <img src="./Site/IMG/gray-switch.png" alt="" />
                           <img src="./Site/IMG/black-key.png" alt="" />
                           <img src="./Site/IMG/white-ket.png" alt="" />
                       </div>
                   </div>
                   <div class="keybroad__combo-content--text flex flex-col basis-1/2 mb-2
">
                       <h3 class="combo-offer mb-2 text-base text-gray-500">
                           COMBO OFFER
                       </h3>
                       <a class="text-lg md:text-xl lg:text-2xl" href="#">[LIMITED VERSION] PHASE ONE 65 X PBTFANS™ RESONANCE</a>
                       <!-- Hiển thị mô tả trên 4 dòng thì hiện dấu ... -->
                       <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 4; overflow: hidden;text-overflow: ellipsis;" class="text-gray-500 mt-3 lg:mt-4 text-xs md:text-sm lg:text-lg
                    line-clamp-3 ">
                           The Phase One 65 is a 65% keyboard with a 3D printed case
                           and a PCB designed by PBTFANS™. It features a USB-C port, a
                           3.5mm audio jack, and a 65% layout. The Phase One 65 is a
                           65% keyboard with a 3D printed case and a PCB designed by
                           PBTFANS™. It features a USB-C port, a 3.5mm audio jack, and
                           a 65% layout.
                       </p>

                       <div class="combo__price mt-4 lg:mt-6 flex gap-3">
                           <span class="lg:text-xl text-orange-500">$ 199.00</span>
                           <span class="lg:text-xl text-gray-500 line-through">$ 299.00</span>
                       </div>
                       <!-- shopping now -->
                       <div class="shopping-now mt-4 md:mt-6 lg:mt-10">
                           <a class="text-white text-sm bg-orange-600 rounded-[5px] drop-shadow-2xl p-2  md:p-3 lg:p-4 uppercase font-medium hover:transition-all hover:duration-700 hover:ease-in-out hover:bg-orange-800 hover:text-white" href="#">Shopping now</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div style="background-image:url('./Site/IMG/parallax.jpg');" class="parallax mt-5 mb-5  md:mb-12 lg:mb-12 w-full h-[180px]  lg:h-[500px] lg:max-h-[500px] bg-no-repeat bg-center bg-contain md:bg-fixed lg:bg-fixed "></div>
       <!-- end prallax -->
       <div class="keybroad__news">
           <h1 class="keybroad__news-title text-center text-3xl mb-5">
               KEYBROAD NEWS
           </h1>

           <div class="keybroad__news-listnews px-10 grid lg:gap-5 md:grid-cols-3 lg:grid-cols-3">
               <div class="keybroad__news-cart p-3">
                   <img src="./Site/IMG/white-ket.png" alt="" />
                   <div class="keybroad__news-cart--content mt-3">
                       <a href="#" class="keybroad__news-cart--content-title text-base">
                           [LIMITED VERSION] PHASE ONE 65 X PBTFANS™ RESONANCE
                       </a>
                       <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
3; overflow: hidden;text-overflow: ellipsis;" class="keybroad__news-cart--content-text text-gray-500 text-[11px] md:text-xs lg:text-sm mt-2 font-extralight line-clamp-3">
                           The Phase One 65 is a 65% keyboard with a 3D printed case
                           and a PCB designed by PBTFANS™. It features a USB-C port, a
                           3.5mm audio jack, and a 65% layout. The Phase One 65 is a
                           65% keyboard with a 3D printed case and a PCB designed by
                           PBTFANS™. It features a USB-C port, a 3.5mm audio jack, and
                           a 65% layout.
                       </p>
                       <span class="timer block mt-2 text-[11px] font-medium text-gray-600">
                           OCTOBER 9, 2021
                       </span>
                   </div>
               </div>

               <div class="keybroad__news-cart p-3">
                   <img src="./Site/IMG/gray-white.png" alt="" />
                   <div class="keybroad__news-cart--content mt-3">
                       <a href="#" class="keybroad__news-cart--content-title text-base">
                           [LIMITED VERSION] PHASE ONE 65 X PBTFANS™ RESONANCE
                       </a>
                       <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
3; overflow: hidden;text-overflow: ellipsis;" class="keybroad__news-cart--content-text text-gray-500 text-[11px] md:text-xs lg:text-sm mt-2 font-extralight line-clamp-3">
                           The Phase One 65 is a 65% keyboard with a 3D printed case
                           and a PCB designed by PBTFANS™. It features a USB-C port, a
                           3.5mm audio jack, and a 65% layout. The Phase One 65 is a
                           65% keyboard with a 3D printed case and a PCB designed by
                           PBTFANS™. It features a USB-C port, a 3.5mm audio jack, and
                           a 65% layout.
                       </p>
                       <span class="timer block mt-2 text-[11px] font-medium text-gray-600">
                           OCTOBER 9, 2021
                       </span>
                   </div>
               </div>

               <div class="keybroad__news-cart p-3">
                   <img src="./Site/IMG/black-key.png" alt="" />
                   <div class="keybroad__news-cart--content mt-3">
                       <a href="#" class="keybroad__news-cart--content-title text-base">
                           [LIMITED VERSION] PHASE ONE 65 X PBTFANS™ RESONANCE
                       </a>
                       <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
3; overflow: hidden;text-overflow: ellipsis;" class="keybroad__news-cart--content-text text-gray-500 text-[11px] md:text-xs lg:text-sm mt-2 font-extralight line-clamp-3">
                           The Phase One 65 is a 65% keyboard with a 3D printed case
                           and a PCB designed by PBTFANS™. It features a USB-C port, a
                           3.5mm audio jack, and a 65% layout. The Phase One 65 is a
                           65% keyboard with a 3D printed case and a PCB designed by
                           PBTFANS™. It features a USB-C port, a 3.5mm audio jack, and
                           a 65% layout.
                       </p>
                       <span class="timer block mt-2 text-[11px] font-medium text-gray-600">
                           OCTOBER 9, 2021
                       </span>
                   </div>
               </div>
           </div>
       </div>
       <!-- End keyboard news -->
       <h1 class="keybroad__combo-title text-center text-3xl mt-10 lg:mt-16">
           SUBSCRIBE TO RECEIVE NEWS
       </h1>
       <div style="background-image:url('./Site/IMG/contact.jpg');" class="contact w-full h-[180px] md:h-[200px] lg:h-[240px]  bg-cover bg-center bg-fixed mt-8 lg:mt-10 mb-16">
           <div class="w-full h-full flex justify-center items-center backdrop-blur-sm ">
               <form action="" class="contact__email">
                   <div class="form__group">
                       <input type="email" class="form__input  p-2 lg:px-6  text-xs lg:text-base focus:outline-none" placeholder="Enter your email" />
                       <button type="submit" class="form__button  text-xs lg:text-base p-2 lg:px-6 bg-orange-600 text-white 
">
                           SUBSCRIBE
                       </button>
                   </div>
                   <!-- End contact -->
               </form>
           </div>
       </div>
       <!-- End contact -->
   </main>