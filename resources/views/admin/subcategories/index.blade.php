@extends('layouts.admin')
@section('content')
<div class="content">
    @can('subcategory_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.subcategories.create") }}">
                    Add new Subcategory
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Subcategories list
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-subcategory">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        id
                                    </th>
                                    <th>
                                        name
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $key => $subcategory)
                                    <tr data-entry-id="{{ $subcategory->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $subcategory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $subcategory->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('subcategory_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.subcategories.show', $subcategory->id) }}">
                                                    view
                                                </a>
                                            @endcan

                                            @can('subcategory_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.subcategories.edit', $subcategory->id) }}">
                                                    edit
                                                </a>
                                            @endcan

                                            @can('subcategory_delete')
                                                <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" onsubmit="return confirm('areYouSure');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="delete">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('subcategory_delete')
  let deleteButtonTrans = 'delete'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subcategories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('nothingSelected')

        return
      }

      if (confirm('areYouSure')) {
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-subcategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection