@php
    $months = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];
@endphp
<x-app :halaman='$title' :page='$page'>
<!-- Invoice -->
<div>
  <!-- Grid -->
  <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200">
    <div>
      <h2 class="text-2xl font-semibold text-gray-800">Bukti pembayaran</h2>
    </div>
    <!-- Col -->

    <div class="inline-flex gap-x-2">
      <a href="/daftar-invoice" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" href="#">
        Kembali
      </a>
      <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-task-created-alert" data-hs-overlay="#hs-task-created-alert">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
        Print
      </button>
    </div>
    <!-- Col -->
  </div>
  <!-- End Grid -->

  <!-- Grid -->
  <div class="grid md:grid-cols-2 gap-3">
    <div>
      <div class="grid space-y-3">
        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Faktur ID:
          </dt>
          <dd class="text-gray-800">
            <p class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 focus:outline-hidden font-medium">
              #INP-{{ $invoice->id_invoice }}
            </p>
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            NISN:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ $invoice->siswa->nisn }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Nomor Induk Siswa:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ $invoice->siswa->nis }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Petugas:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ $invoice->user->name }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Detail siswa:
          </dt>
          <dd class="font-medium text-gray-800">
            <span class="block font-semibold">{{ $invoice->siswa->nama_siswa }}</span>
            <address class="not-italic font-normal">
              {{ $invoice->siswa->kelas->nama_kelas }} - {{ $invoice->siswa->kelas->jurusan }},<br>
              {{ $invoice->siswa->alamat }},<br>
              {{ $invoice->siswa->no_telp }}<br>
            </address>
          </dd>
        </dl>
      </div>
    </div>
    <!-- Col -->

    <div>
      <div class="grid space-y-3">
        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Faktur dibuat:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ \Carbon\Carbon::parse($invoice->created_at)->translatedFormat('F d, Y') }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Tanggal pembayaran:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ ($invoice->status == 'lunas') ? \Carbon\Carbon::parse($invoice->updated_at)->translatedFormat('F d, Y') : '-' }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Tahun ajaran:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ date('Y') }}/{{ date('Y') + 1 }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Status:
          </dt>
          <dd class="font-medium text-gray-800">
            @if ($invoice->status == 'lunas')
              <span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-icon lucide-circle-check"><circle cx="12" cy="12" r="10"/>
                  <path d="m9 12 2 2 4-4"/>
                </svg>
                Lunas
              </span>
            @elseif ($invoice->status == 'pending')
              <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock8-icon lucide-clock-8">
                  <path d="M12 6v6l-4 2"/><circle cx="12" cy="12" r="10"/>
                </svg>
                Pending
              </span>
            @else
              <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800">
                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x-icon lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/>
                  <path d="m9 9 6 6"/>
                </svg>
                Gagal
              </span>
            @endif
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Metode pembayaran:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ $invoice->pembayaran->nama_pembayaran }}
          </dd>
        </dl>

        <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
          <dt class="min-w-36 max-w-50 text-gray-500">
            Catatan:
          </dt>
          <dd class="font-medium text-gray-800">
            {{ $invoice->keterangan ?? '-' }}
          </dd>
        </dl>
      </div>
    </div>
    <!-- Col -->
  </div>
  <!-- End Grid -->

  <!-- Table -->
  <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4">
    <div class="hidden sm:grid sm:grid-cols-5">
      <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Paket SPP</div>
      <div class="text-start text-xs font-medium text-gray-500 uppercase">Bulan</div>
      <div class="text-start text-xs font-medium text-gray-500 uppercase">Tahun</div>
      <div class="text-end text-xs font-medium text-gray-500 uppercase">Nominal</div>
    </div>

    <div class="hidden sm:block border-b border-gray-200"></div>

    <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
      <div class="col-span-full sm:col-span-2">
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Paket SPP</h5>
        <p class="font-medium text-gray-800">Paket tahun {{ $invoice->spp->tahun }}</p>
      </div>
      <div>
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Bulan</h5>
        <p class="text-gray-800">{{ $months[$invoice->bulan_dibayar] }}</p>
      </div>
      <div>
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Tahun</h5>
        <p class="text-gray-800">{{ $invoice->tahun_dibayar }}</p>
      </div>
      <div>
        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Nominal</h5>
        <p class="sm:text-end text-gray-800">Rp {{ number_format($invoice->spp->nominal) }}</p>
      </div>
    </div>
  </div>
  <!-- End Table -->
</div>
<!-- End Invoice -->
</x-app>

<div id="hs-task-created-alert" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-task-created-alert-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-xs sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="relative flex flex-col bg-white shadow-lg rounded-xl">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-task-created-alert">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 text-center overflow-y-auto">
        <!-- Icon -->
        <span class="mb-4 inline-flex justify-center items-center size-11 rounded-full border-4 border-green-50 bg-green-100 text-green-500">
          <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer-check-icon lucide-printer-check"><path d="M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5"/><path d="m16 19 2 2 4-4"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2"/><path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"/></svg>
        </span>
        <!-- End Icon -->

        <h3 id="hs-task-created-alert-label" class="mb-2 text-xl font-bold text-gray-800">
          Berhasil tercetak!
        </h3>
        <p class="text-gray-500">
          Faktur SPP berhasil dicetak
        </p>
      </div>
    </div>
  </div>
</div>