  <main class="w-full mt-14">
      <?php
        if (isset($_SESSION['account_info']) && (is_array($_SESSION['account_info']))) {
            extract($_SESSION['account_info']);
            $avatarSrc = $avatarUrl . $avatar;
        }
        ?>
      <div class="profile__box my-10 w-full flex justify-center">
          <div class="profile__edit flex flex-col gap-5">
              <div class="profile__edit-title flex flex-col gap-2">
                  <h1 class="text-xl text-center sm:text-left">EDIT PROFILE</h1>
                  <p class="sub-title text-sm text-gray-500 text-center sm:text-left
">
                      Manage profile information for account security
                  </p>
              </div>

              <form action="index.php?action=editAccount" method="post" enctype="multipart/form-data" class="form__login--content w-full flex flex-col justify-center items-center gap-5">
                  <div class="list__form-input w-[300px] sm:w-full flex flex-col sm:grid sm:grid-cols-2 gap-4">
                      <div class="form__group flex flex-col gap-2 ">
                          <label for="fullname">Full name</label>
                          <input type="text" name="fullname" id="fullname" placeholder="fullname" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" value="<?= $fullname ?>" />
                      </div>
                      <div class="form__group flex flex-col gap-2">
                          <label for="user_name">Username</label>
                          <input type="text" name="user_name" id="username" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Username" readonly value="<?= $user_name ?>" />
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="gender">Gender</label>
                          <div class="gender__input flex gap-2 text-xs border border-gray-700 p-3 w-full rounded-sm focus:border-orange-500
">
                              <?php
                                if (isset($_SESSION['account_info'])) {
                                    $gender = $_SESSION['account_info']['gender'];
                                    if ($gender == 0) {
                                        echo "<input type='radio' name='gender' value='0' checked>Male";
                                        echo "<input type='radio' name='gender' value='1'>Female";
                                    } else {
                                        echo "<input type='radio' name='gender' value='0'>Male";
                                        echo "<input type='radio' name='gender' value='1' checked>Female";
                                    }
                                }
                                ?>
                              <!-- <input type="radio" name="gender" value="0">Male
                              <input type="radio" name="gender" value="1">Female -->
                          </div>
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="birth_year">Birth year</label>
                          <input type="date" name="birth_year" id="birth_year" class="form__input  text-xs border border-gray-700  p-[11px] w-full rounded-sm focus:border-orange-500 focus:outline-none
                          " value="<?php if (isset($birth_year)) {
                                        echo $birth_year;
                                    } ?>" />
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm focus:border-orange-500 focus:outline-none" placeholder="Email" value="<?= $email ?>" />
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="phone">Phone</label>
                          <input type="number" min="0" name="phone" id="phone" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Phone" value="<?= $phone ?>" />
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="address">Address</label>
                          <input type="text" name="address" id="address" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Address" value="<?= $address ?>" />
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="avatar">Avatar</label>
                          <input type="file" name="avatar" id="avatar" class="form__input  text-xs border border-gray-700  p-[9px] w-full rounded-sm focus:border-orange-500 focus:outline-none" placeholder="avatar" />
                      </div>
                  </div>
                  <div class="form__group flex flex-row justify-center items-center gap-2">
                      <a href="index.php?action=changePassword" class="change__password text-center text-orange-500 hover:underline">Change password</a>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-black">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                  </div>
                  <div class="form__group w-[90%] flex flex-col sm:w-auto sm:flex-row  justify-center items-center gap-3">
                      <input type="hidden" name="id" value="<?= $id ?>" />
                      <button type="submit" name="update_account" class="text-white bg-orange-600 p-2 rounded-sm w-full sm:w-[100px] text-center">
                          SAVE
                      </button>
                      <button type="reset" class="text-white bg-orange-600 p-2 rounded-sm w-full sm:w-[100px] text-center">
                          RESET
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </main>