    <main class="w-full px-8 lg:px-20
">
        <div class="text-2xl px-4 py-7  lg:px-80  lg:py-14 text-center">
            <h1 class="mb-3 lg:text-3xl lg:leading-10  lg:mb-6">
                PRODUCT UPDATE LATE FEBRUARY 2022
            </h1>
            <p class="mb-1 lg:mb-2 text-xs md:text-sm text-gray-500 leading-5 lg:leading-6 lg:text-base">
                Here is the update for the next weeks. This can be in 1 week or
                even over a month! Restock: TOFU 60% and 65% Cases PCB 60% and 65%
                Plates 60% a...
            </p>

        </div>

        <section class="all__keyboards mb-16 w-full">
            <div class="list__product w-full my-10">
                <div class="more-products mt-10">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-5 mt-6">
                        <!-- -------------------------------------------------- -->
                        <!-- Hiển thị các sản phẩm có category_id = 24 -->
                        <?php
                        foreach ($productList as $product) {
                            extract($product);
                            $productUrl = "index.php?action=productDetail&id=" . $id;
                            $imageSrc = $imageUrl . $image;
                            echo '   <div class="product__card shadow-xl p-3 rounded-[15px]">
                            <div class="product__card-img relative group hover:transition-all hover:duration-700 hover:ease-in-out">
                                <img class="block mb-3 rounded-[10px]  group-hover:blur-[2.5px] " src="' . $imageSrc . '" alt="KeyBoard" />
                                <div class="product__card-img__overlay absolute top-0 left-0 w-full h-full bg-transparent hidden group-hover:flex group-hover:animate-fade justify-center items-center">
                                    <a class="text-black group-hover:animate-slideUP text-sm bg-white rounded-[5px] drop-shadow-2xl p-2 uppercase font-medium hover:transition-all hover:duration-700 hover:ease-in-out hover:bg-orange-600 hover:text-white" href="' . $productUrl . '">MORE</a>
                                </div>
                            </div>
                            <div class="product__card-desc p-2">
                                <h3 class="product__card-title  text-xs font-medium lg:text-base hover:transition-all hover:duration-500 hover:ease-in-out hover:text-orange-600" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
2; overflow: hidden;text-overflow: ellipsis;">
                                    ' . $product_name . '
                                </h3>
                                <div class="price__addcart flex justify-between">
                                    <p class="product__card-price  text-xs md:text-base lg:text-base
 text-gray-500 mt-2 hover:text-orange-500">
                                        $ ' . $price . '
                                    </p>
                                    <div class="addcart__btn ml-4">
                                         <form action="index.php?action=addCart" method="POST">
                      <input type="hidden" name="id" value="' . $id . '">
                      <input type="hidden" name="product_name" value="' . $product_name . '">
                      <input type="hidden" name="price" value="' . $price . '">
                      <input type="hidden" name="image" value="' . $image . '">
                        <input type="hidden" name="category_id" value="' . $category_id . '">
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
                        }
                        ?>
                    </div>
                    <!-- pagination-->
     
                </div>
            </div>
        </section>
    </main>