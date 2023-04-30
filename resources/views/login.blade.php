<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Pena</title>

</head>
<header>
    <div>
        <nav>
            <div class="flex flex-row bg-[#5abbc0] w-auto h-20" >
                <div class="ml-3 text-[30px] font-medium m-auto text-black">PE<span class=" text-blue-600">NA</span></div>
                <div class="ml-auto"><button class="rounded-sm bg-blue-600 w-20 h-auto hover:bg-white text-[20px] font-medium m-7 text-white hover:text-black">Home</button></div>
                <div class="-ml-12"><button class="rounded-sm w-20 h-auto hover:bg-white text-[20px] font-medium m-7">About</button></div>
                <button class="space-y-2 -ml-6 m-7 hover:bg-white" >
                    <div class="w-8 h-0.5 bg-gray-600"></div>
                    <div class="w-8 h-0.5 bg-gray-600"></div>
                    <div class="w-8 h-0.5 bg-gray-600"></div>
                </button>
            </div>
        </nav>
    </div>
</header>
<body>

    <div>
        <div class=" ">
            <p class="text-center mt-3 font-bold text-[25px]">Login</p>
            <img class="mx-auto w-48 h-48 mt-4" src="../image/login_avatar.png" alt="Avatar"> 
        </div>
        
        <div class="mb-14 ml-48 flex flex-col max-w-[70%] space-y-3">
            <form id="form" action="{{url('postlogin')}}" method="post">
                @csrf
                <div class="">Username</div>
                <input class=" pl-3 border outline-none text-gray-500 focus:text-gray-700 duration-300 transition ease-in-out focus:border-gray-500 rounded-md h-9" type="text"
                id="nama" name="name" autofocus required>
                <div class="">Password</div>
                <input class=" pl-3 border outline-none text-gray-500 focus:text-gray-700 duration-300 transition ease-in-out focus:border-gray-500 rounded-md h-9" type="password"
                id="password" name="password" required>

                <button class="border -mt-6 bg-green-500 focus:border-black h-10 rounded-lg text-white font-semibold" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

<footer>
    <div class="flex flex-row bg-[#5abbc0] w-auto h-36" >

        <div class="flex flex-row bg-[5a7e85] w-[70rem] h-12 m-auto"  >
            <div class="m-auto text-white">Copyright © 2023, All Rights Reserved</div> 
        </div>

        </div>
    </div>
</footer>

</html>

