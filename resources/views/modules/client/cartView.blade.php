<div x-data="{
    open: true,
    count: 0,
    remark: '',
}">

    {{-- Cart Icon --}}
    <div class="fixed bottom-0 right-0 p-3 m-4 bg-white rounded-full border">
        @if (Cookie::has('item_data'))
            <div class="absolute top-0 right-0">
                <svg class="w-[20px] h-[20px] text-red" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        @endif

        <svg @click="open = !open" id="cartBtn" class="w-[38px] h-[38px] text-gray-800 dark:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.3L19 7H7.3" />
        </svg>
    </div>

    {{-- Modal --}}
    <div class="w-full sm:max-w-64 bg-white border border-gray-200 rounded-t-lg shadow hover:shadow-2xl duration-200">
        <div x-init="$watch('open', value => {
            if (value) {
                document.body.classList.add('overflow-y-hidden');
            } else {
                document.body.classList.remove('overflow-y-hidden');
            }
        })" x-on:keydown.escape.window="open = false"
            x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
            x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="open"
            class="fixed w-full h-full top-0 left-0 flex items-center justify-center"
            style="display: open ? 'block' : 'none'">

            <div x-show="open" class="fixed inset-0 transform transition-all" x-on:click="open = false"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute w-full h-full bg-white opacity-100"></div>
            </div>


            <div x-show="open" class="fixed w-full h-full z-50 overflow-y-auto ">

                <div @click="open = false"
                    class="cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
                    <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m15 19-7-7 7-7"/>
                      </svg>                                          
                </div>

                <!-- Add margin if you want to see grey behind the modal-->
                <div class="container mx-auto h-auto text-left p-4">

                    <div>test</div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>




