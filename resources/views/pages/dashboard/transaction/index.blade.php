<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaction') }}
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
          data: 'name',
          name: 'name',
          className: 'text-left align-middle'
        }, {
          data: 'phone',
          name: 'phone',
          className: 'text-left align-middle'
        }, {
          data: 'courier',
          name: 'courier',
          className: 'text-left align-middle'
        }, {
          data: 'total_price',
          name: 'total_price',
          className: 'text-left align-middle'
        }, {
          data: 'status',
          name: 'status',
          className: 'text-center align-middle'
        }, {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          className: 'text-center align-middle',
          width: '15%'
        }]
      })
    </script>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="shaow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="crudTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Kurir</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
