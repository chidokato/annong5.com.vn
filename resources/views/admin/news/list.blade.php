@extends('admin.layout.index')
@section('news') menu-item-active @endsection
@section('content')
@include('admin.errors.alerts')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 mb-0 text-gray-800">List Category</h1> -->
    <form style="display: flex;" action="admin/news/search" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="input-group">
            <input value="{{ isset($key) ? $key : '' }}" name="key" type="text" class="form-control mr-3" placeholder="Name...">
        </div>
        <select style="" class="form-control mr-3" name="category_id">
            <option value=""> all category</option>
            @foreach($category as $val)
            <option <?php if(isset($category_id) && $category_id==$val->id){echo "selected";} ?> value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
        </select>
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
    <!-- <button type="button" class="btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="far fa-file"></i> Thêm nhanh</button> -->
    <a href="admin/news/add"><button class="btn-primary" type="button"><i class="far fa-file"></i> Thêm mới</button></a>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý tin tức</h6>
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
                    <form method="post" action="admin/news/delete_all"> <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <thead>
                        <tr>
                            <th style="position: relative; width: 25px;">
                                <label class="container"><input onclick="toggle(this);" type="checkbox" id="checkbox"><span class="checkmark"></span></label>
                                <button type="submit" onclick="dell()" class="btn btn-danger btn-sm  ml-2 delall"><i class="la la-trash"></i> Dell all</button>
                            </th>
                            <th></th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $val)
                        <tr id="articles">
                            <input type="hidden" id="id" value="{{$val->id}}" />
                            <td class="td_checkbox">
                                <label class="container"><input type="checkbox" name="foo[]" value="{{$val->id}}"><span class="checkmark"></span></label>
                            </td>
                            <td class="thumbnail-img">
                                {!! isset($val->img) ? '<img data-action="zoom" src="data/news/'.$val->img.'" />' : '<img data-action="zoom" src="'.$val->img2.'" />' !!}
                            </td>
                            <td>
                                <a href="admin/news/edit/{{$val->id}}">{{$val->name}}</a>
                            </td>
                            <td>
                                <label class="container"><input <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" id='status_articles' ><span class="checkmark"></span></label>
                            </td>
                            <td>{{ isset($val->category->name) ? $val->category->name : '' }}</td>
                            <td>{{ isset($val->user->name) ? $val->user->name : '' }}</td>
                            <td>
                                <!-- {{date('d/m/Y',strtotime($val->updated_at))}} <br>  -->
                                <i style="font-size: 14px">{{date('d/m/Y',strtotime($val->created_at))}}</i>
                            </td>
                            <td class="d-flex">
                                <a href="admin/news/double/{{$val->id}}" class="mr-2"><i class="far fa-copy"></i></a>
                                <a href="admin/news/edit/{{$val->id}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                <a onclick="dell()" href="admin/news/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm link báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="admin/news/addflast"><input type="hidden" name="_token" value="{{csrf_token()}}" />
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Link:</label>
            <input type="text" name="link" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <select name="cat_id" class="form-control">
                @foreach($category as $val)
                <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection