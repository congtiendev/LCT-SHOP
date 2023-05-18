 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="icon" type="image/x-icon" href="./IMG/favicon.ico" sizes="16x16" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="../../Site/css/style.css">
     <title>ADMIN</title>
 </head>

 <body>
     <div id="root" class="font-montserrat min-w-[320px] max-w-[1400px] mx-auto">
         <div class="wrapper w-full flex gap-3 p-3">
             <aside style="border-radius: 30px; background: #fff; box-shadow: 20px 20px 60px #bebebe,
-20px -20px 60px #ffffff;
" class="w-[15%]  flex flex-col gap-5 p-5">


                 <ul class="w-full menu__bar flex flex-col justify-center gap-5 p-3">
                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                         </svg>
                         <a href="index.php?action=home" class="font-medium text-sm text-gray-500">Home</a>
                     </li>

                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                             <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                         </svg>
                         <a href="index.php?action=listProducts" class="font-medium text-sm text-gray-500">Products</a>
                     </li>

                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                         </svg>
                         <a href="index.php?action=listCategory" class="font-medium text-sm text-gray-500">Category</a>
                     </li>

                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                         </svg>

                         <a href="index.php?action=listAccounts" class="font-medium text-sm text-gray-500">Clients</a>
                     </li>

                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                         </svg>
                         <a href="index.php?action=listComments" class="font-medium text-sm text-gray-500">Comments</a>
                     </li>

                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                         </svg>
                         <a href="index.php?action=listOrder" class="font-medium text-sm text-gray-500">Order</a>
                     </li>

                     <li class="menu__bar-item flex  gap-3 items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                             <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                         </svg>
                         <a href="index.php?action=statistical" class="font-medium text-sm text-gray-500">Statistical</a>
                     </li>
                 </ul>
             </aside>
             <!-- End aside -->
             <article class="w-[85%]">
                 <header style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px #bebebe,
-35px -35px 70px #ffffff;
" class="w-full h-[60px] flex items-center justify-between px-5 py-2">

                     <div class="logo-[100px] h-auto px-2 flex gap-2 items-center justify-center">
                         <a href="../../index.php">
                             <img src="../../Site/IMG/lct-logo.png" alt="logo" class="w-16 h-auto" />
                         </a>
                         <h1 class="text-xs font-bold italic text-orange-500">
                             CONGTIEN<span class="text-black">DEV</span>
                         </h1>
                     </div>
                     <div class="account__admin flex items-center gap-2">
                         <div class="account__admin--avatar">
                             <?php
                                $avatarSrc = $avatarUrl . $_SESSION['account_info']['avatar'];
                                echo '
                             <img src="' . $avatarSrc . '" alt="" class="w-10 h-10 rounded-full" />
                            ';
                                ?>
                         </div>
                         <div class="account__admin--name flex flex-col gap-1">
                             <p class="font-medium text-sm text-gray-500">
                                 <?php
                                    echo $_SESSION['account_info']['user_name'];
                                    ?>
                             </p>
                             <a href="index.php?action=logout" class="logout text-xs text-gray-500 flex items-center gap-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                 </svg>
                                 Logout
                             </a>
                         </div>
                     </div>
                 </header>
                 <!-- End header -->