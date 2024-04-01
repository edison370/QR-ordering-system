<div class="flex flex-wrap gap-6 mb-4">

    @foreach ($items as $i)
        <div x-data="{
            open: false,
            count: 0,
            remark: '',
            focusables() {
                // All focusable element types...
                let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
                return [...$el.querySelectorAll(selector)]
                    // All non-disabled elements...
                    .filter(el => !el.hasAttribute('disabled'))
            },
            firstFocusable() { return this.focusables()[0] },
            lastFocusable() { return this.focusables().slice(-1)[0] },
            nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
            prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
            nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
            prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
        }"
            class="w-full sm:max-w-64 bg-white border border-gray-200 rounded-t-lg shadow hover:shadow-2xl duration-200">

            <div @click="open = !open">
                @if ($i->imagePath)
                    <img class="rounded-t-lg mx-auto w-full" src="{{ $i->imagePath }}" alt="category image" />
                @endif

                <div class="px-5 py-5">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">{{ $i->name }}</h5>
                    <h4 class="text-xl font-semibold tracking-tight text-gray-900 text-right">{{ $i->price }}</h4>
                </div>
            </div>

            <div x-init="$watch('open', value => {
                if (value) {
                    document.body.classList.add('overflow-y-hidden');
            
                } else {
                    document.body.classList.remove('overflow-y-hidden');
                }
            })" x-on:open-modal.window="$event.detail == 'modal' ? open = true : null"
                x-on:close-modal.window="$event.detail == 'modal' ? open = false : null" x-on:close.stop="open = false"
                x-on:keydown.escape.window="open = false"
                x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="open"
                class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" style="display: open ? 'block' : 'none'">
                <div x-show="open" class="fixed inset-0 transform transition-all" x-on:click="open = false"
                    x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div x-show="open"
                    class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-md sm:mx-auto"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div @click="open = false" class="fixed bg-white m-2 p-2 rounded-full">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                            </svg>
                        </div>

                        <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                            <img class="mx-auto w-full" src="{{ $i->imagePath }}" alt="category image" />
                        </div>

                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <div class="text-center">{{ $i->name }}</div>
                            <div class="text-left text-xs text-gray-600">{{ $i->description }}</div>
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                {{-- <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="number" name="price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="$2999" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        <option value="TV">TV/Monitors</option>
                                        <option value="PC">PC</option>
                                        <option value="GA">Gaming/Console</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                </div> --}}
                                <div class="col-span-2">
                                    <label for="remark{{$i->id}}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                                    <textarea id="remark{{$i->id}}" rows="4" x-model="remark"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write remark here"></textarea>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <button type="button" x-on:click="count = count > 0 ? count-1 : count"
                                        class="text-white inline-flex items-center bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-full text-sm p-2 text-center hover:opacity-90 focus:ring-gray-300">
                                        <svg class="w-[16px] h-[16px] text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14" />
                                        </svg>
                                    </button>

                                    <span x-text="count" class="m-4"></span>
                                    <button type="button" x-on:click="count++"
                                        class="text-white inline-flex items-center bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-full text-sm p-2 text-center hover:opacity-90 focus:ring-gray-300">
                                        <svg class="w-[16px] h-[16px] text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-7 7V5" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="submit" x-on:click = "open = false"
                                    x-bind:disabled="count < 1 ? true : false"
                                    :class="count < 1 ? 'bg-gray-300 cursor-not-allowed opacity-50' :
                                        'text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none hover:opacity-90 focus:ring-gray-300'"
                                    class="inline-flex items-center font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                                    @click="addToCart({{ $i->id }},count)">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    @endforeach
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function addToCart(id, count) {
        $.ajax({
            type: "POST",
            url: "/addToCart",
            data: {
                id: id,
                count: count,
            },
            success: function(res) {
                $.ajax({
                    url: "/CartView",
                    success: function(res) {
                        $('#cartView').html(res);

                    }
                })
            }
        })

    };
</script>
