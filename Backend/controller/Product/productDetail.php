 <main class="w-full px-8 lg:px-20
">
     <section style="border-radius: 11px;
background: #fffafa;
box-shadow:  20px 20px 60px #d9d5d5,
             -20px -20px 60px #ffffff;" class="product__detail p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 w-full
 my-10">
         <?php
            extract($productDetail);
            $imageSrc = $imageUrl . $image;
            $discountPrice = $price - ($price * $discount / 100);
echo '
            <div class="product__detail__img relative">
              <img
                    src="' . $imageSrc . '"
                    alt="KeyBoard"
                  />
             <div style="background-image: url(./IMG/sale.png);" class="sale absolute w-28 h-28 top-[-0] right-0 bg-contain bg-no-repeat flex justify-center items-center animate__animated animate__swing animate__infinite">
                 <p class="discount text-[11px] font-medium">
                     SALE OF <br />
                     <span class="text-xl font-semibold text-red-700">' . $discount . '%</span>
                 </p>
             </div>
         </div>

          <section class="product__detail__info flex flex-col gap-5"> 
         <h1 class="product__detail__info-name text-2xl lg:text-3xl font-bold">
                ' . $product_name . '
         </h1>

         <div class="product__detail__info-view flex gap-3  items-center">
             <img class="rating w-32" src="./IMG/rating.png" alt="" />

             <span class="text-lg font-light flex items-center gap-2 text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon text-lg font-medium text-gray-500
">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                 </svg>
                 ' . $view . '</span>
         </div>

         <div class="product__detail__info-price flex gap-5">
             <span class="product__detail__info-price__old line-through  text-xl text-gray-500">$' . $price . '</span>
             <span class="product__detail__info-price__new text-xl font-bold text-orange-600">$' . $discountPrice . '</span>
         </div>
         <div class="product__detail__info-detail">
             <p class="text-sm font-light text-gray-500 text-justify">
                    ' . $detail . '
             </p>
         </div>
       
         
 
         <div class="product__detail__info-buy flex  mt-5">
          <form action="index.php?action=addCart"  method="POST">
                      <input type="hidden" name="id" value="' . $id . '">
                      <input type="hidden" name="product_name" value="' . $product_name . '">
                      <input type="hidden" name="price" value="' . $price . '">
                      <input type="hidden" name="image" value="' . $image . '">
                        <input type="hidden" name="category_id" value="' . $category_id . '">
             <button type="submit" name="add_to_cart" class="product__detail__info-buy__add bg-orange-600 uppercase text-white w-40 h-10 rounded-sm shadow-md">
                 Add to cart
             </button>
             <button style="margin-left:10px;" type="submit" name="buy_now" class="product__detail__info-buy__buy bg-gray-600 uppercase text-white w-40 h-10 rounded-sm shadow-md animate__animated animate__pulse animate__infinite">
                 Buy now
             </button>
             </form>
         </div>
     </section>
            '
            ?>
     </section>
     <!-- End detail product -->


     <section class="statistics-reviews__and__enter-comments mb-8 flex flex-col md:flex-row justify-between">
         <div class="statistics-reviews flex flex-col sm:flex-row gap-2">
             <div class="aggregate__rating flex flex-col gap-2">
                 <div class="aggregate__rating__star">
                     <?php
                        extract($productDetail);
                        $rating_average = rating_average($id);
                        if ($rating_average >= 1 && $rating_average < 2) {
                            echo '<span class=" font-bold text-yellow-500">
                               ★☆☆☆☆
                         </span>';
                        } else if ($rating_average >= 2 && $rating_average < 3) {
                            echo '<span class=" font-bold text-yellow-500">
                               ★★☆☆☆
                         </span>';
                        } else if ($rating_average >= 3 && $rating_average < 4) {
                            echo '<span class=" font-bold text-yellow-500">
                               ★★★☆☆
                         </span>';
                        } else if ($rating_average >= 4 && $rating_average < 5) {
                            echo '<span class=" font-bold text-yellow-500">
                               ★★★★☆
                         </span>';
                        } else if ($rating_average == 5) {
                            echo '<span class=" font-bold text-yellow-500">
                               ★★★★★
                         </span>';
                        } else {
                            echo '<span class="text-base font-bold text-yellow-500">
                               ☆☆☆☆☆
                         </span>';
                        }
                        ?>
                 </div>
                 <div class="aggregate__rating__number ">
                     <span class="text-2xl font-bold text-gray-600">
                         <?php
                            extract($productDetail);
                            $rating_average = rating_average($id);
                            echo round((float)$rating_average, 2);
                            ?>
                     </span>
                     <span class="text-sm font-light text-gray-500">/ 5</span>
                 </div>
                 <div class="aggregate__rating__total">
                     <span class="text-xs font-light text-gray-500">Based on
                         <span class="text-xs font-light text-orange-600"> <?php
                                                                            extract($productDetail);
                                                                            $countComment = comment_total_product($id);
                                                                            echo (int)$countComment;
                                                                            ?></span>
                         reviews</span>
                 </div>
             </div>

             <div class="flex justify-end gap-2">
                 <div class="image__rating">
                     <img class="w-36" src="./IMG/rating_all.png" alt="" />
                 </div>
             </div>
         </div>

         <div class="enter-comments flex gap-5 md:justify-end lg:justify-end items-center">
             <button style="border-radius: 15px;
background: linear-gradient(145deg, #e6e6e6, #ffffff);
box-shadow:  21px 21px 42px #d9d9d9,
             -21px -21px 42px #ffffff;" onclick="toggleComment();" class="enter__comment-btn text-sm  text-gray-500 p-2 w-full md:min-w-[180px] h-12 border border-gray-200  text-center flex justify-center gap-2 items-center">
                 Comments
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                 </svg>

             </button>
         </div>
     </section>
     <!-- End  statistics-reviews__and__enter-comments-->

     <section class="write-comments bg-white hidden w-full p-5 sm:p-10 border border-gray-200 shadow-md mb-10 animate-slideUP">
         <form id="#comment" action="index.php?action=addComment&id=<?= $id ?>" class="comments__form bg-white w-full flex flex-col gap-5" enctype="multipart/form-data" method="post">
             <div class="form__group product__info flex gap-4">
                 <?php
                    extract($productDetail);
                    $imageSrc = $imageUrl . $image;
                    echo '  <div class="product__info__image">
                     <img class="w-16" src="' . $imageSrc . '" alt="" />
                 </div>
                 <div class="product__info__name">
                     <h1 class="text-xl font-medium text-gray-600">' . $product_name . '</h1>
                     <span class="text-sm font-light text-gray-500">Black / 64GB</span>
                 </div>'
                    ?>
             </div>

             <div class="form__group flex items-center
 gap-5">
                 <div class="form__group__rating__title ">
                     <span class="text-md font-normal text-gray-600">Your rating</span>
                 </div>

                 <fieldset class="rating">
                     <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>

                     <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>

                     <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>

                     <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                     <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                     <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                 </fieldset>
             </div>

             <div class="form__group flex flex-col gap-2">
                 <label class="text-md font-normal text-gray-600" for="comment">Comment</label>
                 <textarea class="form__group__comment font-light text-sm w-full h-40 p-3 border border-gray-200 shadow-md" name="content" id="comment" cols="30" rows="10" placeholder="Write your comment here"></textarea>
             </div>

             <div class="form__group image__rating w-full flex flex-col gap-2">
                 <label class="text-md font-normal text-gray-600" for="image">Image</label>
                 <input class="form__group__image font-light text-sm w-full  p-3 border border-gray-200 shadow-md" type="file" name="comment_img" id="image" />
             </div>
             <div class="form__group submit-rating w-full flex items-center justify-center">
                 <button type="submit" name="send" class="submit__rating-btn bg-orange-500 rounded-md text-md text-white p-2 w-full sm:w-20 md:min-w-[180px] h-12 border border-gray-200 shadow-md text-center">
                     SEND
                 </button>
             </div>
         </form>
     </section>

     <section class="list__review__comment w-full">
         <h1 class="text-2xl font-bold text-left">Review & Comment</h1>
         <div class="review__comment__content w-full">
             <?php
                foreach ($commentList as $comment) {
                    extract($comment);
                    $commentImageSrc = $commentImageUrl . $comment_img;
                    $avatarSrc = $avatarUrl . $avatar;
                    echo '
                 <div class="review__comment__content__item flex gap-5 my-5">
                 <div class="review__comment__content__item__img">
                     <img class="w-16 h-16 rounded-full" src="' . $avatarSrc . '" alt="" />
                 </div>
                 <div class="review__comment__content__item__info flex flex-col gap-3">
                     <div class="review__comment__content__item__info__name flex items-center gap-3">
                         <span class="text-base font-medium text-gray-600">
                                ' . $user_name . '
                         </span>
                        
                     <span class="text-base font-bold text-yellow-500">
                                ' . get_rating($rating) . '
                         </span>
                         
                     </div>
                     <div class="review__comment__content__item__info__content">
                         <p style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:
4; overflow: hidden;text-overflow: ellipsis;" class="text-sm font-light text-gray-500 text-justify">
                                ' . $content . '
                         </p>
                     </div>
                       <div class="img__comment w-32 h-auto">
                    <img
                      class="w-32 h-auto rounded-md"
                      src="' . $commentImageSrc . '"
                      alt=""
                    />
                  </div>
                     <div class="review__comment__content__item__info__date">
                         <span class="text-sm font-light text-gray-500">
                                ' . $date_comment . '
                         </span>
                     </div>
                 </div>
             </div>
                ';
                }
                ?>
         </div>
         <div class="paging">
             <div class="paging__content flex justify-center gap-3">
                 <button class="paging__content__item w-10 h-10 rounded-full border border-gray-200 shadow-md flex justify-center items-center">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                     </svg>
                 </button>
                 <button class="paging__content__item w-10 h-10 rounded-full border border-gray-200 shadow-md flex justify-center items-center">
                     1
                 </button>
                 <button class="paging__content__item w-10 h-10 rounded-full border border-gray-200 shadow-md flex justify-center items-center">
                     2
                 </button>
                 <button class="paging__content__item w-10 h-10 rounded-full border border-gray-200 shadow-md flex justify-center items-center">
                     3
                 </button>
                 <button class="paging__content__item w-10 h-10 rounded-full border border-gray-200 shadow-md flex justify-center items-center">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                     </svg>
                 </button>
             </div>
         </div>
     </section>

     <section class="similar__products my-16 w-full">
         <h1 class="similar__products-title text-center text-2xl ">
             YOU MAY ALSO LIKE
         </h1>
         <div class="product_same_category selection:w-full my-10">
             <div class="more-products mt-14">
                 <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-5 mt-6">
                     <!-- -------------------------------------------------- -->
                     <?php
                        foreach ($productSameCategory as $product) {
                            extract($product);
                            $productUrl = "index.php?action=productDetail&id=" . $id;
                            $imageSrc = $imageUrl . $image;
                            echo '<div
                class="product__card shadow-xl p-3 rounded-[15px] "
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
                <div class="product__card-desc p-1 ">
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
                      <button class="addcart__btn__icon ">
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
                    </div>
                  </div>
                </div>
              </div>
              ';
                        } ?>
                 </div>
             </div>
         </div>
     </section>
 </main>