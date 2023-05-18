    <main>
     <section class="add__category w-full mt-5">
         <section class="add__products-title flex  items-center gap-1">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
             </svg>
             <h1 class="text-left lg:text-xl text-gray-500">EDIT CATEGORY</h1>
         </section>

         <section class="mt-5 bg-[rgba(255, 255, 255, 0.4)] shadow-2xl rounded-xl p-5 lg:p-6 w-full">
             <form action="index.php?action=updateCategory" class="form__add-category w-full" method="post" enctype="multipart/form-data">
                 <div class="list__form-group w-full grid  grid-cols-1 gap-10">
                     <div class="form__group flex flex-col">
                         <label for="categorytid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">CATEGORY ID</label>
                         <input placeholder="Auto generate" disabled type="text" name="productid" id="product__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" value="<?php if (isset($id)) {
                echo $id;
            } ?>" />
                     </div>
                     <div class="form__group flex flex-col ">
                         <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">CATEGORY NAME</label>
                         <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="category_name" id="name" placeholder="Product name" value="<?php if (isset($category_name)) {
                                                                                                                                                                                                                                                                                                            echo $category_name;
                                                                                                                                                                                                                                                                                                        } ?>" />
                     </div>

                     <div class="form__add-category--list-button w-full mt-7 flex gap-3 justify-center items-center">
                         <input type="hidden" name="id" value="<?php if (isset($id)) {
                                                                    echo $id;
                                                                } ?>">
                         <button type="submit" name="submit" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                             Save
                         </button>
                         <button type="reset" name="reset" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                             Reset
                         </button>
                     </div>
                     <?php if (isset($notification)) : ?>
                         <?php echo $notification; ?>
                     <?php endif; ?>

             </form>
         </section>
     </section>
     <!-- End add_product -->
     </main>