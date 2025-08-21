<x-app :halaman='$title' :page='$page'>
  <form action="{{ route('petugas.save') }}" method="post">
    <div>
      @csrf
      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Buat username
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ old('username') }}" name="username" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan username">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Buat nama petugas
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ old('name') }}" name="name" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan nama petugas">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Buat password
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="password" name="password" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan password">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Pilih role
        </label>

        <select name="role" data-hs-select='{
          "placeholder": "Pilih role...",
          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class= \"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
          "toggleClasses": "mt-2 space-y-3 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative shadow-2xs py-2.5 px-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1",
          "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
          "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
          "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"font-semibold text-gray-800 \" data-title></div></div><div class=\"mt-1.5 text-sm text-gray-500 \" data-description></div></div>",
          "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
        }' class="hidden">
          <option value="">Pilih</option>
          <option value="admin" data-hs-select-option='{
              "description": "Pengelola utama sistem dan data serta kontrol aplikasi.",
              "icon": "<svg class=\"shrink-0 size-4 text-gray-800 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-user-star-icon lucide-user-star\"><path d=\"M16.051 12.616a1 1 0 0 1 1.909.024l.737 1.452a1 1 0 0 0 .737.535l1.634.256a1 1 0 0 1 .588 1.806l-1.172 1.168a1 1 0 0 0-.282.866l.259 1.613a1 1 0 0 1-1.541 1.134l-1.465-.75a1 1 0 0 0-.912 0l-1.465.75a1 1 0 0 1-1.539-1.133l.258-1.613a1 1 0 0 0-.282-.866l-1.156-1.153a1 1 0 0 1 .572-1.822l1.633-.256a1 1 0 0 0 .737-.535z\"/><path d=\"M8 15H7a4 4 0 0 0-4 4v2\"/><circle cx=\"10\" cy=\"7\" r=\"4\"/></svg>"
            }'>Admin</option>
          <option value="petugas" data-hs-select-option='{
              "description": "Penanggung jawab layanan dan tugas operasional.",
              "icon": "<svg class=\"shrink-0 size-4 text-gray-800 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-user-cog-icon lucide-user-cog\"><path d=\"M10 15H6a4 4 0 0 0-4 4v2\"/><path d=\"m14.305 16.53.923-.382\"/><path d=\"m15.228 13.852-.923-.383\"/><path d=\"m16.852 12.228-.383-.923\"/><path d=\"m16.852 17.772-.383.924\"/><path d=\"m19.148 12.228.383-.923\"/><path d=\"m19.53 18.696-.382-.924\"/><path d=\"m20.772 13.852.924-.383\"/><path d=\"m20.772 16.148.924.383\"/><circle cx=\"18\" cy=\"15\" r=\"3\"/><circle cx=\"9\" cy=\"7\" r=\"4\"/></svg>"
            }'>Petugas</option>
        </select>

      </div>


    </div>

    <div class="mt-5 flex justify-end gap-x-2">
      <a href="daftar-petugas" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Kembali
      </a>
      <button class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Tambah petugas
      </button>
    </div>
  </form>
</x-app>

<x-toast type='errors-has'></x-toast>