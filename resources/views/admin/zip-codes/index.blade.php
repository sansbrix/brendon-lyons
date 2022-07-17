@extends('layouts.main')
@section('content')
<div class="row col-12">
    <div class="col-12">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row align-items-center">
               <div class="col-8">
                  <h3 class="mb-0">
                   Zip Codes Table
               </h3>
               </div>
               <div class="col-4 text-right">
                   <a href="{{ route('zip-codes.create') }}" class="btn btn-sm btn-default">Add Zip Code</a>
               </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <form style="width: 100%; display: flex;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input required type="text" class="form-control" name="name" value="{{request()->get('name') ? request()->get('name') : ''}}" placeholder="Search Zip Code">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-0">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form style="width: 100%; display: flex;" enctype="multipart/form-data" action="{{ route('zip-code.import')}}" method="POST">
                        <div class="col-md-4">
                            <input type="file" required style="margin-top: 6px;" name="file" placeholder="Search Zip Code" >
                            @csrf
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-primary mt-0">Upload Zip File</button>
                        </div>
                    </form>
                </div>

            </div>
         </div>
        <!-- Light table -->
        <div class="mx-5">
            <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">#</th>
                    <th scope="col" class="sort" data-sort="budget">Zip Code</th>
                    <th scope="col" class="sort" data-sort="budget">Reason</th>
                    <th scope="col" class="sort" data-sort="budget">Status</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="list">
                @include('admin.zip-codes.partials.list')
                </tbody>
            </table>
            </div>
        </div>
        {{$zip_codes->links()}}
        <!-- Card footer -->
      </div>
    </div>
</div>
@endsection
