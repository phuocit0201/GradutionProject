@props(['headers', 'list', 'actions', 'routes'])
<div class="card">
    <!-- /.card-header -->
    @if ($actions['create'] || $actions['createExcel'] || $actions['deleteAll'])
        <div class="card-header">
        <div class="row">
            <div class="col-6 d-flex">
                @if ($actions['create'])
                    <a 
                        href="{{ (isset($routes['create'])) ? route($routes['create']) : '#'}}" 
                        class="btn btn-primary">
                        Thêm Mới
                    </a>
                @endif
                @if ($actions['createExcel'])
                    <button class="btn btn-success ml-1">Excel</button>
                @endif
            </div>
            <div class="col-6 text-right">
                @if ($actions['deleteAll'])
                    <button class="btn btn-danger">Xóa Tất Cả</button>
                @endif
            </div>
        </div>
        </div>
    @endif
    <div class="card-body">
        <table id="table-crud" class="table table-bordered table-striped">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th>{{ $header['text'] }}</th>
                    @endforeach
                    @if($actions['viewDetail'] || $actions['edit'])
                        <th>{{ $actions['text'] }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr id="table-crud{{ $item->id }}">
                        @foreach ($headers as $header)
                            <td>
                                @if (! isset($header['status']))
                                    @php
                                        echo is_array($item_value = data_get($item, $header['key'])) ? nl2br(implode(PHP_EOL, $item_value)) : $item_value 
                                    @endphp
                                @else
                                    @foreach ($header['status'] as $status)
                                        @php
                                            $value = is_array($item_value = data_get($item, $header['key'])) ? nl2br(implode(PHP_EOL, $item_value)) : $item_value 
                                        @endphp
                                        @if ($value == $status['value'])
                                            <span class="{{ $status['class'] }}">{{$status['text']}}</span>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        @endforeach
                        @if($actions['viewDetail'] || $actions['edit'])
                            <td>
                                @if ($actions['edit'])
                                    <button id="edit-customer" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endif
                                @if ($actions['viewDetail'])
                                    <button id="btn-table-view-detail__js" class="btn btn-info">
                                        <i class="fas fa-history"></i>
                                    </button>
                                @endif
                                @if ($actions['delete'])
                                    <button id="delete-customer" class="btn btn-danger" data-toggle="modal" data-target="#modal-xl">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@vite(['resources/admin/js/table-data.js'])
