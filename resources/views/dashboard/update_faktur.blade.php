<x-app :halaman='$title' :page='$page'>
  <form action="{{ route('faktur.update', ['invoice' => $invoice->id_invoice]) }}" method="post">
    <div>
      @csrf
      @method('PUT')
      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Siswa
        </label>

        <div class="mt-2 space-y-3">
          <!-- Select -->
            <select name="nisn" data-hs-select='{
              "hasSearch": true,
              "searchPlaceholder": "Search...",
              "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
              "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
              "placeholder": "Pilih siswa...",
              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative shadow-2xs py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
              "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
              "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
              "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
              "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
            }' class="hidden">
              <option value="">Choose</option>
              @foreach ($siswa as $item)
                <option value="{{ $item->nisn }}" {{ $invoice->nisn == $item->nisn ? 'selected' : '' }}>
                  {{ $item->nis }} - {{ $item->kelas->nama_kelas }} {{ $item->nama_siswa }} 
                </option>
              @endforeach
            </select>
            <!-- End Select -->
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
                <option value="{{ $item->id_spp }}" {{ $invoice->id_spp == $item->id_spp ? 'selected' : '' }}>
                  Paket {{ $item->tahun }} - Rp. {{ number_format($item->nominal, 0, ',', '.') }}
                </option>
              @endforeach
            </select>
            <!-- End Select -->        
          </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Bulan dibayar
        </label>

        <div class="mt-2 space-y-3">
          <!-- Select -->
          <select name="bulan_dibayar" data-hs-select='{
            "placeholder": "Pilih bulan...",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }' class="hidden">
            <option value="">Choose</option>
            <option value="1" {{ $invoice->bulan_dibayar == '1' ? 'selected' : '' }}>Januari</option>
            <option value="2" {{ $invoice->bulan_dibayar == '2' ? 'selected' : '' }}>Februari</option>
            <option value="3" {{ $invoice->bulan_dibayar == '3' ? 'selected' : '' }}>Maret</option>
            <option value="4" {{ $invoice->bulan_dibayar == '4' ? 'selected' : '' }}>April</option>
            <option value="5" {{ $invoice->bulan_dibayar == '5' ? 'selected' : '' }}>Mei</option>
            <option value="6" {{ $invoice->bulan_dibayar == '6' ? 'selected' : '' }}>Juni</option>
            <option value="7" {{ $invoice->bulan_dibayar == '7' ? 'selected' : '' }}>Juli</option>
            <option value="8" {{ $invoice->bulan_dibayar == '8' ? 'selected' : '' }}>Agustus</option>
            <option value="9" {{ $invoice->bulan_dibayar == '9' ? 'selected' : '' }}>September</option>
            <option value="10" {{ $invoice->bulan_dibayar == '10' ? 'selected' : '' }}>Oktober</option>
            <option value="11" {{ $invoice->bulan_dibayar == '11' ? 'selected' : '' }}>November</option>
            <option value="12" {{ $invoice->bulan_dibayar == '12' ? 'selected' : '' }}>Desember</option>
          </select>
          <!-- End Select -->
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Tahun dibayar
        </label>

        <div class="mt-2 space-y-3">
          <!-- Select -->
          <select name="tahun_dibayar" data-hs-select='{
            "placeholder": "Pilih tahun...",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }' class="hidden">
            <option value="">Choose</option>
            @for ($year = date('Y'); $year >= 2020; $year--)
              <option value="{{ $year }}" {{ $invoice->tahun_dibayar == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
          </select>
          <!-- End Select -->
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Metode Pembayaran
        </label>

        <div class="mt-2 space-y-3">
          <!-- Select -->
            <select name="id_pembayaran" data-hs-select='{
              "hasSearch": true,
              "searchPlaceholder": "Search...",
              "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
              "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
              "placeholder": "Pilih pembayaran...",
              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative shadow-2xs py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500",
              "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
              "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
              "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
              "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
            }' class="hidden">
              <option value="">Choose</option>
              @foreach ($pembayaran as $item)
                <option value="{{ $item->id_pembayaran }}" {{ $invoice->id_pembayaran == $item->id_pembayaran ? 'selected' : '' }}>
                  {{ $item->nama_pembayaran }}
                </option>
              @endforeach
            </select>
            <!-- End Select -->        
          </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Status Pembayaran
        </label>

        <div class="mt-2 space-y-3">
          <select name="status" data-hs-select='{
            "placeholder": "Pilih status...",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class= \"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
            "toggleClasses": "mt-2 space-y-3 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative shadow-2xs py-2.5 px-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 before:absolute before:inset-0 before:z-1",
            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"font-semibold text-gray-800 \" data-title></div></div><div class=\"mt-1.5 text-sm text-gray-500 \" data-description></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }' class="hidden">
            <option value="">Pilih</option>
            <option value="lunas" {{ $invoice->status == 'lunas' ? 'selected' : '' }} data-hs-select-option='{
                "description": "Pembayaran telah selesai dan diverifikasi.",
                "icon": "<svg class=\"shrink-0 size-3.5 text-green-600 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-circle-check-icon lucide-circle-check\"><circle cx=\"12\" cy=\"12\" r=\"10\"/> <path d=\"m9 12 2 2 4-4\"/> </svg>"
              }'>Lunas</option>
            <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }} data-hs-select-option='{
                "description": "Pembayaran sedang diproses.",
                "icon": "<svg class=\"shrink-0 size-3.5 text-amber-600 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-clock8-icon lucide-clock-8\"> <path d=\"M12 6v6l-4 2\"/><circle cx=\"12\" cy=\"12\" r=\"10\"/> </svg>"
              }'>Pending</option>
            <option value="gagal" {{ $invoice->status == 'gagal' ? 'selected' : '' }} data-hs-select-option='{
                "description": "Pembayaran tidak berhasil atau ditolak.",
                "icon": "<svg class=\"shrink-0 size-3.5 text-red-600 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-circle-x-icon lucide-circle-x\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m15 9-6 6\"/> <path d=\"m9 9 6 6\"/> </svg>"
              }'>Gagal</option>
          </select>
        </div>
      </div>

      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Catatan (opsional)
        </label>

        <div class="mt-2 space-y-3">
          <textarea class="py-2 px-3 sm:py-3 sm:px-4 block shadow-2xs w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Buat catatan tambahan untuk faktur ini">{{ $invoice->keterangan }}</textarea>
        </div>
      </div>


    </div>

    <div class="mt-5 flex justify-end gap-x-2">
      <a href="/daftar-invoice" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Kembali
      </a>
      <button class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Update Faktur
      </button>
    </div>
  </form>
</x-app>

<x-toast type='errors-has'></x-toast>
