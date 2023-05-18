  <?php
    foreach ($productList as $product) {  // Lặp danh sách danh mục
        extract($product); // Tách mảng thành các biến riêng
    }

    ?>
  <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
      <section class="add__products w-full mt-5">
          <section class="add__prodcuts-title flex  items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <h1 class="text-left lg:text-xl text-gray-500">EDIT PRODUCT</h1>
          </section>

          <section class="mt-5 bg-[rgba(255, 255, 255, 0.4)] shadow-2xl rounded-xl p-5 lg:p-6 w-full">
              <form action="index.php?action=updateProduct" class="form__add-products w-full" method="post" enctype="multipart/form-data">
                  <div class="list__form-group w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                      <div class="form__group flex flex-col">
                          <label for="productid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">Product ID</label>
                          <input placeholder="Auto generate" disabled type="text" name="productid" id="product__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" value="<?php if (isset($id)) {
                echo $id;
            } ?>" />
                      </div>
                      <div class="form__group flex flex-col ">
                          <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Product name</label>
                          <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="product_name" id="name" placeholder="Product name" required value="<?php if (isset($product_name)) {
                                                                                                                                                                                                                                                                                                            echo $product_name;
                                                                                                                                                                                                                                                                                                        } ?> " />
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
                          <input class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" type="date" name="date" id="date" placeholder="Date" value="<?php if (isset($date)) {
                                                                                                                                                                                                                                                                echo $date;
                                                                                                                                                                                                                                                            } ?>" />
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
                          <input type="file" name="image" id="image" placeholder="Image" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" value="<?php if (isset($image)) {
                                                                                                                                                                                                                                                                    echo $image;
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                ?>" />
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
                          <input type="number" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="price" id="price" placeholder="Price" value="<?php if (isset($price)) {
                                                                                                                                                                                                                                                                                                        echo $price;
                                                                                                                                                                                                                                                                                                    } ?>" required/>
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
                          <input type="number" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="quantity" id="quantity" placeholder="Quantity" value="<?php if (isset($quantity)) {
                                                                                                                                                                                                                                                                                                                echo $quantity;
                                                                                                                                                                                                                                                                                                            } ?>" required/>
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
                          <input type="number" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="discount" id="discount" placeholder="Discount" value="<?php if (isset($discount)) {
                                                                                                                                                                                                                                                                                                                echo $discount;
                                                                                                                                                                                                                                                                                                            } ?>" />
                      </div>

                      <div class="form__group flex flex-col">
                          <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="category">Category</label>
                          <select name="category_id" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" >
                              <option value="0">All</option>
                              <?php
                                foreach ($categoryList as $category) {
                                    extract($category); // extract() sẽ tạo ra các biến từ key của mảng - database
                                    if ($category_id == $id) {
                                        echo "<option value=" . $id . " selected>" . $category_name . "</option>";
                                    } else {
                                        echo "<option value=" . $id . ">" . $category_name . "</option>";
                                    }
                                } ?>
                          </select>
                      </div>

                      <div class="form__group flex flex-col">
                          <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="status">Status</label>
                          <div class="input__radio flex gap-3 mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500">
                              <?php
                                foreach ($productList as $product) {
                                    extract($product);
                                    if ($status == 1) {
                                        echo "<input  type='radio' name='status' value='1' checked>Special";
                                        echo "<input type='radio' name='status' value='0'>Normal";
                                    } else {
                                        echo "<input type='radio' name='status' value='1'>Special";
                                        echo "<input type='radio' name='status' value='0' checked>Normal";
                                    }
                                }
                                ?>
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
                      <textarea cols="30" rows="10" placeholder="Enter the detail..." name="detail" id="detail" class="mt-2 p-2 px-3   shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md  text-gray-500" required>
                        <?php if (isset($detail)) {
                            echo $detail;
                        } ?>
                         
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
                      <input type="hidden" name="id" value="<?php if (isset($id)) {
                                                                echo $id;
                                                            } ?>">
                      <button type="submit" name="submit" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
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
                  <?php if (isset($notification)) : ?>
                      <?php echo $notification; ?>
                  <?php endif; ?>

              </form>
          </section>
      </section>
      <!-- End add_product -->
  </main>