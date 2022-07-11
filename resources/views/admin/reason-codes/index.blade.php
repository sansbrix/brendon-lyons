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
                    Reason Codes Table
                  </h3>
               </div>
               <div class="col-4 text-right">
                   <a href="{{ route('reason-codes.create') }}" class="btn btn-sm btn-default">Add Reason Code</a>
               </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-12">
                    <div class="col-md-6">
                        <form style="width: 100%; display: flex;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input required type="text" class="form-control" name="name" placeholder="Search Zip Code">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mt-0">Search</button>
                            </div>
                        </form>
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
                        <th scope="col" class="sort" data-sort="budget">Reason Code</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @include('admin.reason-codes.partials.list')
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
          <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
             @if ($reasonCodes->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link" href="{{route('reason-codes.index')}}?page={{$reasonCodes->currentPage()-1 }}" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
             @endif
              @if($reasonCodes->firstItem() == $reasonCodes->lastPage())
              <li class="page-item active ">
                <a class="page-link" href="{{ route('reason-codes.index') }}?page={{$reasonCodes->firstItem()}}">{{$reasonCodes->firstItem()}}</a>
             </li>
              @else
                @for($i=2; $i<=$reasonCodes->lastPage(); $i++)
                    <li class="page-item @if($i ==  $reasonCodes->currentPage()) active @endif">
                        <a class="page-link" href="{{ route('reason-codes.index') }}?page={{ $i }}">{{ $i }}</a>
                    </li>
                @endfor
              @endif
              @if($reasonCodes->lastPage() != $reasonCodes->currentPage())
              <li class="page-item">
                <a class="page-link" href="{{route('reason-codes.index')}}?page={{ $reasonCodes->currentPage()+1 }}">
                  <i class="fas fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
              </li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>
@endsection
