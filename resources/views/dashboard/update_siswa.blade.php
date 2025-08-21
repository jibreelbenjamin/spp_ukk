<x-app :halaman='$title' :page='$page'>
  <form action="{{ route('siswa.update', ['siswa' => $siswa->nisn]) }}" method="post">
    <div>
      @csrf
      @method('PUT')
      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          NISN (Nomor Induk Siswa Nasional)
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="number" value="{{ $siswa->nisn }}" name="nisn" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan NISN">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          NIS (Nomor Induk Siswa)
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ $siswa->nis }}" name="nis" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan NIS">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Nama Lengkap
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ $siswa->nama_siswa }}" name="nama_siswa" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan Nama Siswa">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Kelas
        </label>

        <div class="mt-2 space-y-3">
          <!-- Select -->
            <select name="id_kelas" data-hs-select='{
              "hasSearch": true,
              "searchPlaceholder": "Search...",
              "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
              "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
              "placeholder": "Pilih kelas...",
              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative shadow-2xs py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
              "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
              "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
              "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
              "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
            }' class="hidden">
              <option value="">Choose</option>
              @foreach ($kelas as $item)
                <option value="{{ $item->id_kelas }}" {{ $siswa->id_kelas == $item->id_kelas ? 'selected' : '' }}>
                  {{ $item->nama_kelas }}
                </option>
              @endforeach
            </select>
            <!-- End Select -->
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Alamat lengkap
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ $siswa->alamat }}" name="alamat" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan Alamat Siswa">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          No. Telp
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ $siswa->no_telp }}" name="no_telp" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan No. Telepon">
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Paket SPP
        </label>

        <div class="mt-2 space-y-3">
          <!-- Select -->
            <select name="id_spp" data-hs-select='{
              "hasSearch": true,
              "searchPlaceholder": "Search...",
              "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
              "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
              "placeholder": "Pilih paket...",
              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative shadow-2xs py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
              "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
              "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
              "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
              "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
            }' class="hidden">
              <option value="">Choose</option>
              @foreach ($spp as $item)
                <option value="{{ $item->id_spp }}" {{ $siswa->id_spp == $item->id_spp ? 'selected' : '' }}>
                  Paket {{ $item->tahun }} - Rp. {{ number_format($item->nominal, 0, ',', '.') }}
                </option>
              @endforeach
            </select>
            <!-- End Select -->        </div>
      </div>
    </div>

    <div class="mt-5 flex justify-end gap-x-2">
      <a href="/daftar-siswa" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Kembali
      </a>
      <button class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Update Siswa
      </button>
    </div>
  </form>
</x-app>

<x-toast type='errors-has'></x-toast>