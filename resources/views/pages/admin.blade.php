@include('partials.header', ['title'=> 'Dashboard'])

<x-adminHeader></x-adminHeader>
<x-adminSidebar></x-adminSidebar>
<x-message></x-message>
{{-- @dd($total_count) --}}
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="flex flex-col p-20 items-center gap-20">
        <div class="flex flex-row gap-20 w-full">
            <div class="h-[10rem] w-full rounded overflow-hidden shadow-lg flex  bg-gray-50 dark:bg-gray-800">
                <div class="w-1/2 h-[20rem]">
                    <img class="w-[15rem] h-[10rem]" src="/images/vgd.png" alt="VISUAL GRAPHIC DESIGN">
                </div>
                <div class="py-4 font-black">
                    <h1 class="text-nolitcText text-2xl">
                        VISUAL GRAPHIC DESIGN
                    </h1>
                    <div class="mt-1">
                        <h3 class="text-xl">
                            Number of Students
                        </h3>
                        <p class="text-5xl font-black mt-1">{{$total_count['Visual Graphic Design NCIII']}}</p>
                    </div>
                </div>
            </div>
            <div class="h-[10rem] w-full rounded overflow-hidden shadow-lg flex  bg-gray-50 dark:bg-gray-800">
                <div class="w-1/2 h-[20rem]">
                    <img class="w-[15rem] h-[10rem]" src="/images/ccs.png" alt="CONTACT CENTER SERVICES">
                </div>
                <div class="py-4 font-black">
                    <h1 class="text-nolitcText text-2xl">
                        CONTACT CENTER SERVICES
                    </h1>
                    <div class="mt-1">
                        <h3 class="text-xl">
                            Number of Students
                        </h3>
                        <p class="text-5xl font-black mt-1">{{$total_count['Contact Center Services NC II']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-20 w-full">
            <div class="h-[10rem] w-full rounded overflow-hidden shadow-lg flex  bg-gray-50 dark:bg-gray-800">
                <div class="w-1/2 h-[20rem]">
                    <img class="w-[15rem] h-[10rem]" src="/images/ani.png" alt="CONTACT CENTER SERVICES">
                </div>
                <div class="py-4 font-black">
                    <h1 class="text-nolitcText text-2xl">
                        ANIMATION
                    </h1>
                    <div class="mt-1">
                        <h3 class="text-xl">
                            Number of Students
                        </h3>
                         <p class="text-5xl font-black mt-1">{{$total_count['Animation NC II']}}</p>
                    </div>
                </div>
            </div>
            <div class="h-[10rem] w-full rounded overflow-hidden shadow-lg flex  bg-gray-50 dark:bg-gray-800">
                <div class="w-1/2 h-[20rem]">
                    <img class="w-[15rem] h-[10rem]" src="/images/2d-ani.png" alt="CONTACT CENTER SERVICES">
                </div>
                <div class="py-4 font-black">
                    <h1 class="text-nolitcText text-2xl">
                        2D ANIMATION
                    </h1>
                    <div class="mt-1">
                        <h3 class="text-xl">
                            Number of Students
                        </h3>
                        <p class="text-5xl font-black mt-1">{{$total_count['2D Animation NC III']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('partials.footer')
