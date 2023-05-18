  <main class="w-full mt-10 py-5">
      <h1 class="text-2xl font-semibold text-gray-700 ml-5 flex items-center gap-2">
          CART<svg class="w-6 h-6 sm:w-7 sm:h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
          </svg>
      </h1>
      <div class="mx-auto">
          <div class="flex flex-col lg:flex-row lg:shadow-md my-5 lg:my-10">
              <div class="w-full lg:w-3/4 bg-white px-5">
                  <table class="table-auto hidden sm:block w-full">
                      <thead>
                          <?php
                            if (!empty($_SESSION['my_cart'])) {
                                echo ' <tr>
                              <th class="px-4 py-2 text-left font-semibold text-gray-600 text-xs uppercase">
                                  Products details
                              </th>
                              <th class="px-4 py-2 font-semibold text-gray-600 text-xs uppercase">
                                  Quantity
                              </th>
                              <th class="px-4 py-2 font-semibold text-gray-600 text-xs uppercase">
                                  Price
                              </th>
                              <th class="pl-4 py-2 font-semibold text-gray-600 text-xs uppercase">
                                  Total
                              </th>
                               <th class="py-2 font-semibold text-gray-600 text-xs uppercase">

                              </th>
                          </tr>';
                            }
                            ?>
                      </thead>
                      <tbody>
                          <?php
                            $total = 0;
                            $totalPrice = 0;
                            //kiểm tra nếu giỏ hàng rỗng thì sẽ hiển thị thông báo
                            if (empty($_SESSION['my_cart'])) {
                                echo "
                        <div class='w-full flex flex-col justify-center items-center gap-5'>
                        <img class='w-[50%] h-auto' src='./IMG/empty-cart.png' alt='' />
                        <h1 class='text-center text-xl font-semibold text-gray-500'>Your cart is empty !</h1>
                      
                        </div>";
                            } else {
                                foreach ($_SESSION['my_cart'] as $cart) {
                                    $imageSrc = $imageUrl . $cart[3];
                                    $deleteUrl = "index.php?action=deleteCart&id=" . $cart[0];
                                    $total = $cart[5] * $cart[2];
                                    //Chuyển category_id thành tên category
                                    $category = $cart[4];
                                    $totalPrice += $total;
                                    echo ' <tr class="border border-dashed">
                              <td class="px-4 py-2 w-[40%]">
                                  <div class="flex">
                                      <div class="w-16 h-16">
                                          <img src="' . $imageSrc . '" alt="" class="w-16 h-16" />
                                      </div>
                                      <div class="ml-4 flex flex-col justify-between">
                                          <p class="font-medium text-gray-600 text-xs sm:text-sm ">
                                                ' . $cart[1] . '
                                          </p>
                                          <span class="block text-gray-400 text-xs">
                                                ' . $category . '
                                          </span>
                                      </div>
                                  </div>
                              </td>
                              <td class="px-4 py-2">
                                  <div class="flex items-center justify-center">
                                      <form action="index.php?action=viewCart" method="POST">
                                          <button type="submit" name="decqty" class=" text-gray-600 w-3">
                                              <svg class="text-gray-600 w-3" viewBox="0 0 448 512">
                                                  <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                              </svg>
                                          </button>
                                          <input name="quantity" id="quantity" class=" mx-2 border text-center w-10" type="number" min="1" value="' . $cart[5] . '" />
                                          <input type="hidden" name="product_id" value="' . $cart[0] . '" />
                                          <button type="submit" name="incqty" class=" text-gray-600 w-3">
                                              <svg class=" text-gray-600 w-3" viewBox="0 0 448 512">
                                                  <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                              </svg>
                                          </button>
                                      </form>
                                  </div>
                              </td>
                              <td class="px-4 py-2 text-xs lg:text-sm text-gray-600 text-center">
                                  <span class="font-semibold text-gray-700"> 
                                        $' . $cart[2] . '
                                  </span>
                              </td>
                              <td class="px-4 py-2 text-xs lg:text-sm  text-gray-600 text-center">
                                  <span class="font-semibold text-gray-700">
                                        $' . $total . '
                                 </span>
                              </td>
                                <td class="px-5 py-2 text-xs lg:text-sm  text-gray-600 text-">
                                    <a href="' . $deleteUrl . '" class="text-red-500 hover:text-red-600">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                                            <path
                                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                        </svg>
                                    </a>
                          </tr>';
                                }
                            }
                            ?>

                      </tbody>
                  </table>
                  <a href="index.php?action=index.php" class="hidden lg:flex font-semibold text-indigo-600 text-sm mt-5">
                      <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                          <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                      </svg>
                      Continue Shopping
                  </a>
              </div>

              <div id="summary" class="hidden lg:block w-1/4 px-8 pb-5">
                  <h1 class="font-semibold text-2xl border-b pb-8">
                      Payment Details
                  </h1>

                  <div class="pb-5">
                      <div class="receipt">
                          <?php
                            foreach (($_SESSION['my_cart']) as $cart) {
                                $total = $cart[5] * $cart[2];
                                echo '
                             <div class="receipt__product flex gap-2 justify-between items-center p-2 border-b-[3px] border-dashed">
                                 <span class="repcript__product-quantity  text-sm font-light">x' . $cart[5] . '</span>
                                 <h1 class="repcript__product-name text-xs text-gray-500 font-light">
                                        ' . $cart[1] . '
                                 </h1>
                                 <span class="repcript__product-price font-medium text-sm">$' . $total . '</span>
                             </div>';
                            }
                            ?>

                          <div class="mt-5">
                              <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                                  <span>Total cost</span>
                                  <span><?php echo $totalPrice ?> $</span>
                              </div>
                              <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                                  <a href="index.php?action=checkout">
                                      Checkout
                                  </a>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="list__prouduct__cart-mobile flex flex-col sm:hidden  gap-5 px-5">
              <?php
                foreach (($_SESSION['my_cart']) as $cart) {
                    echo '<div class="item__prouduct__cart-mobile border-b-[3px] border-dashed pb-2 flex gap-3">
                         <img src="' . $imageSrc . '"  class="w-24 h-24 object-cover" />
                         <div class="item__prouduct__cart-mobile--info flex flex-col gap-2">
                             <h1 class="text-xs font-medium">
                                    ' . $cart[1] . '
                             </h1>
                             <div class="flex flex-col gap-2">
                                 <form class="quantity" action="index.php?action=viewCart" method="POST">
                                     <button type="submit" name="decqty" class=" text-gray-600 w-2">
                                         <svg class="text-gray-600 w-2" viewBox="0 0 448 512">
                                             <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                         </svg>
                                     </button>
                                     <input name="quantity" id="quantity" class=" mx-2 border text-center w-10" type="number" min="1" value="' . $cart[5] . '" />
                                     <input type="hidden" name="product_id" value="' . $cart[0] . '" />
                                     <button type="submit" name="incqty" class=" text-gray-600 w-3">
                                         <svg class=" text-gray-600 w-2" viewBox="0 0 448 512">
                                             <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                         </svg>
                                     </button>
                                 </form>
                                 <div class="text flex gap-2">
                                     <span class="text-xs text-gray-500">
                                     x' . $cart[5] . '
                                     </span>
                                     <span class="text-xs text-gray-500">
                                        $' . $cart[2] . '
                                     </span>
                                 </div>
                             </div>
                         </div> ';
                }
                ?>

          </div>
          <a href="index.php?action=index.php" class=" flex sm:hidden font-semibold text-indigo-600 text-sm">
              <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                  <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
              </svg>
              Continue Shopping
          </a>


          <div class="total__checkout__price flex justify-between lg:hidden  gap-10 px-5">
              <span class="font-semibold text-sm uppercase">Total cost :</span>
              <span class="text-sm text-orange-600">$<?php echo $totalPrice ?></span>
          </div>
          <div class="total__checkout__button px-5 pb-3 flex lg:hidden">
              <a class="w-full" href="index.php?action=checkout">
                  <button class="bg-indigo-500 rounded-md font-semibold hover:bg-indigo-600 p-3 text-sm text-white uppercase w-full">
                      Checkout
                  </button>
              </a>
          </div>
      </div>
  </main>