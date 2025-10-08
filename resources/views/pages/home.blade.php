@extends ('layout.index')

@section('content')

<section>
    <div class="relative overflow-hidden py-20 bg-white mx-[26px] mt-6 rounded-[102px] min-h-[75vh] [background-image:radial-gradient(circle,#e5e5e7_1.2px,transparent_1.2px)] [background-size:18px_18px] font-inter shadow-[0_8px_30px_rgba(0,0,0,0.1)]">
        <div class="relative m-0">
            <div class="absolute z-10 top-[-120px] left-[-140px] w-[450px] rotate-[-6deg] opacity-[0.96]">
                <img src="assets/image1.png" alt="Note" />
            </div>
            <div class="absolute z-10 top-[-10px] left-[350px] w-[100px] rotate-[-6deg] opacity-[0.96]">
                <img src="assets/image5.png" alt="Note" />
            </div>
            <div class="absolute z-10 top-[-20px] right-[340px] w-[100px] rotate-[10deg] opacity-[0.96]">
                <img src="assets/image6.png" alt="Note" />
            </div>
            <div class="absolute top-[-120px] right-[-140px] rotate-[6deg] w-[450px] z-10 opacity-[0.96]">
                <img src="assets/image2.png" alt="Reminder" />
            </div>
            <div class="absolute top-[220px] right-[140px] rotate-[6deg] w-[150px] z-10 opacity-[0.96]">
                <img src="assets/image5.png" alt="Reminder" />
            </div>
            <div class="absolute top-[220px] left-[140px] rotate-[6deg] w-[150px] z-10 opacity-[0.96]">
                <img src="assets/image6.png" alt="Reminder" />
            </div>
            <div class="absolute bottom-[-220px] left-[-90px] rotate-[-9deg] w-[450px] z-10 opacity-[0.96] ">
                <img src="assets/image3.png" alt="Tasks" />
            </div>
            <div class="absolute bottom-[-220px] right-[-20px] rotate-[-9deg] w-[350px] z-10 opacity-[0.96]">
                <img src="assets/image4.png" alt="Integrations" />
            </div>
            <div class="absolute bottom-[-220px] right-[320px] rotate-[-9deg] w-[250px] z-10 opacity-[0.96]">
                <img src="assets/image7.png" alt="Integrations" />
            </div>
            <div class="absolute bottom-[-210px] left-[320px] rotate-[-9deg] w-[250px] z-10 opacity-[0.96]">
                <img src="assets/image8.png" alt="Integrations" />
            </div>
            <div class="relative text-center mx-auto max-w-[600px] z-[3] pt-40 pb-[100px]">
                <a class="btn btn-ghost text-xl font-bold hover:bg-gray-200 transition-colors flex items-center gap-3"
                    href="/">
                    <div class="w-15 h-15 bg-gray-900 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </a>
                <h1 class="text-[3.4rem] text-[#222] font-[700]">Think, plan, and track</h1>
                <span class="text-[2.4rem] font-[400]">all in one place</span>
                <p class="font-[400] mb-4 mt-0 text-[1.1rem]">
                    An inventory system that helps you make smart decisions, organize stock, and track movements in real-time
                </p>
                <a href="{{ route('login') }}" class="btn btn-neutral">Get Features </a>
            </div>
        </div>
    </div>
</section>

@endsection