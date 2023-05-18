  <main class="w-full mt-14">
      <?php
        if (isset($_SESSION['account_info']) && (is_array($_SESSION['account_info']))) {
            extract($_SESSION['account_info']);
            $avatarSrc = $avatarUrl . $avatar;
        }
        ?>
      <div class="profile__box my-10 w-full flex justify-center sm:gap-8 md:gap-12">
          <div class="profile__card bg-white justify-center flex flex-col w-[250px] h-[280px] sm:w-[250px] sm:h-[250px] lg:w-[300px] lg:h-[300px] px-3 py-5 rounded-md shadow-md  items-center  gap-4">
              <div class="profile__card-avatar flex items-center gap-3">
                  <img class="w-[50px] h-[50px] lg:w-[80px] lg:h-[80px] rounded-[50%]" src="<?= $avatarSrc ?>" alt="" />
                  <div class="profile__card-name flex flex-col">
                      <h2 class="text-lg lg:text-xl"><?= $fullname ?></h2>
                      <span class="text-sm sm:text-xs text-gray-500"><?= $user_name ?></span>
                  </div>
              </div>

              <div class="profile__card-info flex flex-col gap-2">
                  <p class="text-gray-500 flex items-center gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                      </svg>
                      <span class="text-sm sm:text-xs"><?= $address ?></span>
                  </p>

                  <p class="text-gray-500 flex items-center gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                      </svg>
                      <span class="text-sm sm:text-xs">
                          <?php
                            if ($gender == 1) {
                                echo 'Male';
                            } else {
                                echo 'Female';
                            }
                            ?>
                      </span>
                  </p>

                  <p class="text-gray-500 flex items-center gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                      </svg>
                      <span class="birth_year text-sm sm:text-xs">
                          <?php
                            echo date('d/m/Y', strtotime($birth_year));
                            ?>
                      </span>
                  </p>

                  <p class="text-gray-500 flex items-center gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                      </svg>
                      <span class="text-sm sm:text-xs text-[#ff6b6b]"><?= $phone ?></span>
                  </p>

                  <p class="text-gray-500 flex items-center gap-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                      </svg>
                      <span class="text-sm sm:text-xs"><?= $email ?></span>
                  </p>
              </div>
              <a href="index.php?action=editAccountMobile" class="edit__profile-btn sm:hidden flex items-center justify-center gap-2 text-white text-sm bg-orange-600 p-2 rounded-sm w-full text-center">
                  <span>Edit Profile</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
              </a>
          </div>

          <div class="profile__edit hidden sm:flex flex-col gap-5">
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
                          <span class="error text-red-500 text-xs"><?php
                                                                    if (isset($error['fullname'])) {
                                                                        echo $error['fullname'];
                                                                    }
                                                                    ?></span>
                      </div>
                      <div class="form__group flex flex-col gap-2">
                          <label for="user_name">Username</label>
                          <input type="text" name="user_name" id="username" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Username" readonly value="<?= $user_name ?>" />
                          <span class="error text-red-500 text-xs"><?php
                                                                    if (isset($error['user_name'])) {
                                                                        echo $error['user_name'];
                                                                    }
                                                                    ?></span>
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
                              <span class="error text-red-500 text-xs"><?php
                                                                        if (isset($error['gender'])) {
                                                                            echo $error['gender'];
                                                                        }
                                                                        ?></span>
                          </div>
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="birth_year">Birth year</label>
                          <input type="date" name="birth_year" id="birth_year" class="form__input  text-xs border border-gray-700  p-[11px] w-full rounded-sm focus:border-orange-500 focus:outline-none
                          " value="<?php if (isset($birth_year)) {
                                        echo $birth_year;
                                    } ?>" />
                          <span class="error text-red-500 text-xs"><?php
                                                                    if (isset($error['birth_year'])) {
                                                                        echo $error['birth_year'];
                                                                    }
                                                                    ?></span>
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm focus:border-orange-500 focus:outline-none" placeholder="Email" value="<?= $email ?>" />
                          <span class="error text-red-500 text-xs"><?php
                                                                    if (isset($error['email'])) {
                                                                        echo $error['email'];
                                                                    }
                                                                    ?></span>
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="phone">Phone</label>
                          <input type="number" min="0" name="phone" id="phone" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Phone" value="<?= $phone ?>" />
                          <span class="error text-red-500 text-xs"><?php
                                                                    if (isset($error['phone'])) {
                                                                        echo $error['phone'];
                                                                    }
                                                                    ?></span>
                      </div>

                      <div class="form__group flex flex-col gap-2">
                          <label for="address">Address</label>
                          <input type="text" name="address" id="address" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Address" value="<?= $address ?>" />
                          <span class="error text-red-500 text-xs">
                              <?php
                                if (isset($error['address'])) {
                                    echo $error['address'];
                                }
                                ?>
                          </span>
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