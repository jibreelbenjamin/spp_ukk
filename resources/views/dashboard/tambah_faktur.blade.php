<x-app :halaman='$title' :page='$page'>

    <div>
        {{-- <div class="b-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
            Payment
        </h2>
        <p class="text-sm text-gray-600">
            Manage your payment methods.
        </p>
        </div> --}}

        <form>
        <div class="pb-5 first:pt-0 last:pb-0first:border-transparent">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
            Pilih siswa
            </label>
            <div class="mt-2 space-y-3">
                <!-- Select -->
                <select data-hs-select='{
                "hasSearch": true,
                "searchPlaceholder": "Cari siswa...",
                "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
                "placeholder": "Select country...",
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }' class="hidden">
                <option value="">Choose</option>
                <option value="AF" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/af.png\" alt=\"Afghanistan\" />"}'>
                    Afghanistan
                </option>
                <option value="AX" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ax.png\" alt=\"Aland Islands\" />"}'>
                    Aland Islands
                </option>
                <option value="AL" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/al.png\" alt=\"Albania\" />"}'>
                    Albania
                </option>
                <option value="DZ" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dz.png\" alt=\"Algeria\" />"}'>
                    Algeria
                </option>
                <option value="AS" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/as.png\" alt=\"American Samoa\" />"}'>
                    American Samoa
                </option>
                <option value="AD" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ad.png\" alt=\"Andorra\" />"}'>
                    Andorra
                </option>
                </select>
                <!-- End Select -->

            </div>
        </div>
        <div class="first:pt-0 last:pb-0first:border-transparent">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
            Pilih siswa
            </label>
            <div class="mt-2 space-y-3">
                <!-- Select -->
                <select data-hs-select='{
                "hasSearch": true,
                "searchPlaceholder": "Cari siswa...",
                "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
                "placeholder": "Select country...",
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }' class="hidden">
                <option value="">Choose</option>
                <option value="AF" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/af.png\" alt=\"Afghanistan\" />"}'>
                    Afghanistan
                </option>
                <option value="AX" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ax.png\" alt=\"Aland Islands\" />"}'>
                    Aland Islands
                </option>
                <option value="AL" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/al.png\" alt=\"Albania\" />"}'>
                    Albania
                </option>
                <option value="DZ" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dz.png\" alt=\"Algeria\" />"}'>
                    Algeria
                </option>
                <option value="AS" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/as.png\" alt=\"American Samoa\" />"}'>
                    American Samoa
                </option>
                <option value="AD" data-hs-select-option='{
                    "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ad.png\" alt=\"Andorra\" />"}'>
                    Andorra
                </option>
                </select>
                <!-- End Select -->

            </div>
        </div>

        <div class="mt-5 flex justify-end gap-x-2">
        <button type="button" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
            Cancel
        </button>
        <button type="button" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Save changes
        </button>
        </div>        
    </div>


</x-app>