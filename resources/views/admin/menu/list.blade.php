@extends('admin.layout.index')
@section('menu') show @endsection
@section('content')
@include('admin.errors.alerts')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 mb-0 text-gray-800">List menu</h1> -->
    <form style="display: flex;" action="admin/menu/search" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="input-group">
            <input value="{{ isset($key) ? $key : '' }}" name="key" type="text" class="form-control mr-3" placeholder="Name...">
        </div>
        <input type="text" class="form-control mr-3" name="datefilter" value="{{ isset($datefilter) ? $datefilter : '' }}" placeholder='Created at ...' />
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
    <a href="admin/menu/add"><button class="btn-primary" type="button"><i class="far fa-file"></i> Thêm mới</button></a>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý danh mục</h6>
                <!-- <div class="dropdown no-arrow">
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
                </div> -->
            </div>
            <div class="card-body">
                <table class="table">
                    <form method="post" action="admin/menu/delete_all"><input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <thead>
                            <tr>
                                <th style="position: relative;">
                                    <label class="container"><input onclick="toggle(this);" type="checkbox" id="checkbox"><span class="checkmark"></span></label>
                                    <button type="submit" onclick="dell()" class="btn btn-danger btn-sm  ml-2 delall"><i class="la la-trash"></i> Dell all</button>
                                </th>
                                <!-- <th></th> -->
                                <th>Name</th>
                                <th>Slug</th>
                                <th>SKU</th>
                                <th>View</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Sort By</th>
                                <th>date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php dequymenu ($menu,0,$str='',old('parent_id')); ?>  
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
@section('function')
<?php 
    function dequymenu ($menulist, $parent_id=0, $str='')
    {
        foreach ($menulist as $val) 
        {
            if ($val['parent'] == $parent_id) 
            { 
                ?>
                    <tr id="menu" style="border-bottom: 1px solid #f3f6f9;">
                        <input type="hidden" name="id" id="id" value="{{$val->id}}" >
                        <td>
                            <label class="container"><input type="checkbox" name="foo[]" value="{{$val->id}}"><span class="checkmark"></span></label>
                        </td>
                        <!-- <td>{!! isset($val->img) ? '<img data-action="zoom" src="data/menu/'.$val->img.'" class="thumbnail-img align-self-end" alt="">' : '' !!}</td> -->
                        <td><a href="admin/menu/edit/{{$val->id}}" >{{$str}}{{$val->name}}</a></td>
                        <td>{{$val->icon}} | {{$val->slug}}</td>
                        <td>{{$val->sku}}</td>
                        <td><input type="text" id="view" value="{{$val->view}}" name="" class="form-control cat_view"></td>
                        <td>
                            <label class="container"><input <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" id='status_menu' ><span class="checkmark"></span></label>
                        </td>
                        <td>{{$val->user->name}}</td>
                        <td>
                            {{$val->classify}}
                        </td>
                        <td class="date">{{date('d/m/Y',strtotime($val->created_at))}} <sup title="Sửa lần cuối: {{date('d/m/Y',strtotime($val->updated_at))}}"><i class="fa fa-question-circle-o" aria-hidden="true"></i></sup> </td>
                        <td>
                            <a href="admin/menu/double/{{$val->id}}" class="mr-2"><i class="far fa-copy"></i></a>
                            <a href="admin/menu/edit/{{$val->id}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                            <a onclick="dell()" href="admin/menu/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                dequymenu ($menulist, $val['id'], $str.'_');
            }
        }
    }
?>




@endsection