     <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
         <section class="edit__account w-full mt-5">
             <section class="edit__products-title flex  items-center gap-1">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                 </svg>
                 <h1 class="text-left lg:text-xl text-gray-500 uppercase">edit account</h1>
             </section>

             <section class="mt-5  w-full">
                 <form action="index.php?action=updateRole" class="form__edit-account w-full" method="post" enctype="multipart/form-data">
                     <div class="list__form-group w-full grid  grid-cols-1 gap-10">
                         <div class="form__group flex flex-col">
                             <label for="accounttid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">ACCOUNT ID</label>
                             <input placeholder="Auto generate" disabled type="text" name="productid" id="product__id" class="form__input-edit__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" />
                         </div>
                         <div class="form__group flex flex-col ">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">ROLE</label>
                             <select class="form__input form__input-edit__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base  bg-gray-100
                                    mt-2 p-2 px-3 rounded-md text-gray-500" name="role" id="role">
                                 <option value="0">USER</option>
                                 <option value="1">ADMIN</option>
                             </select>
                         </div>

                         <div class="form__edit-account--list-button w-full mt-7 flex gap-3 justify-center items-center">
                             <?php foreach ($accountList as $account) {  // Lặp danh sách danh mục
                                    extract($account); // Tách mảng thành các biến riêng
                                }
                                echo ' <input type="hidden" name="id" value="' . $id .  '">';
                                ?>
                             <button type="submit" name="save" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                                 SAVE
                             </button>
                         </div>
                 </form>
             </section>
         </section>
         <!-- End edit_product -->
     </main>