   <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
       <div class="quantity__statistics flex justify-between gap-3 pt-5 mb-8">
           <div style="border-radius: 20px; background: linear-gradient(145deg, #ffffff, #e6e6e6);
box-shadow: 25px 25px 43px #dedede, -25px -25px 43px #ffffff;
" class="quantity__statistics-products flex items-center gap-3 p-5">
               <div class="icon__product w-20 h-20 rounded-[50%] bg-orange-500 p-5">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                       <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                   </svg>
               </div>
               <div class="quantity__statistics-products--content flex flex-col gap-2">
                   <h1 class="font-medium text-4xl text-center text-gray-700">
                       <?php echo $products_total; ?>
                   </h1>
                   <p class="font-medium text-sm text-gray-500">
                       Total products
                   </p>
               </div>
           </div>

           <div style="border-radius: 20px; background: linear-gradient(145deg, #ffffff, #e6e6e6);
box-shadow: 25px 25px 43px #dedede, -25px -25px 43px #ffffff;
" class="quantity__statistics-products flex items-center gap-3 p-5">
               <div class="icon__product w-20 h-20 rounded-[50%] bg-sky-500 p-5">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                   </svg>
               </div>
               <div class="quantity__statistics-products--content flex flex-col gap-2">
                   <h1 class="font-medium text-4xl text-center text-gray-700">
                       <?php if (isset($accounts_total)) {
                            echo $accounts_total;
                        } ?>
                   </h1>
                   <p class="font-medium text-sm text-gray-500">
                       Total users
                   </p>
               </div>
           </div>

           <div style="border-radius: 20px; background: linear-gradient(145deg, #ffffff, #e6e6e6);
box-shadow: 25px 25px 43px #dedede, -25px -25px 43px #ffffff;
" class="quantity__statistics-products flex items-center gap-3 p-5">
               <div class="icon__product w-20 h-20 rounded-[50%] bg-green-600 p-5">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                   </svg>
               </div>
               <div class="quantity__statistics-products--content flex flex-col gap-2">
                   <h1 class="font-medium text-4xl text-center text-gray-700">
                       <?php echo $comment_total; ?>
                   </h1>
                   <p class="font-medium text-sm text-gray-500">
                       Total comments
                   </p>
               </div>
           </div>

           <div style="border-radius: 20px; background: linear-gradient(145deg, #ffffff, #e6e6e6);
box-shadow: 25px 25px 43px #dedede, -25px -25px 43px #ffffff;
" class="quantity__statistics-products flex items-center gap-3 p-5">
               <div class="icon__product w-20 h-20 rounded-[50%] bg-pink-600 p-5">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                   </svg>
               </div>
               <div class="quantity__statistics-products--content flex flex-col gap-2">
                   <h1 class="font-medium text-4xl text-center text-gray-700">
                       <?php echo $order_total; ?>
                   </h1>
                   <p class="font-medium text-sm text-gray-500">
                       Total orders
                   </p>
               </div>
           </div>
       </div>
       <!-- End quantity__statistics -->
       <div class="notifications__top-products w-full flex gap-5">
           <div class="notifications w-[70%] h-[400px]">
               <h1 class="title__notification flex items-center gap-2 text-lg pl-3 pb-2 text-left uppercase ">
                   Notifications
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500 animate__animated animate__swing animate__infinite">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                   </svg>
               </h1>
               <div class="notifications__list flex flex-col p-3 gap-4 w-full max-h-[350px] overflow-auto">
                   <?php
                    foreach ($notificationList as $notification) {
                        extract($notification);
                        echo '
       <div class="notification-item w-full flex gap-4 p-3 shadow-md rounded-md">
                       <div class="notification-item__icon w-12 h-12">
                           <img src="' . $imageSrc . '" class="w-12 h-auto" alt="" />
                       </div>
                       <div class="notification-item__content flex flex-col gap-1">
                           <h1 class="font-medium text-lg text-gray-700">
                                 ' . $title . '
                           </h1>
                           <p class="text-sm text-gray-500">
                                 ' . $content . '
                           </p>
                           <span class="font-light text-xs text-gray-500">
                                    ' . $date . '
                           </span>
                       </div>
                   </div>
    ';
                    }
                    ?>

               </div>
           </div>

           <div class="top-products w-[30%] h-[400px] flex flex-col gap-3 px-3 py-5 shadow-md rounded-md">
               <h1 class="title__top-product text-lg text-center uppercase ">
                   Top products
               </h1>
               <div class="top-products--list flex flex-col gap-3 max-h-[350px] overflow-auto">
                   <?php
                    foreach ($products_top as $product) {
                        extract($product); // extract() sẽ tạo ra các biến từ key của mảng - database
                        $productUrl = "index.php?action=productDetail&id=" . $id;
                        $imageSrc = $imageUrl . $image;
                        echo '  <div class="top-products--items flex gap-2 px-2 pt-3 rounded-md border hover:bg-gray-100">
                       <div class="product-item-img w-16 h-16">
                           <img  src="' . $imageSrc . '" class="w-16 h-auto" alt="" />
                       </div>
                       <div class="product-item-content flex flex-col gap-1">
                           <a  href="' . $productUrl . '" class="text-xs text-gray-700" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
2; overflow: hidden;text-overflow: ellipsis;">
                               ' . $product_name . '
                           </a>
                           <p class="font-light text-xs text-gray-500">
                                 ' . $view . ' views
                           </p>
                       </div>
                   </div>';
                    }
                    ?>
               </div>
           </div>
       </div>
   </main>