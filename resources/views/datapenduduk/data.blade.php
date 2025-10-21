{{-- resources/views/datapenduduk/admindata.blade.php --}}
@extends(optional(Auth::user())->role === 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-header">
            <h2 class="card-title">Data Penduduk</h2>
            <button type="button" class="btn mb-1 btn-primary"
              onclick="window.location='{{ url('datapenduduk/add') }}'">
              Tambah penduduk <span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
            </button>
          </div>

          <div class="table-responsive">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <table class="table table-striped table-bordered" id="tabledatapenduduk_b">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>No</th>
                  <th>Updated</th>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Gelar awal</th>
                  <th>Nama</th>
                  <th>Gelar akhir</th>
                  <th>Jenis kelamin</th>
                  <th>Tempat lahir</th>
                  <th>Tanggal_lahir</th>
                  <th>Agama</th>
                  <th>Pendidikan</th>
                  <th>Pekejaan</th>
                  <th>Goldar</th>
                  <th>Status</th>
                  <th>Tanggal perkawinan</th>
                  <th>Hubungan</th>
                  <th>Ayah</th>
                  <th>Ibu</th>
                  <th>alamat</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>Status kependudukan</th>
                </tr>
              </thead>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- DataTables + Buttons + JSZip --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script type="text/javascript">
  var $ = jQuery.noConflict();
  $(function () {
    // Filename export dinamis
    var now = new Date();
    var pad = n => String(n).padStart(2, '0');
    var stamp = now.getFullYear() + pad(now.getMonth()+1) + pad(now.getDate()) + '_' + pad(now.getHours()) + pad(now.getMinutes());
    var excelFileName = 'datapenduduk_' + stamp;

    // Helper mapping JK
    function mapJK(val) {
      const m = { '1': 'Laki-laki', '0': 'Perempuan' };
      if (val === 1 || val === 2) return m[String(val)];
      return m[String(val)] ?? (val ?? ''); // fallback kalau bukan 1/2
    }

    var table = $('#tabledatapenduduk_b').DataTable({
      processing: true,
      serverSide: true,
      scrollX: true,
      searching: true,
      dom: 'Bfrtip',
      ajax: {
        url: '{!! route('datapenduduk.json') !!}',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      },
      buttons: [{
        extend: 'excelHtml5',
        text: '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  EXPORT EXCEL</button>',
        titleAttr: 'Excel',
        action: newexportaction,
        filename: excelFileName,
        title: null,
        sheetName: 'Data Penduduk',
        exportOptions: {
          // exclude kolom Action (0) & No (1) → di file Excel A=Updated, B=No KK, C=NIK, dst.
          columns: [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23],
          orthogonal: 'export', // gunakan renderer 'export' untuk kolom-kolom khusus
          format: {
            // Kalau butuh custom di level cell lain, bisa isi di sini
          }
        }
      }],
      columns: [
        { data: 'action', name: 'action', orderable: false, searchable: false },
        { data: null, render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; } },
        { data: 'updated_by', name: 'updated_by' },

        // No KK: saat export, bangun string agar tidak dipotong Excel
        { data: 'nokk', name: 'nokk',
          render: function (data, type) {
            if (type === 'export') return '"' + String(data ?? '').trim() + '"';
            return data;
          }
        },

        // NIK: sama seperti No KK
        { data: 'nik', name: 'nik',
          render: function (data, type) {
            if (type === 'export') return '"' + String(data ?? '').trim() + '"';
            return data;
          }
        },

        { data: 'gelarawal', name: 'gelarawal' },
        { data: 'nama', name: 'nama' },
        { data: 'gelarakhir', name: 'gelarakhir' },

        // Jenis kelamin: map 1/2 → Laki-laki/Perempuan
        { data: 'jenis_kelamin', name: 'jenis_kelamin',
          render: function (data, type, row) {
            if (type === 'export' || type === 'display' || type === 'filter') {
              return mapJK(data);
            }
            // Untuk sort tetap pakai nilai mentah agar stabil (optional)
            return data;
          }
        },

        { data: 'tempat_lahir', name: 'tempat_lahir' },
        { data: 'tanggal_lahir', name: 'tanggal_lahir' },
        { data: 'agama.nama', name: 'agama.nama' },
        { data: 'pendidikan.nama', name: 'pendidikan.nama' },
        { data: 'pekerjaan.nama', name: 'pekerjaan.nama' },
        { data: 'goldar.nama', name: 'goldar.nama' },
        { data: 'status.nama', name: 'status.nama' },
        { data: 'tanggal_perkawinan', name: 'tanggal_perkawinan' },
        { data: 'hubungan', name: 'hubungan' },
        { data: 'ayah', name: 'ayah' },
        { data: 'ibu', name: 'ibu' },
        { data: 'alamat', name: 'alamat' },
        { data: 'rt', name: 'rt' },
        { data: 'rw', name: 'rw' },
        { data: 'datak', name: 'datak' },
      ]
    });

    // Export semua data (serverSide)
    function newexportaction(e, dt, button, config) {
      var self = this;
      var oldStart = dt.settings()[0]._iDisplayStart;
      dt.one('preXhr', function(e, s, data) {
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function(e, settings) {
          if (button[0].className.indexOf('buttons-excel') >= 0) {
            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
          }
          dt.one('preXhr', function(e, s, data) {
            settings._iDisplayStart = oldStart;
            data.start = oldStart;
          });
          setTimeout(dt.ajax.reload, 0);
          return false;
        });
      });
      dt.ajax.reload();
    }
  });
</script>
@endsection
