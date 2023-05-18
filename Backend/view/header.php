<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CongTienDev KeyBoard</title>
    <link rel="icon" type="image/x-icon" href="./IMG/favicon.ico" sizes="16x16" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="./Site/css/style.css" />
    <link rel="stylesheet" href="./Site/css/base.css" />
</head>

<body>
    <div id="root" class="font-montserrat min-w-[320px] max-w-[1400px] mx-auto">
        <div class="content-wrapper max-w-screen-2xl mx-auto  text-base bg-white">
            <header class="py-6 lg:mx-10 max-w-[1400px]">
                <nav class="bg-white
                    fixed top-0 left-0 right-0 z-[100] 94
                    flex flex-row justify-between items-center p-4">
                    <a href="index.php">
                        <div class="logo  flex items-center justify-end font-semibold cursor-pointer mr-5 lg:mr-0">
                            <a href="index.php">
                                <img src="./Site/IMG/lct-logo.png" alt="logo" class="w-20 h-auto" />
                            </a>
                            <h1 class="text-xs font-bold italic text-orange-500">
                                CONGTIEN<span class="text-black">DEV</span>
                            </h1>
                        </div>
                    </a>
                    <ul id="list-menu" class="  hidden 
			        lg:flex lg:justify-end lg:items-center lg:gap-8 
					text-center text-sm text-gray-500 font-medium uppercase 
					cursor-pointer
					">
                        <li class="menu-item">
                            <a class="" href="../../../Tailwind/index.php">Home</a>
                        </li>
                        <li class="group relative">
                            <a class="" href="index.php?action=products">Products</a>
                            <div class="drop__dow absolute hidden  group-hover:lg:block group-hover:animate-down
 bg-white shadow-lg z-50">
                                <ul class="drop__dow__list sm:flex flex-col text-left mt-[10px]">
                                    <li class="drop__dow__item  hover:bg-gray-100 p-2">
                                        <a class="p-2 px-3" href="index.php?action=allProducts">ALL</a>
                                    </li>
                                    <?php foreach ($categoryList as $category) {
                                        extract($category);
                                        $categoryUrl = "index.php?action=products&category_id=" . $id;
                                        echo '<li class="drop__dow__item  hover:bg-gray-100 p-2">
                                        <a class="p-2 px-3" href="' . $categoryUrl . '">' . $category_name . '</a>
                                        </li>';
                                    } ?>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-item">
                            <a class="" href="index.php?action=about">About</a>
                        </li>
                        <li class="menu-item">
                            <a class="" href="https://www.facebook.com/devshop03">FANPAGE</a>
                        </li>
                    </ul>

                    <ul class="tools flex justify-between gap-1 sm:gap-3 items-center bassic-1/6 ml-4  lg:ml-16 
			         uppercase text-gray-700 text-sm font-semibold">
                        <li class="search-box md:w-[100px] lg:w-[150px] flex justify-end items-center group">
                            <form action="index.php?action=products" method="post" class="search flex items-center p-2 border rounded-2xl">
                                <input type="text" name="search" placeholder="Search" placeholder="Search" class="search__input bg-transparent focus:outline-none px-2" />
                                <button class="search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </button>
                            </form>
                        </li>

                        <li>
                            <?php
                            if (isset($_SESSION['account_info']) && $_SESSION['account_info']['role'] == 0) {
                                $avatarSrc = $avatarUrl . $_SESSION['account_info']['avatar'];
                                $user_name = $_SESSION['account_info']['user_name'];
                                echo '
       <div onclick="boxUser();" class="user__box relative group">
                                <a href="#" class="w-10 h-10 user flex items-center justify-center">
                                    <img class="w-6 h-6 sm:w-7 sm:h-7 rounded-[50%]" src="' . $avatarSrc . '" />
                                </a>
                                <div class="user__box__drop-dow hidden">
                                    <div class="user__box__drop-dow--content
 flex absolute  flex-col gap-3 left-1 w-[120px] h-44 md:w-32 bg-white rounded-md shadow-md p-3">
                                        <div class="edit__account w-full flex justify-center items-center gap-[6px]">
                                            <img class="w-6 h-6 sm:w-7 sm:h-7 rounded-[50%]" src="' . $avatarSrc . '" />
                                            <a href="" class="user__name text-[10px]">' . $user_name . '</a>
                                        </div>
                                        <div class="user__box__drop-dow--list-tools">
                                            <ul class="list-tools flex flex-col gap-2">
                                                <li class="list-tools__item">
                                                    <a href="index.php?action=editAccount" class="list-tools__item--link text-xs">My Account</a>
                                                </li>
                                                <li class="list-tools__item">
                                                    <a href="index.php?action=myorder" class="list-tools__item--link text-xs ">My order</a>
                                                </li>
                                                <li class="list-tools__item flex  items-center gap-2">
                                                    <a href="index.php?action=logout" class="list-tools__item--link text-xs
">LOG OUT</a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                                    </svg>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> ';
                            } else if (isset($_SESSION['account_info']) && $_SESSION['account_info']['role'] == 1) {
                                $avatarSrc = $avatarUrl . $_SESSION['account_info']['avatar'];
                                $user_name = $_SESSION['account_info']['user_name'];
                                echo '
       <div onclick="boxUser();" class="user__box relative group">
                                <a href="#" class="w-10 h-10 user flex items-center justify-center">
                                    <img class="w-6 h-6 sm:w-7 sm:h-7 rounded-[50%]" src="' . $avatarSrc . '" />
                                </a>
                                <div class="user__box__drop-dow hidden">
                                    <div class="user__box__drop-dow--content
 flex absolute  flex-col gap-3 left-1 w-[120px] md:w-32 h-44 bg-white rounded-md shadow-md p-3">
                                        <div class="edit__account w-full flex justify-center items-center gap-[6px]">
                                            <img class="w-6 h-6 sm:w-7 sm:h-7 rounded-[50%]" src="' . $avatarSrc . '" />
                                            <a href="" class="user__name text-[10px]">' . $user_name . '</a>
                                        </div>
                                        <div class="user__box__drop-dow--list-tools">
                                            <ul class="list-tools flex flex-col gap-2">
                                                 <li class="list-tools__item">
                                                    <a href="index.php?action=admin" class="list-tools__item--link text-xs">ADMIN</a>
                                                </li>
                                                <li class="list-tools__item">
                                                    <a href="index.php?action=editAccount" class="list-tools__item--link text-xs">My Account</a>
                                                </li>
                                                <li class="list-tools__item">
                                                    <a href="index.php?action=myorder" class="list-tools__item--link text-xs 
">My order</a>
                                                </li>
                                                <li class="list-tools__item flex  items-center gap-2">
                                                    <a href="index.php?action=logout" class="list-tools__item--link text-xs
">LOG OUT</a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                                    </svg>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> ';
                            } else {
                                echo '<a href="index.php?action=login" class="w-10 h-10 user flex items-center justify-center">
                                    <img class="w-6 h-6 sm:w-7 sm:h-7 rounded-[50%]" src="./Backend/uploads/avatar/default-avt.png" />
                                </a> ';
                            }
                            ?>
                        </li>

                        <li class="cart">
                            <a href="index.php?action=viewCart" class="flex w-10 h-10 items-center relative">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <span class="cart-quantity absolute left-3 bottom-5 rounded-full bg-orange-500 text-white text-center text-[10px] px-1.5">
                                    <?php
                                    if (isset($_SESSION['my_cart'])) {
                                        echo count($_SESSION['my_cart']);
                                    } else if (count($_SESSION['my_cart']) >= 99) {
                                        echo '99+';
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </span>
                            </a>
                        </li>

                        <li class="btn-menu-mobile ">
                            <div id="menu-mobile-btn" class="lg:hidden cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>