<x-app :halaman='$title' :page='$page'>
  <form action="{{ route('pembayaran.save') }}" method="post">
    <div>
      @csrf
      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Nama Pembayaran
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="text" value="{{ old('nama_pembayaran') }}" name="nama_pembayaran" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan nama pembayaran">
        </div>
      </div>
    </div>

    <div class="mt-5 flex justify-end gap-x-2">
      <a href="daftar-pembayaran" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Kembali
      </a>
      <button class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Tambah SPP
      </button>
    </div>
  </form>
</x-app>

<x-toast type='errors-has'></x-toast>