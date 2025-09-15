<x-app :halaman='$title' :page='$page'>
  <h1 class="text-lg"><strong>#{{ $user->id_user }} {{ $user->name }}</strong> @ {{ $user->username }}</h1>
  <form action="{{ route('petugas_p.update', ['user' => $user->id_user]) }}" method="post"\>
    <div>
      @csrf
      @method('PUT')
      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Password lama
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="password" name="password_old" value="{{ old('password_old') }}" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan password lama">
        </div>
      </div>
      
      <div class="mb-5 first:pt-0 last:pb-0">
        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
          Password baru
        </label>

        <div class="mt-2 space-y-3">
          <input id="af-payment-billing-contact" type="password" name="password_new" class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off" placeholder="Masukan password baru">
        </div>
      </div>

    </div>

    <div class="mt-5 flex justify-end gap-x-2">
      <a href="/daftar-petugas" class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Kembali
      </a>
      <button class="py-1.5 sm:py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Update password
      </button>
    </div>
  </form>
</x-app>

<x-toast type='errors-has'></x-toast>