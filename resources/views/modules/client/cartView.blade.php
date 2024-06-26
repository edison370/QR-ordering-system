<div x-data="{
    open: false,
    count: 0,
}">

    {{-- Cart Icon --}}
    <div class="fixed bottom-0 right-0 p-3 m-4 bg-white rounded-full border">
        @if (Cookie::has('item_data'))
            <div class="absolute top-0 right-0" id="cartItemIcon">
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
            class="fixed w-full h-full top-0 left-0 flex items-center justify-center z-50"
            style="display: open ? 'block' : 'none'">

            <div x-show="open" class="fixed inset-0 transform transition-all" x-on:click="open = false"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute w-full h-full bg-white opacity-100"></div>
            </div>


            <div x-show="open" class="fixed w-full h-full z-50 overflow-y-auto ">

                <div class="cursor-pointer flex flex-col items-center mt-4 pb-2 text-black text-sm z-50 border-b-2">
                    <div class="fixed top-4 left-5" @click="open = false">
                        <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="m15 19-7-7 7-7" />
                        </svg>
                    </div>
                    <div class="items-center text-3xl">Cart</div>
                </div>

                <!-- Add margin if you want to see grey behind the modal-->
                <div id="cartContainer" class="container mx-auto h-auto text-left p-4">

                </div>

                <form class="fixed bottom-0 w-full border-t-2 z-50" action="{{ route('placeOrder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-between items-center mx-6 my-3">
                        <div id="totalPrice"></div>
                        <div id="placeOrderBtn"></div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>
</div>

</div>

<script type="module">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getCartItems();

    function changeCartQuantity(row, action) {
        $.ajax({
            type: "POST",
            url: "/changeCartQuantity",
            data: {
                row: row,
                action: action,
            },
            success: function(res) {
                getCartItems();
            }
        })

    };

    function getCartItems() {
        $.ajax({
            url: "/getCartItem",
            success: function(res) {
                $("#cartContainer").empty();
                $("#placeOrderBtn").empty();

                $.each(res['item'], function(index, value) {
                    var item =
                        `
                            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                                <div class="flex justify-center w-1/5">
                                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512" @click="changeCartQuantity(` +
                                        index + `,'minus')">
                                        <path
                                            d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>

                                    <input
                                    class="mx-2 border text-center w-10" type="text"
                                        value="` + value["quantity"] + `" readonly/>

                                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512" @click="changeCartQuantity(` + index + `,'add')">
                                        <path
                                            d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </div>

                                <div class="flex w-2/5"> <!-- product -->
                                    <div class="w-20">
                                        <img class="h-24" src="` + value["imagePath"] + `" alt="">
                                    </div>
                                    <div class="flex flex-col justify-center ml-4 flex-grow">
                                        <span class="text-gray-500 text-xs">`+value["name"]+`</span>
                                        <span class="text-gray-500 text-xs">`+value["remark"]+`</span>
                                    </div>
                                </div>

                                <span class="text-center w-2/5 font-semibold text-sm">RM` + value["price"] + `</span>
                                <span class="text-center w-2/5 font-semibold text-sm">RM` + value["subTotal"] + `</span>
                            </div>
                        `;

                    $("#cartContainer").append(item);

                });

                if($.isEmptyObject(res['item'])){
                    $("#cartItemIcon").addClass("hidden");

                    $("#placeOrderBtn").append(`
                    <button id="placeOrderBtn"  
                        class= "inline-flex items-center font-medium rounded-lg text-sm px-6 py-2 text-center bg-gray-300 cursor-not-allowed opacity-50"
                        type="submit">Place Order</button>
                    `);

                    $('#totalPrice').text("Total: 0.00");
                }else{
                    $("#placeOrderBtn").append(`
                    <button id="placeOrderBtn"  
                        class= "inline-flex items-center font-medium rounded-lg text-sm px-6 py-2 text-center text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none hover:opacity-90 focus:ring-gray-300"
                        type="submit">Place Order</button>
                    `);

                    $('#totalPrice').text("Total: "+res['total']);
                }

            }
        })
    }

</script>
