@extends('layouts.admin')
@section('content')
@can('setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.setting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.setting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Setting">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.key') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.text') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.short_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.number') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.image') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.file') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.multi_image') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.settings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.settings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'key', name: 'key' },
{ data: 'text', name: 'text' },
{ data: 'short_description', name: 'short_description' },
{ data: 'date', name: 'date' },
{ data: 'number', name: 'number' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'file', name: 'file', sortable: false, searchable: false },
{ data: 'multi_image', name: 'multi_image', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Setting').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection