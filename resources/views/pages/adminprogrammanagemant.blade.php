@include('partials.header', ['title' => 'Program Management'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="text-2xl font-black text-[#168753]">
        Program Management
    </div>
    <div class="w-full h-[60vh] mt-10 flex gap-x-5">
        <div class="w-[33.33%] h-[60vh] bg-[url('images/tesdaqualification.jpg')] bg-cover bg-center before:content-[''] before:absolute before:bg-[#168753] before:-z-1 before:w-[100%] before:opacity-[60%] before:h-[60vh] relative">
            <div class="absolute bottom-[10%] left-[7%]">
                <div class="font-black text-3xl text-white">
                    TESDA <br>QUALIFICATIONS
                </div>
                <a href="{{ route('programs') }}">
                    <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                        SEE MORE
                    </button>
                </a>
            </div>
        </div>
        <div class="w-[33.33%] h-[60vh] bg-[url('images/tesdaassessmentcenter.jpg')] bg-cover bg-center before:content-[''] before:absolute before:bg-[#168753] before:z-1 before:w-[100%] before:opacity-[60%] before:h-[60vh] relative">
            <div class="absolute bottom-[10%] left-[7%]">
                <div class="font-black text-3xl text-white">
                    TESDA ACCREDITED <br>ASSESSMENT CENTER
                </div>
                <a href="{{ route('admintesdaAccredited') }}">
                    <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                        SEE MORE
                    </button>
                </a>
            </div>
        </div>
        <div class="w-[33.33%] h-[60vh] bg-[url('images/specialprograms.png')] bg-cover bg-center before:content-[''] before:absolute before:bg-[#168753] before:z-1 before:w-[100%] before:opacity-[60%] before:h-[60vh] relative">
            <div class="absolute bottom-[10%] left-[7%]">
                <div class="font-black text-3xl text-white">
                    SPECIAL <br>PROGRAMS
                </div>
                <a href="{{ route('programs', ['id' => 3]) }}">
                    <button class="bg-white text-xl text-[#168753] font-black py-1 px-4 rounded-md">
                        SEE MORE
                    </button>
                </a>
            </div>
        </div>
    </div>
</main>

@include('partials.footer')
