    <main class="w-full my-12 px-5 md:px-14 lg:px-20
">
        <div class="my__order w-full flex justify-center items-center flex-col gap-3">
            <h1 class="text-2xl text-left flex items-center gap-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                MY ORDERS
            </h1>

            <?php
            if (is_array($list_bill_order) && is_array($list_cart_order)) {
                foreach ($list_cart_order as $cart) {
                    extract($cart);
                }

                foreach ($list_cart_order as $cart) {
                    extract($cart);
                    foreach ($list_bill_order as $bill) {
                        extract($bill);
                        $status = get_status_bill($bill['bill_status']);
                        if ($bill['bill_payment'] == 1) {
                            $payment = ' <p class="text-xs lg:text-sm flex items-center gap-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-orange-600">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                 </svg>
                                 Please pay <span class="text-orange-600">
                                        $' . $bill['bill_total'] . '
                                 </span> upon
                                 delivery
                             </p>';
                        } else {
                            $payment = '<p class="text-xs lg:text-sm flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Paid
                            </p>';
                        }
                    }

                    echo '         
             <form action="" class="w-full px-3 py-2 shadow-md mb-3 block relative">
              <div class="bill_id absolute top-0 left-0">
                <p class="text-xs bg-orange-600 text-white rounded-full p-2 ">#' . $cart['bill_id'] . '</p>
              </div>
              <div class="my__order-item  flex  gap-3 p-3 border border-dashed">
                <div class="w-20 h-auto">
                  <img src="
                  '. $imageUrl. $cart['image'] . '
                  " alt="" class="w-26 h-auto" />
                </div>
                <div class="w-full my__order-item--info flex flex-col justify-between">
                  <h3 class="text-xs lg:text-lg font-semibold">
                    ' . $cart['product_name'] . '
                  </h3>
                  <p class="text-xs lg:text-sm text-gray-500">
                    Quantity : ' . $cart['quantity'] . '
                  </p>
                  <div
                    class="date__status flex flex-col sm:flex-row justify-between"
                  >
                    <p class="text-xs lg:text-sm text-gray-500">
                      Date : ' . $bill['bill_date'] . '
                    </p>
                    <p class="text-xs lg:text-sm text-orange-600">
                        ' . $status . '
                    </p>
                  </div>
                </div>
              </div>

              <div
                class="total__price--cancel__order flex flex-col gap-2 sm:flex-row justify-between items-center"
              >
                <div class="total__price flex flex-col gap-1 mt-3">
                  <div class="total__price--item flex items-center  gap-2">
                    <p class="text-xs lg:text-sm text-gray-500">
                      TOTAL PRICE :
                    </p>
                    <p class="text-xs lg:text-sm text-orange-500">
                        $' . $cart['total'] . '
                    </p>
                  </div>
                </div>
              </div>
            </form>
            ';
                }
            }

            ?>
        </div>
    </main>