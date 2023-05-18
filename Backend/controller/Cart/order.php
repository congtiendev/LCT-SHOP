   <?php


    ?>
   <main class="w-full mt-14 px-8 md:px-14 lg:px-24">
       <img class="w-full h-auto" src="https://www.revechat.com/wp-content/uploads/2022/06/image_2022_06_09T10_44_05_419Z.png" alt="" />
       <?php
        if (isset($bill_detail) && is_array($bill_detail)) {
            extract($bill_detail);
        }
        ?>
       <div class="order__info flex flex-col  justify-between sm:flex-row-reverse px-5 lg:px-20">
           <div class="order__info__title mt-5">
               <h1 class="text-lg sm:text-2xl font-bold text-gray-700">
                   Order #<?= $bill_detail['id'] ?>
               </h1>
               <p class="text-gray-500 text-sm mt-2">Placed on <?= $bill_detail['bill_date'] ?></p>
           </div>
           <div class="order__info__address mt-5">
               <h1 class="text-lg sm:text-2xl font-bold text-gray-700">
                   Shipping Address
               </h1>
               <p class="text-gray-500 text-lg mt-1"><?= $bill_detail['bill_name'] ?></p>
               <p class="text-gray-500 text-sm mt-2">
                   <?= $bill_detail['bill_address'] ?>
               </p>
           </div>

       </div>

       <div class="order__products lg:px-20 my-5">
           <table class="table-auto hidden sm:block w-full">
               <thead>
                   <tr>
                       <th class="px-4 py-2 text-left font-semibold text-gray-600 text-xs uppercase">
                           Products details
                       </th>
                       <th class="px-4 py-2 font-semibold text-gray-600 text-xs uppercase">
                           Quantity
                       </th>
                       <th class="px-4 py-2 font-semibold text-gray-600 text-xs uppercase">
                           Price
                       </th>
                       <th class="px-4 py-2 font-semibold text-gray-600 text-xs uppercase">
                           Total
                       </th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                    bill_detail_product($bill_detail_cart);
                    ?>
               </tbody>
           </table>
           <div class="list__prouduct__cart-mobile flex sm:hidden flex-col gap-5 px-5">
               <?php
                bill_detail_product_mobile($bill_detail_cart);
                ?>
           </div>

           <div class="payment__method-total__price w-full mt-5 flex flex-col sm:flex-row gap-5  justify-between px-5 lg:px-20">
               <div class="payment__method flex  items-center justify-between  sm:gap-10">
                   <h1 class="text-base sm:text-lg font-bold text-gray-700">
                       Payment Method
                   </h1>
                   <p class="text-gray-500 text-sm"><?php
                                                    if ($bill_detail['bill_payment'] == 1) {
                                                        echo 'Payment on delivery';
                                                    } else if ($bill_detail['bill_payment'] == 2) {
                                                        echo 'MOMO';
                                                    } else {
                                                        echo 'Credit card';
                                                    }
                                                    ?></p>
               </div>

               <div class="total__price flex  items-center justify-between sm:gap-5">
                   <h1 class="text-base sm:text-lg font-bold text-gray-700">
                       Total
                   </h1>
                   <p class="text-gray-500 text-sm">$<?= $bill_detail['bill_total'] ?></p>
               </div>
           </div>

           <div class="cancel-oder w-full flex sm:justify-end my-10">
               <a href="index.php?action=index.php" class="hidden lg:flex font-semibold text-indigo-600 text-sm mt-5">
                   <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                       <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                   </svg>
                   Continue Shopping
               </a>
           </div>
   </main>