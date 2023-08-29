@extends('backend.layout.main')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <style>
        .ui-datepicker-week-highlight span {
            background-color: #f0f0f0;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h4 class="fw-bold py-3 mb-4">Data record bahan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
    <form  method="GET">
        <div class="row mb-4">
            
            <div class="col-md-3">
                <input type="text" id="search" class="form-control" placeholder="cari data" value="{{$cari}}" name="cari">
            </div>
            

            <div class="week-picker"></div>

            <div class="col-md-3">
                <input id="startDate" name="startDate" value="{{$date_from_start}}" class="form-control">
            </div>

            <div class="col-md-3">
                <input id="endDate" name="endDate" value="{{$date_to_end}}" class="form-control">
            </div>
              

            
            <div class="col-md-3">
                <button class="btn btn-success" type="submit">cari</button>
            </div>
        </div>
    </form>

        <div id="recordBahan">
          <table class="table table-hover" id="table">
              <thead>
                  <tr class="text-center" style="text-align:center">
                      <th>No</th>
                      <th>nama kategori produksi</th>
                      <th>menu masakan</th>
                      <th>nama Bahan dasar</th>
                      <th>qty masakan</th>
                      <th>qty bahan</th>
                      <th>price per bahan</th>
                      <th>jumlah cost per bahan</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="table">
                @foreach ($record_bahans as $record)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$record->nama_kategori}}</td>
                  <td>{{$record->nama_menu}}</td>
                  <td>{{$record->nama_bahan}}</td>
                  <td>{{$record->qty_masakan}}</td>
                  <td>{{$record->qty_bahan}}</td>
                  <td>{{$record->price_per_bahan}}</td>
                  <td>{{$record->jumlah_cost_per_bahan}}</td>
                  <td>{{$record->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
          </table>

          {{ $record_bahans->appends(['cari' => $cari, 'startDate' => $date_from_start, 'endDate' => $date_to_end])->links() }}


        </div>

        
          </div>
        </div>
        
@endsection

@push('addon-script')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
    $(function() {
    var startDate;
    var endDate;
    
    var selectCurrentWeek = function() {
        window.setTimeout(function () {
            $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }
    
    $('.week-picker').datepicker( {
        showOtherMonths: true,
        selectOtherMonths: true,
        firstDay: 1,
        onSelect: function(dateText, inst) { 
            var date = $(this).datepicker('getDate');
            startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 1);
            endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 7);
            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
            $('#startDate').text($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#startDate').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#endDate').text($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
            $('#endDate').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));
            
            selectCurrentWeek();
        },
        beforeShowDay: function(date) {
            var cssClass = '';
            if(date >= startDate && date <= endDate)
                cssClass = 'ui-datepicker-current-day';
            return [true, cssClass];
        },
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
    });
    
    $('.week-picker .ui-datepicker-calendar tr').live('mousemove', function() { $(this).find('td a').addClass('ui-state-hover'); });
    $('.week-picker .ui-datepicker-calendar tr').live('mouseleave', function() { $(this).find('td a').removeClass('ui-state-hover'); });
});
</script>
@endpush
