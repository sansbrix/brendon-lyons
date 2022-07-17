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
                    Statuses Table
                  </h3>
               </div>
               <div class="col-4 text-right">
                   <a href="{{ route('status.create') }}" class="btn btn-sm btn-default">Add Status</a>
               </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-12">
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
         </div>

        <div class="mx-5">
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">#</th>
                        <th scope="col" class="sort" data-sort="budget">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @include('admin.status.partials.list')
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Card footer -->
        {{$statuses->links()}}
      </div>
    </div>
</div>
@endsection
