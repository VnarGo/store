@extends('layouts.admin')
@section('content')
    <div class="content">
        @can('gender_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.genders.create") }}">
                        Add gender
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        genders list
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-gender">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        id
                                    </th>
                                    <th>
                                        gender
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($genders as $key => $gender)
                                    <tr data-entry-id="{{ $gender->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $gender->id ?? '' }}
                                        </td>
                                        <td>
                                            <span class="label label-info">{{ $gender->gender ?? '' }}</span>
                                        </td>
                                       {{-- <td>
                                            @foreach($gender->photos as $key => $photo)
                                                <span class="label label-info label-many">{{ $photo->path }}</span>
                                            @endforeach
                                        </td>--}}
                                        <td>
                                            @can('gender_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.genders.show', $gender->id) }}">
                                                    {{ trans('view') }}
                                                </a>
                                            @endcan

                                            @can('gender_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.genders.edit', $gender->id) }}">
                                                    {{ trans('edit') }}
                                                </a>
                                            @endcan

                                            @can('gender_delete')
                                                <form action="{{ route('admin.genders.destroy', $gender->id) }}" method="POST" onsubmit="return confirm('{{ trans('areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('delete') }}">
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
                    @can('gender_delete')
            let deleteButtonTrans = '{{ trans('datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.genders.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('areYouSure') }}')) {
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
            $('.datatable-gender:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection