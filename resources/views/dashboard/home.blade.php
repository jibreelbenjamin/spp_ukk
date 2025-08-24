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
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total faktur
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                {{ $invoices->count() }} Faktur
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total faktur lunas
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-green-700">
                {{ $invoices->where('status', 'lunas')->count() }} Faktur
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total faktur pending
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-yellow-700">
                {{ $invoices->where('status', 'pending')->count() }} Faktur
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total faktur gagal
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-red-700">
                {{ $invoices->where('status', 'gagal')->count() }} Faktur
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total petugas
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                {{ $petugas->count() }} Petugas
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total siswa
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                {{ $siswa->count() }} Siswa
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total kelas
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                {{ $kelas->count() }} Kelas
            </h3>
            </div>
        </div>
        </div>

        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500">
                Total paket SPP
            </p>
            </div>

            <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                {{ $spp->count() }} Paket SPP
            </h3>
            </div>
        </div>
        </div>
    </div>

    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden">
            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Faktur
                    </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Tanggal dibayar
                    </span>
                    </div>
                </th>
                
                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Bulan dibayar
                    </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Tahun dibayar
                    </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Nama Siswa
                    </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Nominal
                    </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Status
                    </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-5 text-start">
                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                        Pembayaran
                    </span>
                    </div>
                </th>

                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">              
                @forelse ($invoices->forPage(1, 10) as $data)
                <tr>
                    <td class="size-px whitespace-nowrap">
                        <div class="ps-6 py-2">
                        <a class="text-sm text-blue-600 decoration-2 hover:underline" href="/daftar-invoice/{{ $data->id_invoice }}">#INP-{{ $data->id_invoice }}</a>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        <span class="text-sm text-gray-600">{{ ($data->status == 'lunas') ? \Carbon\Carbon::parse($data->updated_at)->translatedFormat('F d, Y') : '-' }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        <span class="text-sm text-gray-600">{{ $months[$data->bulan_dibayar] ?? 'Invalid' }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        <span class="text-sm text-gray-600">{{ $data->tahun_dibayar }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        <span class="text-sm text-gray-600">{{ $data->siswa->nama_siswa }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        <span class="text-sm text-gray-600">Rp {{ number_format($data->jumlah_bayar) }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        @if ($data->status == 'lunas')
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-icon lucide-circle-check"><circle cx="12" cy="12" r="10"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                            Lunas
                            </span>
                        @elseif ($data->status == 'pending')
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
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-2">
                        <div class="flex items-center gap-x-2">
                            <span class="text-sm text-gray-600">{{ $data->pembayaran->nama_pembayaran }}</span>
                        </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">

                    <div class="text-center py-20 px-4 sm:px-6 lg:px-8">
                        <svg class="block size-20 font-bold text-blue-600 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-grid2x2-x-icon lucide-grid-2x2-x"><path d="M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"/><path d="m16 16 5 5"/><path d="m16 21 5-5"/></svg>
                        <p class="mt-3 text-gray-600">Daftar yang anda kunjungi kosong,</p>
                        <p class="text-gray-600">silahkan isi data terlebih dahulu.</p>
                        <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                        <a href="tambah-invoice" class="w-full sm:w-auto py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            Tambah faktur
                        </a>
                        </div>
                    </div>

                    </td>
                </tr>
                @endforelse
            </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                <div class="max-w-sm space-y-3">
                    <span class="text-sm text-gray-500">
                    Total <span class="font-semibold">10</span> results
                    </span>
                </div>
            </div>
            <!-- End Footer -->
        </div>
        </div>
    </div>
</x-app>