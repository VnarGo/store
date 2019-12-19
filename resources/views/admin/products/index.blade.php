@extends('layouts.admin')
@section('content')
    <div class="content">
        @can('product_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route("admin.products.create") }}">
                        Add Product
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Products list
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-product">
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
                                        price
                                    </th>
                                    <th>
                                        status
                                    </th>
                                 {{--   <th>
                                        status
                                    </th>--}}
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr data-entry-id="{{ $product->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $product->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->price ?? '' }}
                                        </td>
                                        <td>
                                            @switch($product->status)
                                                @case(1)
                                                <span class="label label-info">active</span>
                                                @break
                                                @case(0)
                                                <span class="label label-info">inactive</span>
                                                @break
                                            @endswitch
                                        </td>
                                      {{--  <td>
                                            @foreach($product->brand as $key => $products)
                                            <span class="label label-info label-many">{{ $products->name }}</span>
                                            @endforeach
                                        </td>--}}
                                        <td>
                                            @can('product_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $product->id) }}">
                                                    view
                                                </a>
                                            @endcan

                                            @can('product_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                                                    edit
                                                </a>
                                            @endcan

                                            @can('product_delete')
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('areYouSure');" style="display: inline-block;">
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
                    @can('product_delete')
            let deleteButtonTrans = '{{ trans('datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.products.massDestroy') }}",
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
            $('.datatable-product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection