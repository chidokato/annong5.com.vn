@extends('admin.layout.index')
@section('province') menu-item-active menu-item-open @endsection
@section('content')
@include('admin.errors.alerts')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 mb-0 text-gray-800">List Category</h1> -->
    <form style="display: flex;" action="admin/province/loc" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="input-group">
            <input value="{{ isset($key) ? $key : '' }}" name="key" type="text" class="form-control mr-3" placeholder="Name...">
        </div>
        <!-- <input type="text" class="form-control mr-3" name="datefilter" value="{{ isset($datefilter) ? $datefilter : '' }}" placeholder='Created at ...' /> -->
        <select style="width: 100px;" class="form-control mr-3" name="paginate">
            <option <?php if(isset($paginate) && $paginate=='50'){echo "selected";} ?> value="50">50</option>
            <option <?php if(isset($paginate) && $paginate=='100'){echo "selected";} ?> value="100">100</option>
            <option <?php if(isset($paginate) && $paginate=='200'){echo "selected";} ?> value="200">200</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </form>
    <!-- <a href="admin/category/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-file"></i> Add</a> -->
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Province list ({{$count}} iteam)</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <form method="post" action="admin/category/delete_all"> <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <thead>
                        <tr>
                            <th style="position: relative; width: 25px;">
                                <label class="container"><input onclick="toggle(this);" type="checkbox" id="checkbox"><span class="checkmark"></span></label>
                                <button type="submit" onclick="dell()" class="btn btn-danger btn-sm  ml-2 delall"><i class="la la-trash"></i> Dell all</button>
                            </th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="infinite-scroll">
                        @foreach($province as $key => $val)
                        <tr id="province">
                            <td>
                                <label class="container"><input type="checkbox" id="id" name="foo[]" value="{{$val->id}}"><span class="checkmark"></span></label>
                            </td>
                            <td>
                                {!! isset($val->img) ? '<img src="data/province/80/'.$val->img.'" class="thumbnail-img align-self-center" alt="" />' : '' !!}
                                {{$val->name}}
                            </td>
                            <td>{{ $val->code }}</td>
                            <td>{{ isset($val->user->name) ? $val->user->name : '' }}</td>
                            <td>
                                <label class="container"><input id="status_province" <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" value="{{$val->id}}"><span class="checkmark"></span></label>
                            </td>
                            <td>
                                {{date('d/m/Y',strtotime($val->created_at))}} / {{date('d/m/Y',strtotime($val->updated_at))}}
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </form>
                </table>
                {{$province->links()}}
            </div>
        </div>
    </div>
</div>
@endsection