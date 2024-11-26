@extends('layouts.public')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>


<!-- Contact Hero Section Start -->
<section class="h-[400px] flex justify-center items-center flex-col " style="
        background: linear-gradient(87.09deg, #1d3aa5 39.28%, #0b163f 97.93%);
      ">
    <h1 class="text-white font-bold text-[60px]">Contact Us</h1>
    
</section>

<!-- Contact Hero Section End -->

<!-- Conversation Section Start -->
<section class="bg-[#F3F7FD] py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[32px] md:text-[52px] font-bold  text-[#041424] text-center mb-5">
            We're just a Conversation away!
        </h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.0528622363595!2d90.43095!3d23.7637155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c78ab9d83ac9%3A0x66e9c1251c18fc2!2sBacBon%20limited!5e0!3m2!1sen!2sbd!4v1698603315192!5m2!1sen!2sbd"
            width="100%" height="450" class="border-0 shadow-md rounded-lg" allowfullscreen="" loading="lazy"></iframe>
        <div class=" mt-5">
            <div class="border-l-[8px] border-[#134FEC]">
                <!-- <div class="border-l-4 border-blue-500 mr-4 h-full"></div> -->
                <div class="pl-2">
                    <h2 class="text-xl font-bold text-gray-800">Head Office</h2>
                    <p class="text-gray-800 mt-2">+880 1759 747387</p>
                    <p class="text-gray-800 font-semibold mt-1">Contact@BacBonltd.com.bd</p>
                    <p class="text-gray-600 mt-2">
                        Floor-05, Brac Bank Tower, Main Road, Block C, Banasree, Dhaka-1219
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Conversation Section End -->


<!-- contact start -->
<section class="min-h-screen bg-[#FFFFFF] flex items-center justify-center py-10 md:py-0 mt-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 md:px-0">
        <div class="border border-[#DDDDDD] rounded-[20px] p-6 md:p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20">
                <div class="relative">
                    <div class="rounded-xl bg-[#3D72FC] p-6 md:p-10 text-start">
                        <h1 class="text-white font-medium text-xl md:text-2xl mb-4">
                            Contact Information :
                        </h1>
                        <p class="text-white text-sm md:text-base mb-4">
                            Business tailored it design, management & <br />
                            support <br />
                            business agency elit, sed do eiusmod tempor.
                        </p>
                        <div class="relative border-l-[5px] border-white flex space-x-4 md:space-x-12">
                            <div class="absolute bottom-20 md:bottom-32">
                                <img src="assets/images/Border.png" alt="" />
                            </div>
                            <div>
                                <div class="flex space-x-4 md:space-x-6 mb-6">
                                <img src="{{ asset('assets/images/phone.png') }}" alt="Phone Icon" />
                                    <div>
                                        <h1 class="text-white font-semibod text-lg md:text-[22px] mb-2">
                                            Call This Now
                                        </h1>
                                        <p class="text-white font-normal text-sm md:text-[17px]">
                                            +025461556695
                                        </p>
                                    </div>
                                </div>
                                <div class="flex space-x-4 md:space-x-6 mb-6">
                                    <img src="assets/images/message.png" alt="" />
                                    <div>
                                        <h1 class="text-white font-semibod text-lg md:text-[22px] mb-2">
                                            Your Message
                                        </h1>
                                        <p class="text-white font-normal text-sm md:text-[17px]">
                                            Bacbon@mail.com
                                        </p>
                                    </div>
                                </div>
                                <div class="flex space-x-4 md:space-x-6 mb-6">
                                    <img src="assets/images/location.png" alt="" />
                                    <div>
                                        <h1 class="text-white font-semibod text-lg md:text-[22px] mb-2">
                                            Your location
                                        </h1>
                                        <p class="text-white font-normal text-sm md:text-[17px]">
                                            Banasree, Dhaka
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center mt-5 justify-between">
                            <div class="text-white">
                                <p class="text-base md:text-lg font-semibold mb-4">
                                    Follow Social:
                                </p>
                                <div class="flex space-x-2">
                                    <img src="assets/images/fb.png" alt="" />
                                    <img src="assets/images/yt.png" alt="" />
                                    <img src="assets/images/in.png" alt="" />
                                    <img src="assets/images/insta.png" alt="" />
                                </div>
                            </div>
                            <div>
                                <img src="assets/images/persona.png" alt=""
                                    class="h-[80px] w-[80px] md:h-[120px] md:w-[120px]" />
                            </div>
                        </div>
                    </div>
                    <div class="absolute -right-[20px] md:-right-[44px] top-8 md:top-16">
                        <img src="./assets/images/Bcontactorder.png" alt="" />
                    </div>
                </div>
                <div class="mt-6 md:mt-0">
                    <div class="mb-4">
                        <a href="#" class="text-[#3D72FC] text-base md:text-lg font-medium">
                            « CONTACT US »
                        </a>
                    </div>
                    <h2
                        class="text-[28px] md:text-[40px] font-semibold text-[#051D1F] mb-4 leading-[30px] md:leading-[40px]">
                        Get free Business touch <br />
                        Customers me.
                    </h2>
                    <p class="text-[#636363] text-sm md:text-base font-normal mb-8">
                        Business tailored it design, management & support services
                        business agency elit, sed do eiusmod tempor.
                    </p>
                    <form class="space-y-4 md:space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <input type="text" placeholder="Your Name"
                                class="border border-gray-300 rounded-lg px-4 py-2 md:py-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <input type="email" placeholder="Email address"
                                class="border border-gray-300 rounded-lg px-4 py-2 md:py-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <textarea placeholder="Your Messages"
                            class="border border-gray-300 rounded-lg px-4 py-2 md:py-3 w-full h-24 md:h-32 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 md:px-6 md:py-3 rounded-lg font-medium text-sm md:text-[17px]">
                            Send Request
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact end -->

<script>
    AOS.init();
</script>

@endsection