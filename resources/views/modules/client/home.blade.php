<x-client-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-2xl text-gray-500 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-2 lg:px-8 object-center">

        <div class="flex flex-wrap">
            <div class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-2xl hover:scale-105 duration-200">
                <a href="test">

                    <img class="m-8 rounded-lg mx-auto" src="/images/sample.jpeg" alt="category image" />
                    
                    <div class="px-5 pb-5">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">Apple Watch
                            Sample sample</h5>
                    </div>
                </a>
            </div>

            <div class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-2xl hover:scale-105 duration-200">
                <a href="test">

                    <img class="m-8 rounded-lg mx-auto" src="/images/sample.jpeg" alt="category image" />
                    
                    <div class="px-5 pb-5">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">Apple Watch
                            Sample sample</h5>
                    </div>
                </a>
            </div>

            <div class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-2xl hover:scale-105 duration-200">
                <a href="test">

                    <img class="m-8 rounded-lg mx-auto" src="/images/sample.jpeg" alt="category image" />
                    
                    <div class="px-5 pb-5">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">Apple Watch
                            Sample sample</h5>
                    </div>
                </a>
            </div>

        </div>

    </div>

</x-client-app-layout>
