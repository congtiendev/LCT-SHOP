     <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
         <section class="add__products w-full mt-5">
             <section class="add__prodcuts-title flex  items-center gap-1">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                 </svg>
                 <h1 class="text-left lg:text-xl text-gray-500">ADD PRODUCT</h1>
             </section>

             <section class="mt-5  w-full">
                 <form action="index.php?action=addProduct" class="form__add-products w-full" method="post" enctype="multipart/form-data">
                     <div class="list__form-group w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                         <div class="form__group flex flex-col">
                             <label for="productid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">Product ID</label>
                             <input placeholder="Auto generate" disabled type="text" name="productid" id="product__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" />

                         </div>
                         <div class="form__group flex flex-col ">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Product name</label>
                             <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="product_name" id="name" placeholder="Product name" value="<?php if (isset($_POST['product_name'])) echo $_POST['product_name']; ?>" />
                             <span class="text-red-500 text-xs mt-3 font-medium ">
                                 <?php
                                    if (isset($error['product_name'])) {
                                        echo $error['product_name'];
                                    }
                                    ?>
                             </span>
                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="date">Date</label>
                             <input class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" type="date" name="date" id="date" placeholder="Date" required value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" />
                             <span class="text-red-500 text-xs mt-3 font-medium ">
                                 <?php
                                    if (isset($error['date'])) {
                                        echo $error['date'];
                                    }
                                    ?>
                             </span>
                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="image">Image</label>
                             <input type="file" name="image" id="image" placeholder="Image" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" value="<?php if (isset($_FILE['image']['name'])) echo $_FILE['image']['name']; ?>" />
                             <span class="text-red-500 text-xs mt-3 font-medium ">
                                 <?php
                                    if (isset($error['image'])) {
                                        echo $error['image'];
                                    }
                                    ?>
                             </span>
                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="price">Price</label>
                             <input type="number" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="price" id="price" placeholder="Price" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" />
                             <span class="text-red-500 text-xs mt-3 font-medium ">
                                 <?php
                                    if (isset($error['price'])) {
                                        echo $error['price'];
                                    }
                                    ?>
                             </span>
                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="quantity">Quantity</label>
                             <input type="number" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="quantity" id="quantity" placeholder="Quantity" value="<?php if (isset($_POST['quantity'])) echo $_POST['quantity']; ?>" />
                             <span class="text-red-500 text-xs mt-3 font-medium ">
                                 <?php
                                    if (isset($error['quantity'])) {
                                        echo $error['quantity'];
                                    }
                                    ?>
                             </span>
                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="discount">Discount</label>
                             <input type="number" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="discount" id="discount" placeholder="Discount" value="<?php if (isset($_POST['discount'])) echo $_POST['discount']; ?>" />

                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="category">Category</label>
                             <select name="category_id" id="category_id" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500">
                                 <?php foreach ($categoryList as $category) {
                                        extract($category);
                                        echo "<option value=" . $id . ">" . $category_name . "</option>";
                                    } ?>
                             </select>


                         </div>

                         <div class="form__group flex flex-col">
                             <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="status">Status</label>
                             <div class="input__radio mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500">
                                 <input type="radio" name="status" value="1" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" />
                                 <label for="status" class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500">Special</label>
                                 <input type="radio" name="status" value="0" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" />
                                 <label for="status" class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500">Normal</label>
                             </div>
                             <span class="text-red-500 text-xs mt-3 font-medium ">
                                 <?php
                                    if (isset($error['status'])) {
                                        echo $error['status'];
                                    }
                                    ?>
                             </span>
                         </div>

                     </div>
                     <div class="form__group w-full mt-10 flex flex-col">
                         <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="detail">Detail</label>
                         <textarea cols="30" rows="10" placeholder="Enter the detail..." name="detail" id="detail" class="mt-2 p-2 px-3   shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md  text-gray-500">
                            <?php if (isset($_POST['detail'])) echo $_POST['detail']; ?>
                         </textarea>
                         <span class="text-red-500 text-xs mt-3 font-medium ">
                             <?php
                                if (isset($error['detail'])) {
                                    echo $error['detail'];
                                }
                                ?>
                         </span>
                     </div>

                     <div class="form__add-products--list-button w-full mt-7 flex gap-3 justify-center items-center">
                         <button type="submit" name="add_new" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                             Add new
                         </button>
                         <button type="reset" name="reset" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                             Reset
                         </button>
                     </div>
                 </form>
             </section>
         </section>
         <!-- End add_product -->

     </main>