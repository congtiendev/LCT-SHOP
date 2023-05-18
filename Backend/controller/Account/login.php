    <main class="w-full mt-14">
        <h1 class="text-3xl text-center">LOGIN</h1>
        <div class="form__login my-10 w-full flex justify-center">
            <form action="index.php?action=login" method="post" enctype="multipart/form-data" class="form__login--content w-[300px] sm:w-[500px]  flex flex-col  gap-4">
                <div class="form__group flex flex-col gap-2">
                    <label for="user_name">Username</label>
                    <input type="text" name="user_name" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm
                  focus:border-orange-500 focus:outline-none" placeholder="Username" />
                    <span class="text-red-500 text-xs"><?php
                                                        if (isset($error['user_name'])) {
                                                            echo $error['user_name'];
                                                        }
                                                        ?></span>

                </div>
                <div class="form__group flex flex-col gap-2 ">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-sm 
                  focus:border-orange-500 focus:outline-none" placeholder="Password" />
                    <span class="text-red-500 text-xs"><?php
                                                        if (isset($error['password'])) {
                                                            echo $error['password'];
                                                        }
                                                        ?></span>
                    <span class="text-red-500 text-xs"><?php
                                                        if (isset($error['login'])) {
                                                            echo $error['login'];
                                                        }
                                                        ?></span>
                </div>

                <div class="form__group flex flex-col justify-center items-center gap-3">
                    <a href="index.php?action=forgotPassword" class="text-center text-gray-500 ">Forgot your password?</a>
                    <button type="submit" name="login" class="text-white bg-orange-600 p-2 rounded-sm w-full sm:w-[100px] text-center">
                        LOGIN
                    </button>

                    <p class="text-center  text-gray-500">
                        Don't have an account?
                        <a href="index.php?action=createAccount" class=" text-orange-500 hover:underline">Sign up</a>
                    </p>
                </div>
            </form>
        </div>
    </main>