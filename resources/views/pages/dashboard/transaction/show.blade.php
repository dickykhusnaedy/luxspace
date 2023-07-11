<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaction') }} &raquo; #{{ $transaction->id }} {{ $transaction->name }}
    </h2>
  </x-slot>

  <x-slot name="script">
    <script>
      // AJAX Datatable

      var datatable = $('#crudTable').DataTable({
        ajax: {
          url: `{!! url()->current() !!}`
        },
        columns: [{
          data: 'id',
          name: 'id',
          width: '5%',
          className: 'text-center align-middle'
        }, {
          data: 'product.name',
          name: 'product.name',
          className: 'text-left align-middle'
        }, {
          data: 'product.price',
          name: 'product.price',
          className: 'text-left align-middle'
        }]
      })
    </script>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Transaction Detail</h2>

      <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table-auto w-full">
            <tbody>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Nama</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->name }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Email</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->email }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Alamat</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->address }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">No. HP</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->phone }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Kurir</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->courier }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Pembayaran</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->payment }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">URL Pembayaran</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->payment_url }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Total Harga</td>
                <td class="border px-6 py-4 text-left">Rp{{ number_format($transaction->total_price) }}</td>
              </tr>
              <tr>
                <td class="border px-6 py-4 text-left font-bold">Status</td>
                <td class="border px-6 py-4 text-left">{{ $transaction->status }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Transaction Item</h2>
      <div class="shaow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="crudTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
